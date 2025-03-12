@extends('layouts.app')

@section('title', 'Logistique Automatisée')
@section('description', 'Retrouve une veille technologique hebdomadaire sur les évolutions et les tendances de la logistique Automatisée')
@section('image', asset('img/IACACTUS_Meta.jpg'))

@section('content')
    <section id="categories" class="logistiqueautomatise">
        <header id="categories-head" style="background-image: url('{{asset('img/logistiqueauto.jpg')}}')">
            <div class="iacactu-head">
                <h1>Logistique Automatisée
<span>Retrouve une veille technologique hebdomadaire sur les évolutions et les tendances de la logistique
    Automatisée</span></h1>
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
