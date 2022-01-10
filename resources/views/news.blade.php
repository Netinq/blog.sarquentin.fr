@extends('layouts.app')

@section('content')
    <section id="categories" class="news">
        <header id="categories-head" style="background-image: url('{{asset('img/news.jpg')}}')">
            <div>
                <h1>Nouveautés de la semaine</h1>
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
