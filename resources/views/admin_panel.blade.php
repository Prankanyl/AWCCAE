@extends('layout')
@section('title')
Кабинет администратора
@endsection
@section('style')
@endsection
@section('left_content')
<div class="menu">
  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action"  aria-current="true" role="button">
      <h3>Таблицы база данных</h3>
    </a>
    <!-- <a href="#" class="list-group-item list-group-item-action" id="" name=""  onclick="openDiv(event, 'Basket')">Корзина</a> -->
    <a href="#" class="list-group-item list-group-item-action" id="" name=""  onclick="openDiv(event, 'Catalog')">Каталог</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name=""  onclick="openDiv(event, 'CategoryCatalog')">Категории каталога</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name=""  onclick="openDiv(event, 'Company')">Компании</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name=""  onclick="openDiv(event, 'Review')">Отзывы</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name=""  onclick="openDiv(event, 'Declaration')">Объявления</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name=""  onclick="openDiv(event, 'User')">Пользователи</a>
    <a href="#" class="list-group-item list-group-item-action" id="" name=""  onclick="openDiv(event, 'VisitLog')">Журнал посещения</a>
  </div>
</div>
@endsection
@section('right_content')
<div class="tab">
  <button class="tablinks" onclick="openDiv(event, 'Person')">Личный данные</button>
  <button class="tablinks" onclick="openDiv(event, 'AddPerson')">Добавить пользователя</button>
  <button class="tablinks" onclick="openDiv(event, 'AddCompany')">Добавить компанию</button>
  <button class="tablinks" onclick="openDiv(event, 'AddCatalog')">Добавить материалы</button>
  <!-- <button class="tablinks" onclick="openDiv(event, 'AddDeclaration')">Добавить категорию</button> -->
  <form class="" action="/" method="post">
    @csrf
    <button class="tablinks" id="exit" name="exit" value="exit">Выйти</button>
  </form>
</div>

<div id="Person" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <img src="{{$admin->img}}" alt="...">
      </div>
      <div class="col-lg-8">
        <h3>Личные данные</h3>
        <p><b>Логин:</b> {{$admin->login}}</p>
        <p><b>Фамилия:</b> {{$admin->lastname}}</p>
        <p><b>Имя:</b> {{$admin->firstname}}</p>
        <p><b>Отчество:</b> {{$admin->patronymic}}</p>
        <p><b>Email:</b> {{$admin->email}}</p>
        <p><b>Телефон:</b> {{$admin->number_phone}}</p>
        <p><b>Права доступа:</b> {{$admin->access_rights}}</p>
      </div>
    </div>
  </div>
</div>

<div id="AddPerson" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <form class="row g-3" action="/admin_panel" method="post">
          @csrf
           <div class="col-mb-6">
             <label for="login" class="form-label">Логин</label>
             <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp">
             <div id="loginHelp" class="form-text">Введите логин</div>
           </div>
           <div class="col-mb-6">
             <label for="email" class="form-label">Email</label>
             <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
             <div id="emailHelp" class="form-text">Введите email</div>
           </div>
           <div class="col-mb-6">
             <label for="password" class="form-label">Пароль</label>
             <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordlHelp">
             <div id="passwordlHelp" class="form-text">Введите логин</div>
           </div>
           <div class="col-mb-6">
             <label for="number_phone" class="form-label">Номер телефона</label>
             <input type="text" class="form-control" id="number_phone" name="number_phone" aria-describedby="number_phoneHelp">
             <div id="number_phoneHelp" class="form-text">Пример: +375441234567</div>
           </div>
           <div class="col-mb-6">
             <label for="lastname" class="form-label">Фамилия</label>
             <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastnameHelp">
             <div id="lastnameHelp" class="form-text">Введите свою фамилию</div>
           </div>
           <div class="col-mb-6">
             <label for="firstname" class="form-label">Имя</label>
             <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstnameHelp">
             <div id="firstnameHelp" class="form-text">Введите свое имя</div>
           </div>
           <div class="col-mb-6">
             <label for="patronymic" class="form-label">Отчество</label>
             <input type="text" class="form-control" id="patronymic" name="patronymic" aria-describedby="patronymicHelp">
             <div id="patronymicHelp" class="form-text">Введите свое отчество</div>
           </div>
           <button type="submit" class="btn btn-primary" id="registration_user" name="registration_user" value="true">Зарегистрироваться</button>
         </form>
      </div>
    </div>
  </div>
</div>
<div id="AddCompany" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <form class="row g-3" action="/admin_panel" method="post">
          @csrf
          <div class="col-mb-6">
            <label for="id_users" class="form-label">ID пользователя</label>
            <input type="text" class="form-control" id="id_users" name="id_users" aria-describedby="id_usersHelp">
            <div id="id_usersHelp" class="form-text">Введите ID пользователя</div>
          </div>
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
      </div>
    </div>
  </div>
</div>

<div id="AddCatalog" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <form class="row g-3" action="/admin_panel" method="post" enctype="multipart/form-data">
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
             <div id="imgHelp" class="form-text">Добавте фотографию материала</div>
           </div>
           <div class="col-mb-6">
             <label for="cost" class="form-label">Стоимость</label>
             <input type="text" class="form-control" id="cost" name="cost" aria-describedby="costHelp">
             <div id="costHelp" class="form-text">Введите стоимость</div>
           </div>
           <button type="submit" class="btn btn-primary" id="add_catalog_item" name="add_catalog_item" value="true">Добавить</button>
         </form>
      </div>
    </div>
  </div>
</div>
<div id="Basket" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 style="text-align: center;">Корзина</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Время добавления</th>
              <th scope="col">Время обновления</th>
              <th scope="col">id пользователя</th>
              <th scope="col">id каталога</th>
              <th scope="col">id объявления</th>
              <th scope="col">Количество</th>
              <th scope="col">Статус</th>
              <th scope="col">Удалить</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($basket as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->category}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->img}}</td>
              <td>{{$item->cost}}</td>
              <td>
                <form class="" action="/admin_panel" method="post">
                  @csrf
                  <button type="submit" class="btn btn-primary" name="delete_baskets" id="delete_baskets" value="{{$item->id}}">Удалить</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="Catalog" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 style="text-align: center;">Каталог</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Категория</th>
              <th scope="col">Название</th>
              <th scope="col">Описание</th>
              <th scope="col">Картинка</th>
              <th scope="col">Стоимость</th>
              <!-- <th scope="col">Удалить</th> -->
            </tr>
          </thead>
          <tbody>
            @foreach ($catalog as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->category}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->img}}</td>
              <td>{{$item->cost}}</td>
              <!-- <td>
                <form class="" action="/admin_panel" method="post">
                  @csrf
                  <button type="submit" class="btn btn-primary" name="delete_catalogs" id="delete_catalogs" value="{{$item->id}}">Удалить</button>
                </form>
              </td> -->
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="CategoryCatalog" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 style="text-align: center;">Категории каталога</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Категория</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->category}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="Company" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 style="text-align: center;">Компании</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">id пользователя</th>
              <th scope="col">Название</th>
              <th scope="col">Сокращенное наименование</th>
              <th scope="col">Счет</th>
              <th scope="col">Наименование банка</th>
              <th scope="col">Адрес</th>
              <th scope="col">БИК</th>
              <th scope="col">УПН</th>
              <th scope="col">Полный адрес</th>
              <th scope="col">Телефон</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($company as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->id_users}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->abbreviated_name}}</td>
              <td>{{$item->iban}}</td>
              <td>{{$item->bank_name}}</td>
              <td>{{$item->address}}</td>
              <td>{{$item->bic}}</td>
              <td>{{$item->ynp}}</td>
              <td>{{$item->legal_address}}</td>
              <td>{{$item->number_phone}}</td>
              <td>{{$item->email}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="Review" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 style="text-align: center;">Отзывы</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Email</th>
              <th scope="col">Тема</th>
              <th scope="col">Отзыв</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($contact as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->email}}</td>
              <td>{{$item->subject}}</td>
              <td>{{$item->message}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="Declaration" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 style="text-align: center;">Объявления</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Категория</th>
              <th scope="col">Название</th>
              <th scope="col">Описание</th>
              <th scope="col">Картинка</th>
              <th scope="col">Стоимость</th>
              <th scope="col">id пользователя</th>
              <th scope="col">Вид</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($declarations as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->category}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->img}}</td>
              <td>{{$item->cost}}</td>
              <td>{{$item->id_users}}</td>
              <td>{{$item->view}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="User" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 style="text-align: center;">Пользователи</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Логин</th>
              <th scope="col">Email</th>
              <th scope="col">Пароль</th>
              <th scope="col">Аватарка</th>
              <th scope="col">Телефон</th>
              <th scope="col">id компании</th>
              <th scope="col">Права доступа</th>
              <th scope="col">Фамилия</th>
              <th scope="col">Имя</th>
              <th scope="col">Отчество</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->login}}</td>
              <td>{{$item->email}}</td>
              <td>{{$item->password}}</td>
              <td>{{$item->img}}</td>
              <td>{{$item->number_phone}}</td>
              <td>{{$item->id_companies}}</td>
              <td>{{$item->access_rights}}</td>
              <td>{{$item->lastname}}</td>
              <td>{{$item->firstname}}</td>
              <td>{{$item->patronymic}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div id="VisitLog" class="tabcontent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h3 style="text-align: center;">Журнал посещения</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Время</th>
              <th scope="col">id пользователя</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($visit_log as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->time}}</td>
              <td>{{$item->id_users}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
function openDiv(evt, divName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(divName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
@endsection
