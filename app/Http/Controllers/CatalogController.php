<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Declaration;
use App\Models\Basket;
use App\Models\CategoryCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function catalog($category = null, Request $request){
      $categories = new CategoryCatalog();
      $catalogsQuery = Catalog::query();

      if (isset($category)){
          $catalogsQuery->where('category', '=', $category);
      }
      if ($request->filled('sortby')){
          $catalogsQuery->where('category', '=', $request->sortby);
          // dd($request);
      }
      if ($request->filled('costfrom')){
          $catalogsQuery->where('cost', '>=', $request->costfrom);
      }
      if ($request->filled('costto')){
          $catalogsQuery->where('cost', '<=', $request->costto);
      }
      if ($request->filled('orderbycategory') || $request->filled('orderby')){
          $catalogsQuery->orderBy($request->orderbycategory, $request->orderby);
      }
      if ($request->filled('title')){
          $catalogsQuery->orWhere('title', 'like', '%'.$request->title.'%');
          // dd($catalogsQuery);
      }
      $catalogs = $catalogsQuery->paginate(12)->withPath("?" . $request->getQueryString());
      return view('catalog', ['catalogs' => $catalogs, 'categories' => $categories->all()]);
    }

    public function buy(Request $request){
      $route_view = '';
      $product = new Basket();
      if(is_null(session('id_user'))){
        return redirect()->route('authorization');
      }

      if ($request->filled('item_id')){
        $product->id_catalogs = $request->item_id;
        $route_view = 'catalog';
      }
      if ($request->filled('declaration_item_id')){
        $product->id_declarations	 = $request->declaration_item_id;
        $route_view = 'declaration';
      }
      $product->id_users = session('id_user');
      $product->count = $request->count;
      $product->status = 0;

      $product->save();

      return redirect()->route($route_view);
    }
}
