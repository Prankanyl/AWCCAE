@extends('layout')
@section('title')
AWCCAE
@endsection
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="Первый слайд">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Второй слайд">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Третий слайд">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action"  aria-current="true" role="button">
          <h3>Каталог товаров</h3>
        </a>
        <a href="#" class="list-group-item list-group-item-action">A second link item</a>
        <a href="#" class="list-group-item list-group-item-action">A third link item</a>
        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
      </div>
    </div>
    <div class="col-lg-8">

    </div>
  </div>
</div>
@endsection
