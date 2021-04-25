@extends('layout_with_left_menu')
@section('title')
Контакты
@endsection
@section('right_content')
<div class="info">
  <h2>Контактная информация</h2>

</div>
@endsection
@section('footer')
<div class="review">
  <div class="container">
    <h2>Отзывы</h2>
    @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error): ?>
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
@endsection
