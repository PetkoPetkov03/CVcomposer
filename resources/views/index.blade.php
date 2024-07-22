@extends('templates/base')
<link rel="stylesheet" href="{{ asset("css/index.css") }}">
@section('content')
    <div class="form">
        <form action="{{ route('cv.store') }}" method="POST">
            @csrf
            <h1>Създаване на CV</h1>
            <div class="inputs">
                <input type="text" name="first_name" placeholder="Име" required>
                <input type="text" name="middle_name" placeholder="Презиме">
                <input type="text" name="last_name" placeholder="Фамилия" required>
            </div>

            <div class="mini-form">
                <h1>Дата на раждане</h1>
                <input type="date" name="date_of_birth" id="date" required>
            </div>

            <div class="picker-container" id="uni-picker">
                <select name="uni" class="picker" required>
                    <option value="" disabled selected>Избиране на университет...</option>
                    @foreach ($universities as $university)
                        <option value="{{ $university->id }}">{{ $university->uni_name }} : Оценка({{ $university->grade }})</option>
                    @endforeach
                </select>
            </div>
            <div><button type="button" id="openUniModalBtn" class="fas fa-pen"></button></div>

            <div class="picker-container" id="tech-picker">
                <p>Умения в технологии (multichoice)</p>
                <select name="tech[]" id="tech-picker" class="picker" multiple>
                    @foreach ($tech as $item)
                        <option value="{{ $item->id }}">{{ $item->tech_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="button" id="openTechModalBtn" class="fas fa-pen"></button>
            </div>

            <button type="submit">Запис на CV</button>
        </form>

        <div class="base-container">

            <div id="uniModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form action="{{ route('uni.store') }}" method="POST" id="uniForm">
                        @csrf
                        <div class="mb-3">
                            <input type="text" id="uni_name" name="uni_name" class="form-control" placeholder="Име на университет" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" id="grade" name="grade" class="form-control" placeholder="Оценка" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Запази</button>
                    </form>
                </div>
            </div>

            
        </div>

        <div class="base-container">
            

            <div id="techModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form action="{{ route('tech.store') }}" method="POST" id="techForm">
                        @csrf
                        <div class="mb-3">
                            <label for="tech_name" class="form-label">Технология:</label>
                            <input type="text" id="tech_name" name="tech_name" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Запази</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script defer src="{{ url('js/uni.js') }}"></script>
    <script defer src="{{ url('js/tech.js') }}"></script>
@endsection
