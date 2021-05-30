@extends('layout')
@section('title')
Авторизация
@endsection
@section('style')
<link rel="stylesheet" href="css/style_authorization.css">
@endsection
@section('header')
  <div class="container">
   <div class="row">
     <div class="col-md-offset-3 col-md-6">
       <form class="form-horizontal" action="/cabinet" method="post">
         @csrf
         <span class="heading"><h1>АВТОРИЗАЦИЯ</h1></span>
         @if(isset($sing_in))
         <p class="warning-text"><b>{{$sing_in}}</b></p>
         @endif
         <div class="form-group">
           <input type="text" class="form-control" id="login" name="login" placeholder="E-mail or Login">
           <i class="fa fa-user"></i>
         </div>
         <div class="form-group help">
           <input type="password" class="form-control" id="password" name="password" placeholder="Password">
           <i class="fa fa-lock"></i>
         </div>
         <div class="form-group">
         <!-- <div class="main-checkbox">
         <input type="checkbox" value="none" id="checkbox1" name="check"/>
         <label for="checkbox1"></label>
         </div>
         <span class="text">Запомнить</span> -->
         <a href="/registration_user">Регистрация</a>
         <!-- <a href="#">Забыли пароль?</a> -->
           <button type="submit" class="btn btn-default" id="sign_in" name="sign_in">ВХОД</button>
           <!-- <input type="submit" name="sign_in" id="sign_in" value="ВХОД" class="btn btn-default"> -->
         </div>
       </form>
     </div>
   </div>
  </div>
@endsection
@section('left_content')
@endsection
@section('right_content')

@endsection
