@extends('templates/base')

<link rel="stylesheet" href="{{ asset("css/ag.css") }}">

@section('content')
    <div class="card-container">
        @foreach ($data as $aggregation)
            <div class="card">
                <b>Възрастов диапазон</b>
                {{ $aggregation['age'] }}
                <b>Технологии</b>
                @foreach ($aggregation['technologies'] as $technology)
                    {
                    {{ $technology }}
                    }
                @endforeach

                <b>Дати на апликация</b>
                {{ $aggregation['date_of_application']['min'] }} - {{ $aggregation['date_of_application']['max'] }}
            </div>
        @endforeach
    </div>
@endsection
