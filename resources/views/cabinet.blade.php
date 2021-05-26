@extends('layout')
@section('title')
AWCCAE
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
  <h3>Личные данные</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Company" class="tabcontent">
  <h3>Данные компании</h3>
  <p>Paris is the capital of France.</p>
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
