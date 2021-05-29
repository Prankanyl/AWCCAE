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
      <img src="/images/{{$product->img}}" alt="" class="size-200-200">
    </div>
    <div class="col-lg-8">
      <h2>{{$product->category}}</h2>
      <p><b>Название:</b> {{$product->title}}</p>
      <p><b>Цена:</b> {{$product->cost}} р.</p>
      <p><b>Описание:</b> {{$product->description}}</p>
    </div>
  </div>



</div>
@endsection
