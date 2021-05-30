@extends('layout')
@section('title')
Кабинет администратора
@endsection
@section('style')
@endsection
@section('left_content')
<div class="menu">
  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action"  aria-current="true" role="button">
      <h3>Таблицы база данных</h3>
    </a>
    <a href="#" class="list-group-item list-group-item-action" id="" name="">Корзина</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name=""  onclick="openDiv(event, 'Catalog')">Каталог</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name="">Категории каталога</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name="">Компании</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name="">Отзывы</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name="">Объявления</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name="">Пользователи</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name="">Журнал посещения</a>
  </div>
</div>
@endsection
@section('right_content')
<!-- <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Person')">Личный данные</button>
  <button class="tablinks" onclick="openCity(event, 'Company')">Данные компании</button>
  <button class="tablinks" onclick="openCity(event, 'Basket')">Корзина</button>
  <button class="tablinks" onclick="openCity(event, 'Declaration')">Мои объявления</button>
</div> -->

<div id="Catalog" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Категория</th>
              <th scope="col">Название</th>
              <th scope="col">Описание</th>
              <th scope="col">Картинка</th>
              <th scope="col">Стоимость</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($catalogs as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->category}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->img}}</td>
              <td>{{$item->cost}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
function openDiv(evt, divName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(divName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
@endsection
