@extends('layout')
@section('title')
@endsection
@section('style')
@endsection
@section('left_content')
<div class="menu info">
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
<div class="container info">
  <div class="row">
    <div class="col-lg-4">
      <img src="{{$product->img}}" alt="" class="size-200-200">
    </div>
    <div class="col-lg-8">
      <h2>{{$product->category}}</h2>
      <p><b>Название:</b> {{$product->title}}</p>
      <p><b>Цена:</b> {{$product->cost}} р.</p>
      <p><b>Описание:</b> {{$product->description}}</p>
      @if(!is_null($user))
      <p><b>ФИО:</b> {{$user->lastname}} {{$user->firstname}} {{$user->patronymic}}</p>
      <p><b>Телефон:</b> {{$user->number_phone}}</p>
      @endif
      <form class="" action="/buy" method="post">
        @csrf
        <p>
          <label for="count">Количество</label>
          <input type="number" id="count" name="count" value="1" min="1" max="100" step="1" class="input_count">
        </p>
        @if($item_id)
        <button name="item_id" id="item_id" value="{{$item->id}}" class="btn submit-212529">В корзину</button>
        @else
        <button name="declaration_item_id" id="declaration_item_id" value="{{$item->id}}" class="btn submit-212529">В корзину</button>
        @endif
      </form>
    </div>
  </div>



</div>
@endsection
