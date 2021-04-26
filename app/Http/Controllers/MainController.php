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

  public function contacts(){
    $categories = new CategoryCatalog();
    $reviews = new Contact();
    // orderBy('id', 'desc')
    $reviews = $reviews->all();
    return view('contacts', ['categories' => $categories->all(), 'reviews' => $reviews]);
  }

  public function authorization(){
    return view('authorization');
  }

  public function cabinet(){
    return view('cabinet');
  }
}
