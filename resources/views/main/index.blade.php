@extends('layouts.app')


@section('content')
<section class="my-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Успех</h1>
                <p class="small">для молодых и успешных</p>
            </div>
        </div>
    </div>
</section>
<section class="last-articles">
    <div class="container">
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-1">
            @include('components.articles.article', ['articles' => $articles])
        </div>
    </div>
</section>

@endsection
