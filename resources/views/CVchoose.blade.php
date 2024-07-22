@extends('templates/base')

@section('content')
    <div class="CV-content">
        <form action="{{ route("cv.date") }}" method="get">
            <input type="date" name="from" id="from">
            <input type="date" name="to" id="to">
            <button type="submit">Търси</button>
        </form>

        @foreach ($people as $person)
            <form action="/cv/show/{{ $person->id }}/{{ $person->cv->id }}" method="get">
                <p>{{ $person->first_name }}</p>
                <p>{{ $person->middle_name }}</p>
                <p>{{ $person->last_name }}</p>

                <button type="submit">Отвори</button>
            </form>
        @endforeach
    </div>
@endsection