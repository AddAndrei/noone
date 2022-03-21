@extends('layouts.app')


@section('content')
    <br>
    <div class="container">
        <div class="row row-cols-lg-1 row-cols-md-1 row-cols-sm-1 row-cols-xl-1 row-cols-1">
            @foreach($article as $art)
                <div class="col">
                    <h2>{{ $art->title }}</h2>
                </div>
                <div class="col">

                    @if ($art->likeIs)

                        <svg xmlns="http://www.w3.org/2000/svg" width="17" style="cursor:pointer;" height="17" fill="blue" class="bi bi-heart-fill" viewBox="0 0 16 16" onclick="likeUpdate(false)">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" style="cursor:pointer;" height="17" fill="#747884" class="bi bi-heart" viewBox="0 0 16 16" onclick="likeUpdate(true)">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>
                    @endif

                    <span class="likes" id="likes">{{ $likes }}</span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#747884" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg>
                    <span class="views" id="views">{{ $art->vc }}</span>

                </div>
                <br><br>
                <div class="col">
                    @include('components.articles.tags', ['tags' => $tags])
                </div>

                <div class="col">
                    <p>{{ $art->text }}</p>
                </div>
                <br><br>
                <div class="col">
                    <hr>
                </div>
                <br><br>
                <div class="col" id="alert" style="display: none;">
                    <div class="alert alert-success" role="alert">
                        Комментарий отправлен!
                    </div>
                </div>
                <div class="col" id="hidden-block">
                    <h2>Оставить комментарий</h2>
                    <form action="">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"></label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Тема сообщения">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Текст сообщения" rows="3"></textarea>
                        </div>
                        <div class="col-auto">
                            <button type="button" onclick="sendComment()" class="btn btn-dark mb-3">Отправить</button>
                        </div>
                    </form>

                </div>
            @endforeach

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>

        let articleID = {{ $art->id }}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        setTimeout(()=>{

            $.ajax({
               url:"/views",
               type:"post",
               data:{articleID:articleID},
               success:(data,textStatus, xhr) =>{

                   if (xhr.status == 200)
                        $("#views").html(data.views);
               }
            });
        }, 5000);



        function likeUpdate(like)
        {
            let likes = parseInt($('#likes').html());

            $.ajax({
                url:"/like",
                type:"post",
                data:{articleID:articleID},
                success:(data) =>{
                    console.log(like);
                    if (like && data.like == 'update' || like && data.like == 'addlike') {
                        likes += 1;
                    }else{
                        likes -= 1;
                    }
                    $('#likes').html(likes);


                }
            })
        }


        function sendComment() {
            let data = {
                subject:$('#exampleFormControlInput1').val(),
                body:$('#exampleFormControlTextarea1').val(),
                articleID:articleID
            }
            $.ajax({
                url:"/comments",
                type:"post",
                data:data,
                success:(data)=>{
                    if (data.success == 200) {
                        $("#hidden-block").remove();
                        $("#alert").css({"display":"block"});
                    }
                }
            });
        }
    </script>
@endsection
