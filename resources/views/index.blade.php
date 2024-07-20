@extends('templates/base')
<link rel="stylesheet" href="css/index.css">
@section('content')
    <div class="form">
        <h1>Създаване на CV</h1>
        <div class="inputs">
            <input type="text" name="first name" placeholder="Име">
            <input type="text" name="middle name" placeholder="Презиме">
            <input type="text" name="last name" placeholder="Фамилия">
        </div>

        <div class="mini-form">
            <h1>Дата на раждане</h1>
            <input type="datetime-local" name="date" id="date">
        </div>

        <div class="picker-container" id="uni-picker">
            <select name="unis" class="picker" required>
                <option value="" disabled selected>Избиране на университет...</option>
                @foreach ($universities as $university)
                    <option value="id">{{ $university->uni_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="base-container">
            <button id="openUniModalBtn" class="fas fa-pen"></button>

            <div id="uniModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form method="POST" id="uniForm">
                        @csrf
                        <div class="mb-3">
                            <input type="text" id="uni_name" name="uni_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="number" id="grade" name="grade" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="picker-container">
            <p>Умения в технологии (multichoice)</p>
            <select name="" id="" multiple>
                <option value="PHP">PHP</option>
            </select>
        </div>

        <div class="base-container">
            <button id="openTechModalBtn" class="fas fa-pen"></button>

            <div id="techModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form id="techForm">
                        @csrf
                        <div class="mb-3">
                            <label for="input1" class="form-label">Input 1:</label>
                            <input type="text" id="input1" name="input1" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <button>Запис на CV</button>
    </div>

    <script src="{{ url("js/uni.js") }}"></script>
@endsection
