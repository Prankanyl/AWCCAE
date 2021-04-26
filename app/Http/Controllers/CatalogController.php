<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\CategoryCatalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog(){
      // $catalogs = Catalog::
      $catalogs = new Catalog();
      // $catalogs = $catalogs->paginate(3);
      $categories = new CategoryCatalog();
      return view('catalog', ['catalogs' => $catalogs->paginate(6), 'categories' => $categories->all()]);
    }
}
