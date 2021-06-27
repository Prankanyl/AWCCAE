@extends('layout')
@section('title')
Личный кабинет
@endsection
@section('style')
<link rel="stylesheet" href="css/style_authorization.css">
@endsection
@section('left_content')
<div class="menu">
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
<div class="tab">
  <button class="tablinks" onclick="openDiv(event, 'Person')">Личный данные</button>
  <button class="tablinks" onclick="openDiv(event, 'Company')">Данные компании</button>
  <button class="tablinks" onclick="openDiv(event, 'Basket')">Корзина</button>
  <button class="tablinks" onclick="openDiv(event, 'Declaration')">Мои объявления</button>
  <form class="" action="/" method="post">
    @csrf
    <button class="tablinks" id="exit" name="exit" value="exit">Выйти</button>
  </form>
</div>

<div id="Person" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <img src="{{$user->img}}" alt="...">
      </div>
      <div class="col-lg-8">
        <h3>Личные данные</h3>
        <p><b>Логин:</b> {{$user->login}}</p>
        <p><b>Фамилия:</b> {{$user->lastname}}</p>
        <p><b>Имя:</b> {{$user->firstname}}</p>
        <p><b>Отчество:</b> {{$user->patronymic}}</p>
        <p><b>Email:</b> {{$user->email}}</p>
        <p><b>Телефон:</b> {{$user->number_phone}}</p>
        <p><b>Права доступа:</b> {{$user->access_rights}}</p>
        <form class="" action="/registration_user" method="get">
          <button class="btn btn-primary" type="submit" id="update_user" name="update_user" value="{{$user->id}}">Изменить</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="Company" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        @if(isset($company))
        <h3>Данные о компании</h3>
        <form class="row g-3" action="/cabinet" method="post">
          @csrf
           <div class="col-mb-6">
             <label for="title" class="form-label">Название компании</label>
             <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" value="{{$company->title}}">
             <div id="titleHelp" class="form-text">Введите название компании</div>
           </div>
           <div class="col-mb-6">
             <label for="abbreviated_name" class="form-label">Сокращенное наименование</label>
             <input type="text" class="form-control" id="abbreviated_name" name="abbreviated_name" aria-describedby="abbreviated_namelHelp"  value="{{$company->abbreviated_name}}">
             <div id="abbreviated_namelHelp" class="form-text">Введите сокращенное наименование</div>
           </div>
           <div class="col-mb-6">
             <label for="iban" class="form-label">Расчетный счет</label>
             <input type="text" class="form-control" id="iban" name="iban" aria-describedby="ibanHelp"  value="{{$company->iban}}">
             <div id="ibanHelp" class="form-text">Введите расчетный счет</div>
           </div>
           <div class="col-mb-6">
             <label for="bank_name" class="form-label">Наименование банка</label>
             <input type="text" class="form-control" id="bank_name" name="bank_name" aria-describedby="bank_nameHelp" value="{{$company->bank_name}}">
             <div id="bank_nameHelp" class="form-text">Введите наименование банка</div>
           </div>
           <div class="col-mb-6">
             <label for="address" class="form-label">Адрес</label>
             <input type="text" class="form-control" id="address" name="address" aria-describedby="addressHelp" value="{{$company->address}}">
             <div id="addressHelp" class="form-text">Введите адрес</div>
           </div>
           <div class="col-mb-6">
             <label for="bic" class="form-label">БИК</label>
             <input type="text" class="form-control" id="bic" name="bic" aria-describedby="bicHelp" value="{{$company->bic}}">
             <div id="bicHelp" class="form-text">Введите БИК</div>
           </div>
           <div class="col-mb-6">
             <label for="ynp" class="form-label">УНП</label>
             <input type="text" class="form-control" id="ynp" name="ynp" aria-describedby="ynpHelp" value="{{$company->ynp}}">
             <div id="ynpHelp" class="form-text">Введите УНП</div>
           </div>
           <div class="col-mb-6">
             <label for="legal_address" class="form-label">Юридический адрес</label>
             <input type="text" class="form-control" id="legal_address" name="legal_address" aria-describedby="legal_addressHelp" value="{{$company->legal_address}}">
             <div id="legal_addressHelp" class="form-text">Введите юридический адрес</div>
           </div>
           <div class="col-mb-6">
             <label for="number_phone" class="form-label">Номер телефона</label>
             <input type="text" class="form-control" id="number_phone" name="number_phone" aria-describedby="number_phoneHelp" value="{{$company->number_phone}}">
             <div id="number_phoneHelp" class="form-text">Пример: +375441234567</div>
           </div>
           <div class="col-mb-6">
             <label for="email" class="form-label">Email</label>
             <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{$company->email}}">
             <div id="emailHelp" class="form-text">Введите email</div>
           </div>
           <p>
             <button type="submit" class="btn btn-primary" id="update_company" name="update_company" value="{{$company->id}}">Изменить</button>
             <button type="submit" class="btn btn-primary" id="delete_company" name="delete_company" value="{{$company->email}}">Удалить</button>
           </p>
           </form>
        @else
        <h3>Пожалуйста, заполните данные о компании!</h3>
        <form class="row g-3" action="/registration" method="post">
          @csrf
           <div class="col-mb-6">
             <label for="title" class="form-label">Название компании</label>
             <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">
             <div id="titleHelp" class="form-text">Введите название компании</div>
           </div>
           <div class="col-mb-6">
             <label for="abbreviated_name" class="form-label">Сокращенное наименование</label>
             <input type="text" class="form-control" id="abbreviated_name" name="abbreviated_name" aria-describedby="abbreviated_namelHelp">
             <div id="abbreviated_namelHelp" class="form-text">Введите сокращенное наименование</div>
           </div>
           <div class="col-mb-6">
             <label for="iban" class="form-label">Расчетный счет</label>
             <input type="text" class="form-control" id="iban" name="iban" aria-describedby="ibanHelp">
             <div id="ibanHelp" class="form-text">Введите расчетный счет</div>
           </div>
           <div class="col-mb-6">
             <label for="bank_name" class="form-label">Наименование банка</label>
             <input type="text" class="form-control" id="bank_name" name="bank_name" aria-describedby="bank_nameHelp">
             <div id="bank_nameHelp" class="form-text">Введите наименование банка</div>
           </div>
           <div class="col-mb-6">
             <label for="address" class="form-label">Адрес</label>
             <input type="text" class="form-control" id="address" name="address" aria-describedby="addressHelp">
             <div id="addressHelp" class="form-text">Введите адрес</div>
           </div>
           <div class="col-mb-6">
             <label for="bic" class="form-label">БИК</label>
             <input type="text" class="form-control" id="bic" name="bic" aria-describedby="bicHelp">
             <div id="bicHelp" class="form-text">Введите БИК</div>
           </div>
           <div class="col-mb-6">
             <label for="ynp" class="form-label">УНП</label>
             <input type="text" class="form-control" id="ynp" name="ynp" aria-describedby="ynpHelp">
             <div id="ynpHelp" class="form-text">Введите УНП</div>
           </div>
           <div class="col-mb-6">
             <label for="legal_address" class="form-label">Юридический адрес</label>
             <input type="text" class="form-control" id="legal_address" name="legal_address" aria-describedby="legal_addressHelp">
             <div id="legal_addressHelp" class="form-text">Введите юридический адрес</div>
           </div>
           <div class="col-mb-6">
             <label for="number_phone" class="form-label">Номер телефона</label>
             <input type="text" class="form-control" id="number_phone" name="number_phone" aria-describedby="number_phoneHelp">
             <div id="number_phoneHelp" class="form-text">Пример: +375441234567</div>
           </div>
           <div class="col-mb-6">
             <label for="email" class="form-label">Email</label>
             <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
             <div id="emailHelp" class="form-text">Введите email</div>
           </div>
           <button type="submit" class="btn btn-primary" id="registration_company" name="registration_company" value="true">Зарегистрировать</button>
         </form>
        @endif
      </div>
    </div>
  </div>
</div>

<div id="Basket" class="tabcontent">
  <h3>Корзина</h3>
  @if(!$catalogs->isEmpty())
  <h3>Товары</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <td>id</td>
        <td>Категория</td>
        <td>Название</td>
        <td>Стоимость за 1 ед.</td>
        <td>Количество</td>
        <td>Сумма</td>
        <td>Подробнее</td>
        <td>Оплатить</td>
        <td>Удалить</td>
      </tr>
    </thead>
    <tbody>
      @foreach($catalogs as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->category}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->cost}}</td>
        <td>{{$item->count}}</td>
        <td>{{$item->cost * $item->count}}</td>
        <td>
          <form class="" action="/item/{{$item->id}}" method="get">
            <button name="item_id" id="item_id" value="{{$item->id}}" class="btn btn-primary">Подробнее</button>
          </form>
        </td>
        <td>
          <form class="" action="/cabinet" method="post">
            @csrf
            <button type="submit" class="btn btn-primary" name="pay" id="pay" value="{{$item->id}}">Купить</button>
          </form>
        </td>
        <td>
          <form class="" action="/cabinet" method="post">
            @csrf
            <button type="submit" class="btn btn-primary" name="delete" id="delete" value="{{$item->id}}">Удалить</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif

  @if(!$declarations->isEmpty())
  <h3>Объявления</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <td>id</td>
        <td>Категория</td>
        <td>Название</td>
        <td>Стоимость за 1 ед.</td>
        <td>Количество</td>
        <td>Сумма</td>
        <td>Подробнее</td>
        <td>Удалить</td>
      </tr>
    </thead>
    <tbody>
      @foreach($declarations as $item)
      <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->category}}</td>
        <td>{{$item->title}}</td>
        <td>{{$item->cost}}</td>
        <td>{{$item->count}}</td>
        <td>{{$item->cost * $item->count}}</td>
        <td>
          <form class="" action="/item/{{$item->id}}" method="get">
            <button name="declaration_item_id" id="declaration_item_id" value="{{$item->id}}" class="btn btn-primary">Подробнее</button>
          </form>
        </td>
        <td>
          <form class="" action="/cabinet" method="post">
            @csrf
            <button type="submit" class="btn btn-primary" name="delete_declaration" id="delete_declaration" value="{{$item->id}}">Удалить</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif
</div>

<div id="Declaration" class="tabcontent">
  <h3>Мои объявления</h3>
  <button class="tablinks btn submit-212529" onclick="openDiv(event, 'AddDeclaration')">Добавить объявление</button>
  <div class="row row-cols-1 row-cols-md-3 g-4 right-menu">
    @foreach ($my_declarations as $item)
    <div class="col">
      <div class="card card-item">
        <div class="img_text">
          <img src="{{$item->img}}" class="card-img-top size-100-200" alt="Нет изображения">
          @if($item->view == 'Продажа')
          <div class="top-right red"><b>{{$item->view}}</b></div>
          @else
          <div class="top-right green"><b>{{$item->view}}</b></div>
          @endif
        </div>
        <div class="card-body">
          @if (strlen($item->title) > 35)
          <h5 class="card-title">{{mb_substr($item->title, 0, 35).'...'}}</h5>
          @else
          <h5 class="card-title">{{$item->title}}</h5>
          @endif
          @if (strlen($item->description) > 80)
          <p class="card-text">{{mb_substr($item->description, 0, 80).'...'}}</p>
          @else
          <p class="card-text">{{$item->description}}</p>
          @endif
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Стоимость: {{$item->cost}} р.</li>
        </ul>
        <div class="card-body">
          <div class="navigation-buttons">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12" style="padding-left: 0px; margin: auto; padding-bottom: 1%;">
                  <form class="" action="/update" method="get">
                    @csrf
                    <p>
                      <label for="count">Количество</label>
                      <input type="number" id="count" name="count" value="1" min="1" max="100" step="1" class="input_count" disabled>
                    </p>
                    <button name="declaration_item_id" id="declaration_item_id" value="{{$item->id}}" class="btn submit-212529">Изменить</button>
                  </form>
                </div>
                <div class="col-lg-12"  style="padding-left: 0px; margin: auto; padding-bottom: 1%;">
                  <form class="" action="/item/{{$item->id}}" method="get">
                    <button name="declaration_item_id" id="declaration_item_id" value="{{$item->id}}" class="btn submit-212529">Подробнее</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<div id="AddDeclaration" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <form class="row g-3" action="/cabinet" method="post" enctype="multipart/form-data">
          @csrf
           <div class="col-mb-6">
             <label for="category" class="form-label">Название категории</label>
             <select class="form-select" aria-label="categoryHelp" name="category" id="category">
               <option disabled selected>Выберите критерий</option>
               @foreach ($categories as $item)
               <option value="{{$item->category}}">{{$item->category}}</option>
               @endforeach
             </select>
             <div id="categoryHelp" class="form-text">Выберите название категории</div>
           </div>
           <div class="col-mb-6">
             <label for="title" class="form-label">Название товара</label>
             <input type="text" class="form-control" id="title" name="title" aria-describedby="titlelHelp">
             <div id="titlelHelp" class="form-text">Введите товара</div>
           </div>
           <div class="col-mb-6">
             <label for="description" class="form-label">Описание товара</label>
             <!-- <textarea class="form-control"id="description" name="description" aria-describedby="descriptionHelp"> -->
             <input type="text" class="form-control" id="description" name="description" aria-describedby="descriptionHelp">
             <div id="descriptionHelp" class="form-text">Введите описание товара</div>
           </div>
           <div class="col-mb-6">
             <label for="img" class="form-label">Картинка</label>
             <input type="file" class="form-control" id="img" name="img" aria-describedby="imgHelp">
             <div id="imgHelp" class="form-text">Не обязательно</div>
           </div>
           <div class="col-mb-6">
             <label for="cost" class="form-label">Стоимость</label>
             <input type="text" class="form-control" id="cost" name="cost" aria-describedby="costHelp">
             <div id="costHelp" class="form-text">Введите стоимость</div>
           </div>
           <div class="col-mb-6">
             <label for="view" class="form-label">Тип объявления</label>
             <select class="form-select" aria-label="viewHelp" name="view" id="view">
               <option disabled selected>Выберите тип объявления</option>
               <option value="Продажа">Продажа</option>
               <option value="Покупка">Покупка</option>
             </select>
             <div id="categoryHelp" class="form-text">Выберите название категории</div>
           </div>
           <button type="submit" class="btn btn-primary" id="add_declaration_item" name="add_declaration_item" value="true">Добавить</button>
         </form>
      </div>
    </div>
  </div>
</div>

<script>
function openDiv(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
@endsection
