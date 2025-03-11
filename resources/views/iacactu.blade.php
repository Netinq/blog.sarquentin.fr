@extends('layouts.app')

@section('title', 'IAC Actus')
@section('description', 'Retrouve une veille technologique hebdomadaire sur les évolutions et les tendances de l\'IAC (Infrastructure as Code)')
@section('image', asset('img/IACACTUS_Meta.jpg'))

@section('content')
    <section id="categories" class="iacactu">
        <header id="categories-head" style="background-image: url('{{asset('img/news.jpg')}}')">
            <div class="iacactu-head">
                <h1>IAC Actus
<span>Retrouve une veille technologique hebdomadaire sur les évolutions et les tendances de l'IAC
    (Infrastructure as Code)</span></h1>
                <img src="{{asset('img/iacactu.png')}}" alt="Logo DataActu" class="logo">
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
