@extends('header')
<title>База данных</title>
@section('bodyContent')

@if(session('status')=='success')
    <div class="alert alert-success container">
        Вы успешно вошли в систему и имеете возможность редактировать базу данных!
        <button type="button" class="btn-close" aria-label="Close"></button>
    </div>
@elseif(session('status')=="exit")
    <div class="alert alert-danger container">
        Вы вышли из системы и потеряли возможность редактировать базу данных!
        <button type="button" class="btn-close" aria-label="Close"></button>
    </div>
@endif
@if(Auth::check())
    <div class="alert alert-success container">
        Для редактирования данных, дважды нажмите на желаемую строку!
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
@include('modal')

    <div class="accordion container" id="accordionExample">
        @for($i=0;$i<count($Names);$i++)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{$i}}">
                    <button class="accordion-button @if($i!=0)collapsed @endif" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                        Таблица: {{$Names[$i]}}
                    </button>
                </h2>

                <div id="collapse{{$i}}" class="accordion-collapse collapse @if($i==0)show @endif"
                     aria-labelledby="heading{{$i}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-striped table-hover" id="{{$Names[$i]}}">
                            <tr>
                                @foreach($rowsName[$i] as $names)
                                    <th scope="col">{{$names->COLUMN_NAME}}</th>
                                @endforeach
                                {{--<th></th>
                                <th></th>--}}
                            </tr>
                            @foreach($data[$i] as $key=>$rows)
                                <tr class="dataPick">
                                    @foreach($rows as $row)
                                        <td>{{ $row }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        @endfor
    </div>
    @if(Auth::check())
        <script src="{{ asset('js/ajaxSender.js') }}"></script>
    @endif
<script src="{{ asset('js/homeBlade.js') }}"></script>
@endsection
