@extends('layouts.app')


@section('content')
    <br>
<div class="container">
    <div class="row row-cols-lg-2">
        <div class="col-3">
            @include('components.articles.tags', ['tags'=> $tags])
        </div>
        <div class="col-9">
            <div class="row row-cols-lg-1 row-cols-md-1 row-cols-sm-1 row-cols-xl-1 row-cols-1 articles-page">
                @include('components.articles.article', ['articles'=> $articles])
                <div class="paginate">
                    {{ $articles->links('paginator.default') }}
                </div>

            </div>
        </div>
    </div>




</div>
@endsection
