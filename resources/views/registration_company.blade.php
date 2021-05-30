@extends('layout')
@section('title')
Регистрация компании
@endsection
@section('header')
<div class="container-center">
  <div class="container">
   <div class="row">
     <h3>Регистрация компании</h3>
     <form class="row g-3" action="/registration" method="post">
       @csrf
        <div class="col-mb-6">
          <label for="title" class="form-label">Название компании</label>
          <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">
          <div id="titleHelp" class="form-text">Введите название компании</div>
        </div>
        <div class="col-mb-6">
          <label for="abbreviated_name" class="form-label">Сокращенное наименование</label>
          <input type="text" class="form-control" id="abbreviated_name" name="abbreviated_name" aria-describedby="abbreviated_namelHelp">
          <div id="abbreviated_namelHelp" class="form-text">Введите сокращенное наименование</div>
        </div>
        <div class="col-mb-6">
          <label for="iban" class="form-label">Расчетный счет</label>
          <input type="text" class="form-control" id="iban" name="iban" aria-describedby="ibanHelp">
          <div id="ibanHelp" class="form-text">Введите расчетный счет</div>
        </div>
        <div class="col-mb-6">
          <label for="bank_name" class="form-label">Наименование банка</label>
          <input type="text" class="form-control" id="bank_name" name="bank_name" aria-describedby="bank_nameHelp">
          <div id="bank_nameHelp" class="form-text">Введите наименование банка</div>
        </div>
        <div class="col-mb-6">
          <label for="address" class="form-label">Адрес</label>
          <input type="text" class="form-control" id="address" name="address" aria-describedby="addressHelp">
          <div id="addressHelp" class="form-text">Введите адрес</div>
        </div>
        <div class="col-mb-6">
          <label for="bic" class="form-label">БИК</label>
          <input type="text" class="form-control" id="bic" name="bic" aria-describedby="bicHelp">
          <div id="bicHelp" class="form-text">Введите БИК</div>
        </div>
        <div class="col-mb-6">
          <label for="ynp" class="form-label">УНП</label>
          <input type="text" class="form-control" id="ynp" name="ynp" aria-describedby="ynpHelp">
          <div id="ynpHelp" class="form-text">Введите УНП</div>
        </div>
        <div class="col-mb-6">
          <label for="legal_address" class="form-label">Юридический адрес</label>
          <input type="text" class="form-control" id="legal_address" name="legal_address" aria-describedby="legal_addressHelp">
          <div id="legal_addressHelp" class="form-text">Введите юридический адрес</div>
        </div>
        <div class="col-mb-6">
          <label for="number_phone" class="form-label">Номер телефона</label>
          <input type="text" class="form-control" id="number_phone" name="number_phone" aria-describedby="number_phoneHelp">
          <div id="number_phoneHelp" class="form-text">Пример: +375441234567</div>
        </div>
        <div class="col-mb-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Введите email</div>
        </div>
        <button type="submit" class="btn btn-primary" id="registration_company" name="registration_company" value="true">Зарегистрировать</button>
      </form>
    </div>
  </div>
</div>
@endsection
@section('left_content')
@endsection
@section('right_content')
@endsection
