@extends('templates/base')

@section('content')
    <div>
        @foreach ($data as $aggregation)
            <h1>Age Range</h1>
            {{ $aggregation["age"] }}
            <h1>Technologies</h1>
            @foreach ($aggregation["technologies"] as $technology) {
                {{ $technology }}
            }
                
            @endforeach

            <h1>date of applications</h1>
            {{ $aggregation["date_of_application"]["min"] }}:{{ $aggregation["date_of_application"]["max"] }}
        @endforeach
    </div>
@endsection