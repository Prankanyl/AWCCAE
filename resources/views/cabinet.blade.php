@extends('layout')
@section('title')
Личный кабинет
@endsection
@section('style')
<link rel="stylesheet" href="css/style_authorization.css">
@endsection
@section('left_content')
<div class="menu">
  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action"  aria-current="true" role="button">
      <h3>Каталог товаров</h3>
    </a>
    @foreach ($categories as $item)
    <a href="/catalog" class="list-group-item list-group-item-action" id="sortby" name="sortby">{{$item->category}}</a>
    @endforeach
    <br>
  </div>
</div>
@endsection
@section('right_content')
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Person')">Личный данные</button>
  <button class="tablinks" onclick="openCity(event, 'Company')">Данные компании</button>
  <button class="tablinks" onclick="openCity(event, 'Basket')">Корзина</button>
  <button class="tablinks" onclick="openCity(event, 'Declaration')">Мои объявления</button>
</div>

<div id="Person" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <img src="/images/{{$user->img}}" alt="...">
      </div>
      <div class="col-lg-8">
        <h3>Личные данные</h3>
        <p><b>Логин:</b> {{$user->login}}</p>
        <p><b>Фамилия:</b> {{$user->lastname}}</p>
        <p><b>Имя:</b> {{$user->firstname}}</p>
        <p><b>Отчество:</b> {{$user->patronymic}}</p>
        <p><b>Email:</b> {{$user->email}}</p>
        <p><b>Телефон:</b> {{$user->number_phone}}</p>
      </div>
    </div>
  </div>
</div>

<div id="Company" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        @if(isset($company))
        <h3>Данные компании</h3>

        <h4>Сокращенное наименование:</h4>
        <p><b>Название компании:</b> {{$company->title}}</p>
        <p><b>Сокращенное наименование:</b> {{$company->abbreviated_name}}</p>

        <h3>Банковские реквизиты:</h3>
        <p><b>р/счет:</b> {{$company->iban}}</p>
        <p><b>Полное наименование:</b> {{$company->mank_name}}</p>
        <p><b>Адрес:</b> {{$company->address}}</p>
        <p><b>БИК:</b> {{$company->bic}}</p>
        <p><b>УНП:</b> {{$company->ynp}}</p>

        <h4>Юридический и почтовый адрес:</h4>
        <p><b>Юридический адрес:</b> {{$company->legal_address}}</p>
        <p><b>Телевон:</b> {{$company->number_phone}}</p>
        <p><b>Электронная почта:</b> {{$company->email}}</p>
        @else
        <h3>Данные о компании отсутствуют</h3>
        <form class="" action="" method="post">
          @csrf
          <button type="button" name="button" id="button" class="btn btn-lg submit-212529" style="margin-top: 15%; margin-bottom: 16%; position: relative; left: 45%;">Добавить</button>
        </form>
        @endif
      </div>
    </div>
  </div>
</div>

<div id="Basket" class="tabcontent">
  <h3>Корзина</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<div id="Declaration" class="tabcontent">
  <h3>Мои объявления</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
@endsection
