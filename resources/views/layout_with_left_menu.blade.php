@extends('layout')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4">
      <div class="menu">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action"  aria-current="true" role="button">
            <h3>Каталог товаров</h3>
          </a>
          <a href="#" class="list-group-item list-group-item-action">A second link item</a>
          <a href="#" class="list-group-item list-group-item-action">A third link item</a>
          <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      @yield('right_content')
    </div>
  </div>
</div>
@endsection
