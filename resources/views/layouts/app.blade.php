@section('description', "Découvrez des articles spécialisés sur le DevOps, l'Infrastructure as Code, le Cloud, la
performance web et l'automatisation. Analyses, tutoriels et veille technologique pour optimiser vos sites et applications.")

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap:  https://www.google-analytics.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *; img-src 'self' 'unsafe-inline' https://*.google-analytics.com https://*.googletagmanager.com ;connect-src 'self' 'unsafe-inline'  https://*.google-analytics.com https://*.analytics.google.com https://*.googletagmanager.com; script-src 'self' https://*.googletagmanager.com 'unsafe-inline' 'unsafe-eval';** ">
        <!-- Default meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
        <meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large,max-video-preview:-1" />

        <meta name='author' content='Quentin Sar, Netinq'>
        <meta name='owner' content='MONSIEUR QUENTIN SAR'>
        <meta name='subject' content="MONSIEUR QUENTIN SAR">

        <meta name='identifier-URL' content='blog.sarquentin.fr'>
        <meta name="description" content="@yield('description')">
        <meta name='reply-to' content='pro@sarquentin.fr'>

        <meta name='language' content='FR'>
        <meta name='target' content='all'>
        <meta name='theme-color' content='#2F3349'>

        <link rel='shortcut icon' type='image/png' href='{{ asset('img/logo.png') }}'>
        <link rel="apple-touch-icon" href="{{ asset('img/logo.png') }}" />
        <link rel="canonical" href="@hasSection('url')@yield('url')@else https://blog.sarquentin.fr @endif" />

        <!-- Twitter Card meta -->
        <meta name='twitter:card' content='summary_large_image'>
        <meta name="twitter:title" content="@hasSection('title')@yield('title')@else Le Blog Digital @endif" />
        <meta name='twitter:url' content='@hasSection('url')@yield('url')@else https://blog.sarquentin.fr @endif' />
        <meta name='twitter:domain' content='blog.sarquentin.fr' />
        <meta name="twitter:description" content="@yield('description')" />
        <meta name="twitter:image" content="@hasSection('image')@yield('image')@else{{asset('img/meta.png')}}@endif" />

        <!-- Open Graph meta -->
        <meta property='og:title' content="@hasSection('title')@yield('title')@else Le Blog Digital @endif" />
        <meta property="og:description" content="@yield('description')" />
        <meta property="og:image" content="@hasSection('image')@yield('image')@else{{asset('img/meta.png')}}@endif" />
        <meta property="og:image:width" content="736" />
        <meta property="og:image:height" content="385" />
        <meta property='og:type' content='website' />
        <meta property='og:url' content='@hasSection('url')@yield('url')@else https://blog.sarquentin.fr @endif' />
        <meta property='og:site_name' content='{{Config::get('app.name')}}' />
        <meta property="og:locale" content="fr_FR" />

        <!-- IOS meta -->
        <meta name="apple-mobile-web-app-title" content="{{Config::get('app.name')}}">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        @hasSection('head')@yield('head')@endif

        <title>@hasSection('title')@yield('title')@else Le Blog Digital @endif</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-5KLH1RC7HP" defer></script>
        <script defer>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-5KLH1RC7HP');
        </script>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "WebSite",
          "url": "https://blog.sarquentin.fr/",
          "potentialAction": {
            "@type": "SearchAction",
            "target": {
              "@type": "EntryPoint",
              "urlTemplate": "https://blog.sarquentin.fr/articles?search={search_term_string}"
            },
            "query-input": "required name=search_term_string"
          }
        }
        </script>
    </head>
         @include('layouts.header')
         @yield('content')
         @include('layouts.footer')
         @yield('before')
    </body>
</html>
