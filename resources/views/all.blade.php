@extends('layouts.app')

@section('content')
    <section id="categories" class="all">
        <header id="categories-head" style="background-image: url('{{asset('img/all.jpg')}}')">
            <div>
                <h1>Tous nos articles</h1>
                <span>Découvrez nos {{count($articles)}} articles publiés.</span>
            </div>
        </header>
        <section id="articles">
            <div class="article-container">
                <div class="container-body">
                    @foreach($articles as $article)
                        @component('components/article', ['article' => $article])@endcomponent
                    @endforeach
                </div>
            </div>
        </section>
    </section>
@endsection
