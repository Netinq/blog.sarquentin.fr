@extends('layouts.app')

@section('content')
    <article id="page">
        <header id="article-head" style="background-image: url('{{asset('storage/'.str_replace('\\', '/', $article->image))}}')">
            <div>
                <time class="published" datetime="{{$article->published_at}}">Publication le {{\Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y')}}</time>
                <h1>{{$article->name}}</h1>
                <span><img src="{{asset('img/time_light.svg')}}" alt="Time"> Temps de lecture {{$article->read_time}} min</span>
            </div>
        </header>
        <nav id="summary"></nav>
        <section id="content">
            {!! $article->html !!}
        </section>
    </article>
    <script src="{{asset('js/summary.js')}}"></script>
@endsection
