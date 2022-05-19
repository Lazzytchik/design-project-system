<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css')}}">
</head>
<body>
<div class="main">
    <div class="main-wrapper">
        <form class="auth-form" method="POST" action="/register">
            @csrf
            <div class="auth-form-wrapper">
                <span class="auth-form-title h1">Регистрация</span>
                <label>
                    <input class="auth-form-login auth-input-box"
                           name="username"
                           type="text"
                           placeholder="Имя пользователя"
                           value="{{@old('username')}}"
                    >
                    @error('username')
                    <p>{{$message}}</p>
                    @enderror
                </label>
                <label>
                    <input class="auth-form-login auth-input-box"
                           name="name"
                           type="text"
                           placeholder="Имя"
                           value="{{@old('name')}}"
                    >
                    @error('name')
                        <p>{{$message}}</p>
                    @enderror
                </label>
                <label>
                    <input class="auth-form-email auth-input-box"
                           name="email"
                           type="email"
                           placeholder="Электронная почта"
                           value="{{@old('email')}}"
                    >
                    @error('email')
                    <p>{{$message}}</p>
                    @enderror
                </label>
                <label>
                    <input class="auth-form-password auth-input-box"
                           name="password"
                           type="password"
                           placeholder="Пароль"
                    >
                    @error('password')
                    <p>{{$message}}</p>
                    @enderror
                </label>
                <a class="auth-form-forget" href="/"><span>Забыли пароль?</span></a>
                <input class="auth-form-submit auth-input-button" type="submit" value="Регистрация">

                {{--@if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif--}}
            </div>
        </form>
    </div>
</div>
</body>
</html>
