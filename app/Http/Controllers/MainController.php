<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\CategoryCatalog;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

  public function item($id ,Request $request){
    $categories = new CategoryCatalog();
    $catalogsQuery = Catalog::query();

    if ($request->filled('item_id')){
        $catalogsQuery->where('id', '=', intval($id));

    }
    $item = $catalogsQuery->first();
    return view('item', ['categories' => $categories->all(), 'product' => $item]);
  }
}
