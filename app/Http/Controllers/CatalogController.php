<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog(){
      $catalogs = new Catalog();
      return view('catalog', ['declarations' => $catalogs->all()]);
    }
}
