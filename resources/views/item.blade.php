@extends('layout')
@section('title')

@endsection
@section('style')
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
