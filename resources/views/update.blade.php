@extends('layout')
@section('title')
Регистрация пользователя
@endsection
@section('header')
<div class="container-center">
  <div class="container">
   <div class="row">
     <form class="row g-3" action="/declaration_update" method="post" enctype="multipart/form-data">
       @csrf
        <h3>Изменить объявление</h3>
        <div class="col-mb-6">
          <label for="category" class="form-label">Название категории</label>
          <select class="form-select" aria-label="categoryHelp" name="category" id="category">
            <option disabled>Выберите критерий</option>
            @foreach ($categories as $item)
            @if($declaration->category == $item->category)
            <option value="{{$item->category}}" selected>{{$item->category}}</option>
            @else
            <option value="{{$item->category}}">{{$item->category}}</option>
            @endif
            @endforeach
          </select>
          <div id="categoryHelp" class="form-text">Выберите название категории</div>
        </div>
        <div class="col-mb-6">
          <label for="title" class="form-label">Название товара</label>
          <input type="text" class="form-control" id="title" name="title" aria-describedby="titlelHelp" value="{{$declaration->title}}">
          <div id="titlelHelp" class="form-text">Введите товара</div>
        </div>
        <div class="col-mb-6">
          <label for="description" class="form-label">Описание товара</label>
          <!-- <textarea class="form-control"id="description" name="description" aria-describedby="descriptionHelp"> -->
          <input type="text" class="form-control" id="description" name="description" aria-describedby="descriptionHelp" value="{{$declaration->description}}">
          <div id="descriptionHelp" class="form-text">Введите описание товара</div>
        </div>
        <div class="col-mb-6">
          <label for="img" class="form-label">Картинка</label>
          <input type="file" class="form-control" id="img" name="img" aria-describedby="imgHelp" value="{{$declaration->img}}">
          <input type="text" class="form-control" id="image" name="image" aria-describedby="imgHelp" value="{{$declaration->img}}" hidden>
          <div id="imgHelp" class="form-text">Не обязательно</div>
        </div>
        <div class="col-mb-6">
          <label for="cost" class="form-label">Стоимость</label>
          <input type="text" class="form-control" id="cost" name="cost" aria-describedby="costHelp" value="{{$declaration->cost}}">
          <div id="costHelp" class="form-text">Введите стоимость</div>
        </div>
        <div class="col-mb-6">
          <label for="view" class="form-label">Тип объявления</label>
          <select class="form-select" aria-label="viewHelp" name="view" id="view">
            <option disabled>Выберите тип объявления</option>
            @if($declaration->view == 'Продажа')
            <option value="Продажа" selected>Продажа</option>
            @else
            <option value="Покупка" selected>Покупка</option>
            @endif
          </select>
          <div id="categoryHelp" class="form-text">Выберите название категории</div>
        </div>
        <button type="submit" class="btn btn-primary" id="update_declaration_item" name="update_declaration_item" value="{{$declaration->id}}">Изменить</button>
        <button type="submit" class="btn btn-primary" id="delete_declaration_item" name="delete_declaration_item" value="{{$declaration->id}}">Удалить</button>
      </form>
    </div>
  </div>
</div>
@endsection
@section('left_content')
@endsection
@section('right_content')
@endsection
