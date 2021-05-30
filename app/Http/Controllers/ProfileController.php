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



class ProfileController extends Controller
{
  public function authorization(Request $request){
    $categories = new CategoryCatalog();
    if($request->filled('sing_in')){
      return view('authorization', ['categories' => $categories->all(), 'sing_in' => $request->sing_in]);
    }
    return view('authorization', ['categories' => $categories->all()]);
  }

  public function cabinet(Request $request){
    $categories = new CategoryCatalog();
    $usersQuery = User::query();
    $sing_in = 'Неверные данные!!!';
    // dd($request);
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
        // dump($user);
        if($user->access_rights){
          dd($user);
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
      // $company->id_users = $request->input('id_users');
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
    $categories = new Basket();
    $categories = new Catalog();
    $categories = new Declaration();
    $categories = new User();
    $categories = new Company();
    $categories = new Contact();
    $categories = new CategoryCatalog();
    $categories = new CategoryCatalog();
    return view('cabinet', ['categories' => $categories->all(), 'user' => $user]);
  }

}
