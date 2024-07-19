@extends('templates/base')

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

        <div class="picker-container">
            <select name="unis" class="picker" required>
                <option value="" disabled selected >Избиране на университет...</option>
                <option value="id">Varna uni</option>
            </select>

            <button class="fas fa-pen"></button>
        </div>

        <div class="picker-container">
            <p>Умения в технологии (multichoice)</p>
            <select name="" id="" multiple>
                <option value="PHP">PHP</option>
            </select>
            <button class="fas fa-pen"></button>
        </div>

        <button>Запис на CV</button>
    </div>
@endsection