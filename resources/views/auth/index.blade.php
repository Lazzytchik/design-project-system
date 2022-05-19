<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css')}}">
</head>
<body>
    <div class="main">
        <div class="main-wrapper">
            <form class="auth-form" method="POST" action="/auth">
                @csrf
                <div class="auth-form-wrapper">
                    <span class="auth-form-title h1">Вход</span>
                    <label>
                        <input class="auth-form-login auth-input-box"
                               name="email"
                               type="email"
                               placeholder="Электронная почта"
                               required
                        >
                    </label>
                    <label>
                        <input class="auth-form-password auth-input-box"
                               name="password"
                               type="password"
                               placeholder="Пароль">
                    </label>
                    <a class="auth-form-forget" href="/"><span>Забыли пароль?</span></a>
                    <a class="auth-form-forget" href="/register"><span>Нет аккаунта?</span></a>
                    <input class="auth-form-submit auth-input-button"
                           type="submit"
                           value="Войти">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
