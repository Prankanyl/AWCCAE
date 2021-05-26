<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\CategoryCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function catalog(Request $request){
      // dd($request);
      $catalogsQuery = Catalog::query();
      $categories = new CategoryCatalog();
      if ($request->filled('sortby')){
          $catalogsQuery->where('category', '=', $request->sortby);
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
          // dd($request);
      }
      $catalogs = $catalogsQuery->paginate(12)->withPath("?" . $request->getQueryString());
      return view('catalog', ['catalogs' => $catalogs, 'categories' => $categories->all()]);
    }
}
