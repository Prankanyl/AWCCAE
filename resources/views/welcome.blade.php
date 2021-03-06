@extends('layout')
@section('title')
AWCCAE
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
@endsection
@section('right_content')
<br>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slide-1.jpeg" class="d-block w-100" alt="..." style="height: 350px;">
    </div>
    <div class="carousel-item">
      <img src="images/slide-2.jpeg" class="d-block w-100" alt="..." style="height: 350px;">
    </div>
    <div class="carousel-item">
      <img src="images/slide-3.jpeg" class="d-block w-100" alt="..." style="height: 350px;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
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
@endsection
