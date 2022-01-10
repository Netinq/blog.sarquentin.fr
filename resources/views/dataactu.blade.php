@extends('layouts.app')

@section('content')
    <section id="categories" class="dataactu">
        <header id="categories-head" style="background-image: url('{{asset('img/news.jpg')}}')">
            <div class="dataactu-head">
                <h1>DataActu
<span>Quelle est l'évolution des données personnelles au sein de notre quotidien en France ?</span></h1>
                <img src="{{asset('img/dataactu.png')}}" alt="Logo DataActu" class="logo">
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
