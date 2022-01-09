<a class="article {{ isset($big) ? 'big-box': 'box' }}" href="{{route('article', ['link' => $article->link])}}">
    <article>
        <div class="image" style="background-image: url('{{asset('storage/'.str_replace('\\', '/', $article->image))}}')"></div>
        <div>
            <time class="published" datetime="{{$article->published_at}}">Publication le {{\Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y')}}</time>
            <h2>{{$article->name}}</h2>
            <span><img src="{{asset('img/time.svg')}}" alt="Time"> Temps de lecture {{$article->read_time}} min</span>
        </div>
    </article>
</a>

@section('head')
    <script type="application/ld+json">
            {
                "@context" : "https://schema.org",
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
                "headline" : {!! json_encode($article->name, JSON_UNESCAPED_UNICODE ) !!},
                "image" : "{!! asset('storage/'.str_replace('\\', '/', $article->image)) !!}",
                "mainEntityOfPage" : "TODO"
            }
    </script>
@endsection
