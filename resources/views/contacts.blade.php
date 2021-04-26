@extends('layout')
@section('title')
Контакты
@endsection
@section('style')
<link rel="stylesheet" href="css/style_contacts.css">
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
<div class="container info">
  <div class="row">
    <div class="col-lg-12">
      <h1>Информация</h1>
      <p>Интернет магазин строительных материалов <b>AWCCAE.COM</b></p>
      <p>AWCCAE.COM — это один из ведущих поставщиков строительных и отделочных материалов в Беларуси. Мы осуществляем поставки во все регионы страны — для строительных организаций, специализированных бригад, строителей и на объекты частной застройки.</p>
      <h1>Контакты:</h1>
      <p><b>Телефон МТС:</b> +375291234567</p>
      <p><b>Телефон А1:</b> +375441234567</p>
      <p><b>Email:</b> awccae@awccae.com</p>

    </div>
  </div>
</div>
@endsection
@section('footer')
<div class="review">
  <div class="container">
    <h1>Напишите свой отзыв</h1>
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form class="" action="/review" method="post">
      @csrf
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email адресс</label>
        <input type="email" name="email" id="email " class="form-control" placeholder="name@example.com">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">Отзыв</label>
        <input type="text" name="subject" id="subject " class="form-control" placeholder="Введите отзыв">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Сообщение</label>
        <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение" rows="3"></textarea>
      </div>
      <button type="submit" name="submit" class="form-control btn btn-warning">Отправить</button>
    </form>
  </div>
</div>
<div class="review-block">
  <div class="container">
    <h1>Отзывы пользователей</h1>
    @foreach ($reviews as $item)
      <div class="review-card">
        <div class="card">
          <div class="card-header">
            {{$item->email}}
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$item->subject}}</h5>
            <p class="card-text">{{$item->message}}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
