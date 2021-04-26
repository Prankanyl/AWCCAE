@extends('layout')
@section('title')
Авторизация
@endsection
@section('style')
<link rel="stylesheet" href="css/style_authorization.css">
@endsection
@section('header')
<div class="container-center">
  <div class="container">
   <div class="row">
     <div class="col-md-offset-3 col-md-6">
       <form class="form-horizontal">
         <span class="heading"><h1>АВТОРИЗАЦИЯ</h1></span>
         <div class="form-group">
           <input type="email" class="form-control" id="inputEmail" placeholder="E-mail">
           <i class="fa fa-user"></i>
         </div>
         <div class="form-group help">
           <input type="password" class="form-control" id="inputPassword" placeholder="Password">
           <i class="fa fa-lock"></i>
         </div>
         <div class="form-group">
         <!-- <div class="main-checkbox">
         <input type="checkbox" value="none" id="checkbox1" name="check"/>
         <label for="checkbox1"></label>
         </div>
         <span class="text">Запомнить</span> -->
          <button type="submit" class="btn btn-default">ВХОД</button>
         </div>
       </form>
     </div>
   </div>
  </div>
</div>
@endsection
@section('left_content')
@endsection
@section('right_content')

@endsection
