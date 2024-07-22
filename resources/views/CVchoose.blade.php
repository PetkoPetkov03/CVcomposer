@extends('templates/base')
<link rel="stylesheet" href="{{ asset("css/table.css") }}">
@section('content')
    <div class="CV-content">
        <div class="calendar">
            <form action="{{ route('cv.date') }}" method="get">
                <label for="from">От:</label>
                <input type="date" name="from" id="from">
                <label for="to">Do:</label>
                <input type="date" name="to" id="to">
                <button type="submit">Търси</button>
            </form>
        </div>

        <table>
            <tr>
                <th>Име</th>
                <th>Презиме</th>
                <th>Фамилия</th>
                <th>Линк</th>
            </tr>
            @foreach ($people as $person)
                <tr>
                    <td>{{ $person->first_name }}</td>
                    <td>{{ $person->middle_name }}</td>
                    <td>{{ $person->last_name }}</td>
                    <td>
                        <form action="/cv/show/{{ $person->id }}/{{ $person->cv->id }}" method="get">
                            <button type="submit">Отвори</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
