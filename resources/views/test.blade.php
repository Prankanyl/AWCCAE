<div class="container-fluid">
  <div class="row">
    <h3>Личные данные</h3>
    <div class="col-lg-4">
      <img src="" alt="">
    </div>
    <div class="col-lg-8">
      <p><b>Логин:</b> {{$user->login}}</p>
      <p><b>Фамилия:</b> {{$user->lastname}}</p>
      <p><b>Имя:</b> {{$user->firstname}}</p>
      <p><b>Отчество:</b> {{$user->patronymic}}</p>
      <p><b>Email:</b> {{$user->email}}</p>
      <p><b>Телефон:</b> {{$user->number_phone}}</p>
    </div>
  </div>
</div>
