@extends('layouts.app')

@section('content')
    <main id="search">
        <section id="intro" class="@if(count($articles) == 0)empty @endif">
            <div class="title">
                <h1>Nous avons trouvé <span>{{count($articles)}} résultats</span></h1>
                @if (count($articles) > 0)
                    <p>Pour la recherche "{{$search}}"</p>
                @else
                    @if ($tryto != null)
                        <p>Essayez peut-être avec
                            @for ($i = 0; $i < count($tryto); $i++)
                                <a href="{{route('search', ['search' => $tryto[$i]])}}">{{ $tryto[$i]}}, </a>
                            @endfor</p>
                    @else
                        <p>Veuillez reformuler votre recherche</p>
                    @endif
                @endif
            </div>
            @if(count($articles) == 0)
                <img src="{{asset('img/search_none.svg')}}">
            @endif
        </section>
        <section id="articles">
            <div class="article-container">
                <div class="container-body">
                    @foreach($articles as $article)
                        @component('components/article', ['article' => $article])@endcomponent
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
