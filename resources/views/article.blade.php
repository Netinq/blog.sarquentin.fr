@extends('layouts.app')

@section('title', $article->name)
@section('description', $article->description)
@section('image', asset('storage/'.str_replace('\\', '/', $article->image)))
@section('url', route('article', ['link' => $article->link]))

@section('content')
    @include('components.share', ['txt' => $article->name, 'url' => route('article', ['link' => $article->link])])
    <article id="page">
        <header id="article-head" style="background-image: url('{{asset('storage/'.str_replace('\\', '/', $article->banner_image))}}')">
            <div>
                <time class="published" datetime="{{$article->published_at}}">Publication le {{\Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y')}}</time>
                <h1>{{$article->name}}</h1>
                <span><img src="{{asset('img/time_light.svg')}}" alt="Time" height="25px" width="25px"> Temps de
                    lecture
                    {{$article->read_time}} min</span>
            </div>
            <img id="meta" src="{{ asset('storage/'.str_replace('\\', '/', $article->image)) }}" alt="{{ $article->name }}">
        </header>
        <nav id="summary"></nav>
        <section id="content">
{{--            <h2 id="sommaire">Sommaire</h2>--}}
{{--            @foreach($titles as $title)--}}
{{--                {!! $title !!}--}}
{{--            @endforeach--}}
            {!! $article->html !!}
        </section>
    </article>
    <section class="promo-content">
    @include('components.promo')
    </section>
    <script src="{{asset('js/summary.js')}}"></script>
{{--    <form method="POST" action="{{route('read')}}" id="read">--}}
{{--        @csrf--}}
{{--        <input hidden name="article_id" value="{{$article->id}}">--}}
{{--    </form>--}}
{{--    <script src="{{asset('js/read_analytics.js')}}"></script>--}}
@endsection

@section('head')
    <meta name="publish_date" property="og:publish_date" content="{{\Carbon\Carbon::parse($article->published_at)->format(DateTime::ISO8601)}}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4501219983180544"
            crossorigin="anonymous"></script>
    <script type="application/ld+json">
            {
                "@context" : "https://schema.orrg",
                "@type" : "BlogPosting",
                "author" : [{
                    "@type": "Organization",
                    "name": "MONSIEUR QUENTIN SAR",
                    "legalName": "MONSIEUR QUENTIN SAR",
                    "description": "Créez votre vitrine en ligne, développez un e-commerce, proposez un service de réservation en ligne à vos clients...",
                    "image": "https://sarquentin.fr/images/meta.png",
                    "logo": "https://sarquentin.fr/images/logo.png",
                    "url": "https://sarquentin.fr",
                    "email": "pro@sarquentin.fr"
                }],
                "publisher" : {
                    "@type": "Organization",
                    "name": "MONSIEUR QUENTIN SAR",
                    "logo": "https://sarquentin.fr/images/logo.png",
                    "url": "https://sarquentin.fr"
                },
                "datePublished" : {!! json_encode($article->published_at) !!},
                "dateModified" : "{!! $article->updated_at !!}",
                "headline" : {!! json_encode($article->name, JSON_UNESCAPED_UNICODE ) !!},
                "image" : "{!! asset('storage/'.str_replace('\\', '/', $article->image)) !!}",
                "mainEntityOfPage" : "{!! route('article', ['link' => $article->link]) !!}"
            }
    </script>
@endsection
