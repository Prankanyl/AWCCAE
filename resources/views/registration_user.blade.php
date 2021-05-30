@extends('layout')
@section('title')
Регистрация пользователя
@endsection
@section('header')
<div class="container-center">
  <div class="container">
   <div class="row">
     <h3>Регистрация</h3>
     <form class="row g-3" action="/registration" method="post">
       @csrf
        <div class="col-mb-6">
          <label for="login" class="form-label">Логин</label>
          <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp">
          <div id="loginHelp" class="form-text">Введите логин</div>
        </div>
        <div class="col-mb-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Введите email</div>
        </div>
        <div class="col-mb-6">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordlHelp">
          <div id="passwordlHelp" class="form-text">Введите логин</div>
        </div>
        <div class="col-mb-6">
          <label for="number_phone" class="form-label">Номер телефона</label>
          <input type="text" class="form-control" id="number_phone" name="number_phone" aria-describedby="number_phoneHelp">
          <div id="number_phoneHelp" class="form-text">Пример: +375441234567</div>
        </div>
        <div class="col-mb-6">
          <label for="lastname" class="form-label">Фамилия</label>
          <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastnameHelp">
          <div id="lastnameHelp" class="form-text">Введите свою фамилию</div>
        </div>
        <div class="col-mb-6">
          <label for="firstname" class="form-label">Имя</label>
          <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstnameHelp">
          <div id="firstnameHelp" class="form-text">Введите свое имя</div>
        </div>
        <div class="col-mb-6">
          <label for="patronymic" class="form-label">Отчество</label>
          <input type="text" class="form-control" id="patronymic" name="patronymic" aria-describedby="patronymicHelp">
          <div id="patronymicHelp" class="form-text">Введите свое отчество</div>
        </div>
        <button type="submit" class="btn btn-primary" id="registration_user" name="registration_user" value="true">Зарегистрироваться</button>
      </form>
    </div>
  </div>
</div>
@endsection
@section('left_content')
@endsection
@section('right_content')
@endsection
