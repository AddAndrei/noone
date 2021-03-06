@foreach($articles as $article)
    <div class="col">
        <div class="card" style="width: 100%">
            <a href="{{ route('articles.article', $article->slug) }}">
                <img src="{{ $article->preview }}" class="card-img-top" alt="">
            </a>

            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ $article->anonce }}</p>
                <div class="card-info">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#747884" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                        <span class="views">{{ $article->vc }}</span>
                    </div>

                    <div>

                        @if ($article->likeIs)
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" style="cursor:pointer;" height="17" fill="blue" class="bi bi-heart-fill" viewBox="0 0 16 16" id="like">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" style="cursor:pointer;" height="17" fill="#747884" class="bi bi-heart" viewBox="0 0 16 16" id="like">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
