<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <title>Work</title>
</head>
<body>
<header class="p-2 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-white">Главная</a></li>
                <li><a href="{{route('bdView')}}" class="nav-link px-2 text-secondary">База данных</a></li>
            </ul>
            <div class="text-end nav">
                @if(Auth::check())
                    <label class="nav-link px-2 text-white">{{request()->user()->email}}</label>
                    <button type="button" class="btn btn-outline-light dropdown-toggle me-2" data-bs-toggle="dropdown">
                        Выйти
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('logout')}}">Выход</a></li>
                    </ul>
                @else
                    <div>
                        <button type="button" class="btn btn-outline-light dropdown-toggle me-2"
                                data-bs-toggle="dropdown">Войти
                        </button>
                        <form method="POST" action="{{ route('loginPOST') }}" class="dropdown-menu p-4">
                            @csrf
                            <div class="mb-3">
                                <label for="Email" class="form-label fw-bolder">Email</label>
                                <input type="email" class="form-control" name="email"
                                       placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label fw-bolder">Пароль</label>
                                <input type="password" class="form-control" name="password"
                                       placeholder="Ваш пароль">
                            </div>
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </form>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">
                            Регистрация
                        </button>
                        <form method="POST" action="{{ route('registerPOST') }}" class="dropdown-menu p-4">
                            @csrf
                            <div class="mb-3">
                                <label for="Email2" class="form-label fw-bolder">Email</label>
                                <input type="email" class="form-control" name="email"
                                       placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="Password2" class="form-label fw-bolder">Пароль</label>
                                <input type="password" class="form-control" name="password"
                                       placeholder="Ваш пароль">
                            </div>
                            <div class="mb-3">

                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="Повторите пароль">
                            </div>
                            <button type="submit" class="btn btn-success">Регистрация</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>
<main>
    @yield("bodyContent")

</main>
<footer
    class="d-flex flex-wrap justify-content-around py-3 my-4 border-top @if($_SERVER["REQUEST_URI"]!="/bdView")fixed-bottom @endif">
    <div>
        <span class="text-muted">© 2021 Company, Inc</span>
    </div>
    <div>
        <span class="text-muted">Тут могла быть ваша релама!</span>
    </div>
    <div>
        <a class="text-muted text-decoration-none" href="https://www.google.ru/">email@example.com</a>
    </div>
</footer>
</body>
</html>
