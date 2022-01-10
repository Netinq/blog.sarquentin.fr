@extends('layouts.app')

@section('content')
<main id="home">
    <section id="intro">
        <div class="title">
            <h1>Le <span>Blog</span> Digital</h1>
            <p>Explorez le digital chaque jour...</p>
        </div>
        <img src="{{asset('img/home.png')}}" alt="Quentin Sar picture">
    </section>
    <section id="articles">
        <nav><a href="{{route('news')}}">Nouveautés</a><a href="{{route('all')}}">Tous les articles</a><a href="{{route('short')}}">Articles courts</a><a href="{{route('dataactu')}}"><img src="{{asset('img/dataactu.png')}}" alt="">DataActu</a></nav>
        <div class="article-container">
            <div class="container-head">
                @if(count($articles) > 0)
                    @component('components/article', ['article' => $articles[0], 'big' => true])@endcomponent
                    @component('components/promo', ['big' => true])@endcomponent
                @endif
            </div>
            <div class="container-body">
                @foreach($articles as $article)
                    @if ($loop->first) @continue @endif
                    @component('components/article', ['article' => $article])@endcomponent
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
