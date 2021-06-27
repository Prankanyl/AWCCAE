<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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
        return redirect()->route('admin_panel');
      }
      return redirect()->route('cabinet');
    }
  }

  public function user_verification(Request $request){
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

        $visit_log = new VisitLog();
        $visit_log->time = date("Y-m-d H:i:s");
        $visit_log->id_users = session('id_user');
        $visit_log->save();

        if($user->access_rights == 'admin'){
          return redirect()->route('admin_panel');
        }
        return redirect()->route('cabinet');
    }
    else{
      return redirect()->route('authorization', ['sing_in' => $sing_in]);
    }
  }

  // public function exit(Request $request){
  //   if(isset($request->exit)){
  //     Session::flush();
  //   }
  //   return redirect()->route('welcome');
  // }

  public function cabinet(Request $request){

    $categories = new CategoryCatalog();
    $usersQuery = User::query();
    $usersQuery->where('id', '=', session('id_user'));
    $user = $usersQuery->first();

    $companyQuery = Company::query();
    $companyQuery->where('id_users', '=', session('id_user'));
    $company = $companyQuery->first();

    // $catalogsQuery = Catalog::query();
    // $catalogsQuery->join('baskets', 'baskets.id_catalog', '=', 'catalogs.id')->where('baskets.id_users', '=', session('id_user'));
    // $catalogs = $catalogsQuery;
    $catalogs = DB::table('catalogs')
        ->selectRaw('catalogs.* , baskets.count as count')
        ->join('baskets', 'baskets.id_catalogs', '=', 'catalogs.id')
        ->where('baskets.id_users', '=', session('id_user'))
        ->where('baskets.status', '=', 0)
        ->get();

    $declarations = DB::table('declarations')
        ->selectRaw('declarations.* , baskets.count as count')
        ->join('baskets', 'baskets.id_declarations', '=', 'declarations.id')
        ->where('baskets.id_users', '=', session('id_user'))
        ->where('baskets.status', '=', 0)
        ->get();
    $my_declarations = DB::table('declarations')
        ->selectRaw('declarations.* ')
        ->where('declarations.id_users', '=', session('id_user'))
        ->get();
    // dd($request);
    if(isset($request->update_company)){
      DB::update("update companies set
      id_users = ?,
      title = ?,
      abbreviated_name = ?,
      iban = ?,
      bank_name = ?,
      address = ?,
      bic = ?,
      ynp = ?,
      legal_address = ?,
      number_phone = ?,
      email = ?
      where id = ? and id_users = ?",
      [ session('id_user'),
      $request->title,
      $request->abbreviated_name,
      $request->iban,
      $request->bank_name,
      $request->address,
      $request->bic,
      $request->ynp,
      $request->legal_address,
      $request->number_phone,
      $request->email,
      $request->update_company,
      session('id_user')]);
      return redirect()->route('cabinet');
    }

    if(isset($request->delete_company)){
      DB::delete('delete from companies where id = ? and id_users = ?',[$request->delete_company, session('id_user')]);
      DB::update("update users set access_rights = ? where id = ?", [ 'user', session('id_user')]);
      session(['user_access_rights'  => "user"]);
      return redirect()->route('cabinet');
    }
    if(isset($request->pay)){
      // dd($request);
      DB::update("update baskets set status = ? where id_catalogs = ? and id_users = ?", [ 1, $request->pay, session('id_user')]);
      return redirect()->route('cabinet');
    }

    if(isset($request->delete)){
      DB::delete('delete from baskets where id_catalogs = ? and id_users = ?',[$request->delete, session('id_user')]);
      return redirect()->route('cabinet');
    }
    if(isset($request->delete_declaration)){
      DB::delete('delete from baskets where id_declarations = ? and id_users = ?',[$request->delete_declaration, session('id_user')]);
      return redirect()->route('cabinet');
    }
    if(isset($request->add_declaration_item)){
      $declaration = new Declaration();

      $declaration->category = $request->category;
      $declaration->title = $request->input('title');
      $declaration->description = $request->description;
      $declaration->id_users = session('id_user');
      if(session('user_access_rights') == 'user' && $request->view == 'Продажа'){
        return redirect()->route('cabinet');
      }
      $declaration->view = $request->view;
      if(is_null($request->img)){
        $declaration->img = "/images/item.png";
      }
      else{
        $path = $request->file('img')->store('images', 'public');
        $declaration->img = "/storage/".$path;
      }
      $declaration->cost = (int)$request->input('cost');

      $declaration->save();
      return redirect()->route('cabinet');
    }

    return view('cabinet', [
      'categories' => $categories->all(),
      'user' => $user,
      'company' => $company,
      'declarations' => $declarations,
      'my_declarations' => $my_declarations,
      'catalogs' => $catalogs
    ]);
  }

  public function registration_user(Request $request){
    $categories = new CategoryCatalog();
    $user = null;
    if(isset($request->update_user)){
      $usersQuery = User::query();
      $usersQuery->where('id', '=', session('id_user'));
      $user = $usersQuery->first();
      // dump($request);
    }
    return view('registration_user', ['categories' => $categories->all(), 'user' => $user]);
  }
  public function registration_company(){
    $categories = new CategoryCatalog();
    return view('registration_company', ['categories' => $categories->all()]);
  }
  public function registration(Request $request){
    // $categories = new CategoryCatalog();
    // dd($request);
    if(isset($request->update_user)){
      DB::update("update users set
      	login = ?,
      email = ?,
      password = ?,
      number_phone = ?,
      lastname = ?,
      firstname = ?,
      patronymic = ?
      where id = ?",
      [
      $request->login,
      $request->email,
      $request->password,
      $request->number_phone,
      $request->lastname,
      $request->firstname,
      $request->patronymic,
      session('id_user')]);

      return redirect()->route('cabinet');
    }
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
      $company->save();

      DB::update(
        'update users set access_rights = "super_user" where id = ?',
        [session('id_user')]
      );
      session(['user_access_rights'  => "super_user"]);
      $usersQuery = User::query();
      $usersQuery->where('id', '=', session('id_user'));
      $user = $usersQuery->first();

      return redirect()->route('cabinet');
    }
    return redirect()->route('authorization');
  }
  public function pay(Request $request){

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

    $usersQuery = User::query();
    $usersQuery->where('id', '=', session('id_user'));
    $admin = $usersQuery->first();
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
      return redirect()->route('admin_panel');
    }
    if(isset($request->registration_company)){
      $company = new Company();
      $company->id_users = $request->input('id_users');
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

      $company->save();
      return redirect()->route('admin_panel');
    }
    if(isset($request->add_catalog_item)){
      $catalogs = new Catalog();

      $catalogs->category = $request->category;
      $catalogs->title = $request->input('title');
      $catalogs->description = $request->description;
      if(is_null($request->img)){
        $catalogs->img = "/images/item.png";
      }
      else{
        $path = $request->file('img')->store('images', 'public');
        $catalogs->img = "/storage/".$path;
      }


      $catalogs->cost = (int)$request->input('cost');

      $catalogs->save();
      return redirect()->route('admin_panel');
    }
    return view('admin_panel', [
      'basket' => $basket->all(),
      'catalog' => $catalog->all(),
      'declarations' => $declarations->all(),
      'users' => $users->all(),
      'company' => $company->all(),
      'contact' => $contact->all(),
      'categories' => $categories->all(),
      'visit_log' => $visit_log->all(),
      'admin' => $admin
    ]);
  }

}
