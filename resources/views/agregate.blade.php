@extends('templates/base')

@section('content')
    <div>
        @foreach ($data as $aggregation)
            <h1>Възрастов диапазон</h1>
            {{ $aggregation["age"] }}
            <h1>Технологии</h1>
            @foreach ($aggregation["technologies"] as $technology) {
                {{ $technology }}
            }
                
            @endforeach

            <h1>Дати на апликация</h1>
            {{ $aggregation["date_of_application"]["min"] }}  - {{ $aggregation["date_of_application"]["max"] }}
        @endforeach
    </div>
@endsection