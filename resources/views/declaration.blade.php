@extends('layout')
@section('title')
Объявления
@endsection
@section('left_content')
<div class="menu">
  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action"  aria-current="true" role="button">
      <h3>Каталог товаров</h3>
    </a>
@foreach ($categories as $item)
    <a href="#" class="list-group-item list-group-item-action">{{$item->category}}</a>
    @endforeach
    <br>
  </div>
</div>
@endsection
@section('right_content')
<h1>Объявления</h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach ($declarations as $item)
  <div class="col">
    <div class="card" style="width: 18rem;  height: 31rem;">
      <img src="images/{{$item->img}}" class="card-img-top size-100-200" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$item->title}}</h5>
        <p class="card-text">{{$item->description}}</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Стоимость: {{$item->cost}}</li>
      </ul>
      <div class="card-body">
        <form class="" action="#" method="post">
          <button type="button" name="button">В корзину</button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
<br>
@endsection
