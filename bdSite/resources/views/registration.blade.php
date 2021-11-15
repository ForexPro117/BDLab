@extends('header')
<title>Регистрация</title>
@section('bodyContent')
    <div class="container mt-5">
        <h1>Регистрация</h1>
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" >Ваш еmail</label>
                <input type="email" class="form-control invalid" id="exampleInputEmail1" placeholder="Введите ваш Email" required >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label" >Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
            </div>
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </form>
    </div>
@endsection
