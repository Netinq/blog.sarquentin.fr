@extends('layouts.app')

@section('content')
    <section id="categories" class="short">
        <header id="categories-head" style="background-image: url('{{asset('img/short.jpg')}}')">
            <div>
                <h1>Nos articles courts</h1>
                <span><img src="{{asset('img/time_light.svg')}}" alt="Time"> Temps de lecture moyen {{$avg_read_time}} min</span>
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
