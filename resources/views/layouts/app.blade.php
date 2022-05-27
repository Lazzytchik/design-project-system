<html>
    <head>
        <title>SUDPI - @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
        <link rel="stylesheet" href="{{asset('css/layouts/app.css')}}">
        @stack('styles')
        @stack('scripts')
    </head>
    <body>
        <div class="wrapper">
            @section('sidebar')
                <nav class="sidebar">
                    <div class="sidebar-item">
                        <a class="sidebar-item__link" href="/">
                            <img class="sidebar-item__icon" src="{{asset('svg/Home.svg')}}" alt="На главную">
                            <span class="sidebar-item__popup h2">На главную</span>
                        </a>
                    </div>
                    <div class="sidebar-item">
                        <a class="sidebar-item__link" href="/events">
                            <img class="sidebar-item__icon" src="{{asset('svg/Award.svg')}}" alt="На главную">
                            <span class="sidebar-item__popup h2">Конкурсы</span>
                        </a>
                    </div>
                    <div class="sidebar-item">
                        <a class="sidebar-item__link" href="/gallery">
                            <img class="sidebar-item__icon" src="{{asset('svg/Book-open.svg')}}" alt="На главную">
                            <span class="sidebar-item__popup h2">Галерея</span>
                        </a>
                    </div>
                    <div class="sidebar-item">
                        <a class="sidebar-item__link" href="/user">
                            <img class="sidebar-item__icon" src="{{asset('svg/User.svg')}}" alt="На главную">
                            <span class="sidebar-item__popup h2">Личный кабинет</span>
                        </a>
                    </div>
                    <div class="sidebar-item">
                        <a class="sidebar-item__link" href="/logout">
                            <img class="sidebar-item__icon" src="{{asset('svg/Logout.svg')}}" alt="На главную">
                            <span class="sidebar-item__popup h2">Выйти</span>
                        </a>
                    </div>
                </nav>
            @show
                <div class="main">
                    <header class="main-header">
                        <h1 class="main-header__title h1">@yield('title')</h1>
                    </header>
                    <main class="content">
                        <div class="content-wrapper">
                            @yield('content')

                            @if(session()->has('success'))
                                <div class="flash">
                                    <p class="p">{{session('success')}}</p>
                                </div>
                            @endif
                        </div>
                    </main>
                </div>
        </div>
    </body>
</html>
