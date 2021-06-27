<div class="col-lg-8">
  <h3>Личные данные</h3>
  <p><b>Логин:</b> {{$user->login}}</p>
  <p><b>Фамилия:</b> {{$user->lastname}}</p>
  <p><b>Имя:</b> {{$user->firstname}}</p>
  <p><b>Отчество:</b> {{$user->patronymic}}</p>
  <p><b>Email:</b> {{$user->email}}</p>
  <p><b>Телефон:</b> {{$user->number_phone}}</p>
  <p><b>Права доступа:</b> {{$user->access_rights}}</p>
</div>

<h3>Данные компании</h3>

<h4>Сокращенное наименование:</h4>
<br>
<p><b>Название компании:</b> {{$company->title}}</p>
<p><b>Сокращенное наименование:</b> {{$company->abbreviated_name}}</p>

<h4>Банковские реквизиты:</h3>
<br>
<p><b>р/счет:</b> {{$company->iban}}</p>
<p><b>Полное наименование:</b> {{$company->bank_name}}</p>
<p><b>Адрес:</b> {{$company->address}}</p>
<p><b>БИК:</b> {{$company->bic}}</p>
<p><b>УНП:</b> {{$company->ynp}}</p>

<h4>Юридический и почтовый адрес:</h4>
<br>
<p><b>Юридический адрес:</b> {{$company->legal_address}}</p>
<p><b>Телевон:</b> {{$company->number_phone}}</p>
<p><b>Электронная почта:</b> {{$company->email}}</p>

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


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Company;
use App\Models\Basket;
use App\Models\Catalog;
use App\Models\CategoryCatalog;
use App\Models\Declaration;
use App\Models\Contact;
use App\Models\VisitLog;
use Session;



class ProfileController extends Controller
{
  public function authorization(Request $request){
    $categories = new CategoryCatalog();
    $usersQuery = User::query();
    // Session::flush();
    if(is_null(session('id_user'))){
      if($request->filled('sing_in')){
        return view('authorization', ['categories' => $categories->all(), 'sing_in' => $request->sing_in]);
      }
      return view('authorization', ['categories' => $categories->all()]);
    }
    else{
      $usersQuery->where('id', '=', session('id_user'));
      $user = $usersQuery->first();
      if(session('user_access_rights') == 'admin'){
        return view('admin_panel', ['categories' => $categories->all(), 'user' => $user]);
      }
      return view('cabinet', ['categories' => $categories->all(), 'user' => $user]);
    }
  }
  public function user_verification(Request $request){
    if(session('user_access_rights') == 'admin'){
      return view('admin_panel', ['categories' => $categories->all(), 'user' => $user]);
    }
    else{
      return view('cabinet', ['categories' => $categories->all(), 'user' => $user]);
    }
  }
  public function cabinet(Request $request, $user = null){
    $categories = new CategoryCatalog();
    $usersQuery = User::query();
    $sing_in = 'Неверные данные!!!';

    if ($request->filled('login') && $request->filled('password')){
        if(preg_match('/[0-9a-z]+@[a-z]/', $request->login)){
          $usersQuery->where('email', '=', $request->login)
                     ->where('password', '=', $request->password);
        }
        else{
          $usersQuery->where('login', '=', $request->login)
                     ->where('password', '=', $request->password);
        }
        $user = $usersQuery->first();
        if(!isset($user)){
          return redirect()->route('authorization', ['sing_in' => $sing_in]);
        }
        session(['id_user'  => $user->id, 'user_access_rights'  => $user->access_rights]);
        if($user->access_rights == 'admin'){

          return view('admin_panel', ['categories' => $categories->all(), 'user' => $user]);
        }
        return view('cabinet', ['categories' => $categories->all(), 'user' => $user]);
    }
    else{
      return redirect()->route('authorization', ['sing_in' => $sing_in]);
    }

  }

  public function registration_user(){
    $categories = new CategoryCatalog();
    return view('registration_user', ['categories' => $categories->all()]);
  }
  public function registration_company(){
    $categories = new CategoryCatalog();
    return view('registration_company', ['categories' => $categories->all()]);
  }
  public function registration(Request $request){
    // $categories = new CategoryCatalog();
    // dd($request);
    if(isset($request->registration_user)){
      $user = new User();
      $user->login = $request->input('login');
      $user->email = $request->input('email');
      $user->password = $request->input('password');
      $user->number_phone = $request->input('number_phone');
      $user->access_rights = 'user';
      $user->lastname = $request->input('lastname');
      $user->firstname = $request->input('firstname');
      $user->patronymic = $request->input('patronymic');

      $user->save();
      return redirect()->route('authorization');
    }
    if(isset($request->registration_company)){
      $company = new Company();
      $company->id_users = session('id_user');
      $company->title = $request->input('title');
      $company->abbreviated_name = $request->input('abbreviated_name');
      $company->iban = $request->input('iban');
      $company->bank_name = $request->input('bank_name');
      $company->address = $request->input('address');
      $company->bic = $request->input('bic');
      $company->ynp = $request->input('ynp');
      $company->legal_address = $request->input('legal_address');
      $company->number_phone = $request->input('number_phone');
      $company->email = $request->input('email');
      return redirect()->route('cabinet');
    }
    return redirect()->route('welcome');
    // return view('authorization', ['categories' => $categories->all(), 'user' => $user]);
  }

  public function admin_panel(Request $request){
    $basket = new Basket();
    $catalog = new Catalog();
    $declarations = new Declaration();
    $users = new User();
    $company = new Company();
    $contact = new Contact();
    $categories = new CategoryCatalog();
    $visit_log = new VisitLog();
    // dd($request);
    if(isset($request->registration_user)){
      $user = new User();
      $user->login = $request->input('login');
      $user->email = $request->input('email');
      $user->password = $request->input('password');
      $user->number_phone = $request->input('number_phone');
      $user->access_rights = 'user';
      $user->lastname = $request->input('lastname');
      $user->firstname = $request->input('firstname');
      $user->patronymic = $request->input('patronymic');

      $user->save();
      // return redirect()->route('admin_panel');
    }
    if(isset($request->registration_company)){
      $company = new Company();
      // $company->id_users = = session('id_user');
      $company->title = $request->input('title');
      $company->abbreviated_name = $request->input('abbreviated_name');
      $company->iban = $request->input('iban');
      $company->bank_name = $request->input('bank_name');
      $company->address = $request->input('address');
      $company->bic = $request->input('bic');
      $company->ynp = $request->input('ynp');
      $company->legal_address = $request->input('legal_address');
      $company->number_phone = $request->input('number_phone');
      $company->email = $request->input('email');
      // return redirect()->route('cabinet');
    }
    if(isset($request->add_catalog_item)){
      // $company = new Company();
      // // $company->id_users = $request->input('id_users');
      // $company->title = $request->input('title');
      // $company->abbreviated_name = $request->input('abbreviated_name');
      // $company->iban = $request->input('iban');
      // $company->bank_name = $request->input('bank_name');
      // $company->address = $request->input('address');
      // $company->bic = $request->input('bic');
      // $company->ynp = $request->input('ynp');
      // $company->legal_address = $request->input('legal_address');
      // $company->number_phone = $request->input('number_phone');
      // $company->email = $request->input('email');
      // return redirect()->route('cabinet');
    }
    return view('admin_panel', [
      'basket' => $basket->all(),
      'catalog' => $catalog->all(),
      'declarations' => $declarations->all(),
      'users' => $users->all(),
      'company' => $company->all(),
      'contact' => $contact->all(),
      'categories' => $categories->all(),
      'visit_log' => $visit_log->all()
    ]);
  }

}
