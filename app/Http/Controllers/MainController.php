<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\CategoryCatalog;
use App\Models\Contact;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function welcome(){
    $catalogs = new Catalog();
    $categories = new CategoryCatalog();
    return view('welcome', ['catalogs' => $catalogs->paginate(6), 'categories' => $categories->all()]);
  }

  public function pagination(){
    return view('');
  }

  public function authorization(){
    $categories = new CategoryCatalog();
    return view('authorization', ['categories' => $categories->all()]);
  }

  public function cabinet(){
    $categories = new CategoryCatalog();
    return view('cabinet', ['categories' => $categories->all()]);
  }
}
