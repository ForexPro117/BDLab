@extends('header')
<title>База данных</title>
@section('bodyContent')

{{--    @dd($Names,$data,$rowsName)--}}
@include('modal')

    <div class="accordion container" id="accordionExample">
        @for($i=0;$i<count($Names);$i++)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{$i}}">
                    <button class="accordion-button @if($i!=0)collapsed @endif" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                        Таблица: {{$Names[$i]->table_name}}
                    </button>
                </h2>

                <div id="collapse{{$i}}" class="accordion-collapse collapse @if($i==0)show @endif"
                     aria-labelledby="heading{{$i}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-striped table-hover" id="{{$Names[$i]->table_name}}">
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
@endsection
