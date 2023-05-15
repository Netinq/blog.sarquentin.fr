<header id="menu">
    <div class="container">
        <a href="{{route('home')}}">
            <img src="{{asset('img/logo.png')}}" alt="Logo du site" height="75px" width="75px">
        </a>
        <div class="nav">
            <form action="{{route('search')}}" method="GET">
                <input type="search" name="search" placeholder="Rechercher..." value="@isset($search){{$search}}@endisset">
                <button type="submit"><img src="{{asset('img/search.svg')}}" alt="Search icon" height="25px"
                                           width="25px"></button>
            </form>
{{--            <button type="button"><img src="{{asset('img/burger.svg')}}" alt="Burger menu icon"></button>--}}
        </div>
    </div>
</header>
