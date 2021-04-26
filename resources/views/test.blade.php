<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</head>
<body class="btn-warning">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">AWCCAE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Главная</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/catalog">Каталог</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/declaration">Объявления</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contacts">Контакты</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/authorization">Авторизация</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
          <button class="btn btn-warning" type="submit">Поиск</button>
        </form>
      </div>
    </div>
  </nav>
  @yield('header')
  @yield('content')
  @yield('footer')
  <footer class="bg-dark text-center text-white">
    <div class="container p-4">
      <section class="mb-4">
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-twitter"></i>
        </a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-google"></i>
        </a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-instagram"></i>
        </a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-github"></i>
        </a>
      </section>
      <section class="">
        <form action="">
          <div class="row d-flex justify-content-center">
            <div class="col-auto">
              <p class="pt-2">
                <strong>Подпишитесь на нашу рассылку</strong>
              </p>
            </div>
            <div class="col-md-5 col-12">
              <div class="form-outline form-white mb-4">
                <input type="email" id="form5Example2" class="form-control" />
                <label class="form-label" for="form5Example2">Email адрес</label>
              </div>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn mb-4 btn-warning">
                Подписаться
              </button>
            </div>
          </div>
        </form>
      </section>
      <section class="mb-4">
        <p>
        AWCCAE - Лучшая интернет-платформа для продажи стройматериалов 2021 г. Сегодня, используя современные интернет-технологии, мы делаем покупку стройматериалов еще более простой и выгодной для покупателя.
        </p>
      </section>
      <section class="">
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">Link 1</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 2</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 3</a>
              </li>
              <li>
                <a href="#!" class="text-white">Link 4</a>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 БГУИР филиал "Минский радиотехнический колледж" :
      <a class="text-white" href="https://www.mrk-bsuir.by/ru">mrk-bsuir.by</a>
    </div>
  </footer>
</body>
</html>
