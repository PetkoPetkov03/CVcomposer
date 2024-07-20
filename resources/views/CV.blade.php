@extends('templates/base')

@section('content')
    <div class="CV-component">
        <div class="person-component">
            <h1>{{ $person->first_name }}</h1>
            <h1>{{ $person->middle_name }}</h1>
            <h1>{{ $person->last_name }}</h1>
            <p>Date of Birth: {{ $person->date_of_birth }}</p>
        </div>

        <div class="CV-info">
            <p>University name: {{ $cv->university->uni_name }}</p>
            <p>University grade: {{ $cv->university->grade }}</p>

            <p>
                TechStack: 
            @foreach ($cv->technologies as $tech)
                {{ $tech->tech_name }},
            @endforeach</p>
        </div>
    </div>
@endsection