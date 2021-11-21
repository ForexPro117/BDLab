@extends('header')
<title>Главная</title>
@section('bodyContent')
    @if(session('status')=='success')
        <div class="alert alert-success container">
            Вы успешно вошли в систему!
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    @elseif(session('status')=="exit")
        <div class="alert alert-danger container">
            Вы вышли из системы!
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger container">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Auth::check())
        <div class="container mt-5"><h1>Моё почтение {{request()->user()->email}}</h1></div>
    @else()
        <div class="container mt-5"><h1>Для редактирования,
                нужно авторизоваться и совершить двойное нажатие по нужному столбцу!</h1></div>
    @endauth

    <script src="{{ asset('js/homeBlade.js') }}"></script>
@endsection
