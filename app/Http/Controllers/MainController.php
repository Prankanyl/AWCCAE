<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\CategoryCatalog;
use App\Models\Contact;
use App\Models\Declaration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Session;

class MainController extends Controller
{
  public function welcome(Request $request){
    if(isset($request->exit)){
      Session::flush();
    }
    $catalogs = new Catalog();
    $categories = new CategoryCatalog();
    return view('welcome', ['catalogs' => $catalogs->paginate(6), 'categories' => $categories->all()]);
  }

  public function pagination(){
    return view('');
  }

  public function item($id , Request $request){
    $categories = new CategoryCatalog();
    $catalogsQuery = Catalog::query();
    $declarationQuery = Declaration::query();
    $userQuery = User::query();

    if ($request->filled('item_id')){
        $catalogsQuery->where('id', '=', intval($id));
        $item = $catalogsQuery->first();
        $item_id = true;
        $user = null;
    }
    if ($request->filled('declaration_item_id')){
        $declarationQuery->where('id', '=', intval($id));
        $item = $declarationQuery->first();

        $userQuery->where('id', '=', $item->id_users);
        $user = $userQuery->first();
        $item_id = false;
    }
    // dump()
    return view('item', ['categories' => $categories->all(), 'product' => $item, 'item_id' => $item_id, 'user' => $user]);

  }
}
