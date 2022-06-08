<html>
    <head>
        <title>SUDPI - @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
        <link rel="stylesheet" href="{{asset('css/layouts/app.scss')}}">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
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
                        <div class="main-header-wrapper">
                            <h1 class="main-header__title h1">@yield('title')</h1>
                        </div>
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
                    <footer class="main-footer">
                        <div class="footer-wrapper">
                            <p class="footer-p p">footer</p>
                        </div>
                    </footer>
                </div>
        </div>
    </body>
</html>
