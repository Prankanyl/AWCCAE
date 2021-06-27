@extends('layout')
@section('title')
Каталог
@endsection
@section('left_content')
<div class="menu">
  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action"  aria-current="true" role="button">
      <h2>Каталог товаров</h2>
    </a>
    @foreach ($categories as $item)
    <a href="/catalog/{{$item->category}}" class="list-group-item list-group-item-action">{{$item->category}}</a>
    @endforeach
    <br>
  </div>
</div>
<br>
<div class="container info">
  <h2>Сортировка</h2>
  <form class="" action="{{route("catalog")}}" method="get">
    <div class="form-group">
      <label for="sortby"><h5>Категория</h5></label>
      <select class="form-select" aria-label="Default select example" name="sortby" id="sortby">
        <option disabled selected>Выберите критерий</option>
        @foreach ($categories as $item)
        <option value="{{$item->category}}">{{$item->category}}</option>
        @endforeach
      </select>
    </div>
    <br>
    <div class="form-group">
      <label for="orderbycategory"><h5>Сортировать по</h5></label>
      <select class="form-select" aria-label="Default select example" name="orderbycategory" id="orderbycategory">
        <option disabled selected>Выберите критерий</option>
        <option value="title">Названию</option>
        <option value="cost">Цене</option>
      </select>
      <br>
      <select class="form-select" aria-label="Default select example" name="orderby" id="orderby">
        <option disabled selected>Выберите критерий</option>
        <option value="asc">По возрастанию</option>
        <option value="desc">По убыванию</option>
      </select>
    </div>
    <br>
    <label for="cost"><h5>Цена</h5></label>
    <div class="row" id="cost">
      <div class="col">
        <input type="text" class="form-control" placeholder="от" name="costfrom" id="costfrom">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="до" name="costto" id="costto">
      </div>
    </div>
    <br>
    <input type="submit" name="button" value="Сортировать" class="btn btn-warning btn-lg btn-block">
  </form>
  <br>
</div>
@endsection
@section('right_content')
<h1>Каталог товаров</h1>
<div class="row row-cols-1 row-cols-md-3 g-4 right-menu">
  @foreach ($catalogs as $item)
  <div class="col">
    <div class="card card-item">
      <img src="{{$item->img}}" class="card-img-top size-100-200" alt="Нет изображения">
      <div class="card-body">
        @if (strlen($item->title) > 35)
        <h5 class="card-title">{{mb_substr($item->title, 0, 35).'...'}}</h5>
        @else
        <h5 class="card-title">{{$item->title}}</h5>
        @endif
        @if (strlen($item->description) > 80)
        <p class="card-text">{{mb_substr($item->description, 0, 80).'...'}}</p>
        @else
        <p class="card-text">{{$item->description}}</p>
        @endif
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Стоимость: {{$item->cost}} р.</li>
      </ul>
      <div class="card-body">
        <div class="navigation-buttons">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12" style="padding-left: 0px; margin: auto; padding-bottom: 1%;">
                <form class="" action="/buy" method="post">
                  @csrf
                  <p>
                    <label for="count">Количество</label>
                    <input type="number" id="count" name="count" value="1" min="1" max="100" step="1" class="input_count">
                  </p>
                  <button name="item_id" id="item_id" value="{{$item->id}}" class="btn submit-212529">В корзину</button>
                </form>
              </div>
              <div class="col-lg-12"  style="padding-left: 0px; margin: auto; padding-bottom: 1%;">
                <form class="" action="/item/{{$item->id}}" method="get">
                  <button name="item_id" id="item_id" value="{{$item->id}}" class="btn submit-212529">Подробнее</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<br>
<div class="container">
  <div class="row  row-cols-1 row-cols-md-3 g-4">
    <div class="col-lg-3" style="padding-left: 35%;">
      {{$catalogs->onEachSide(5)->links()}}
    </div>
  </div>
</div>
@endsection
