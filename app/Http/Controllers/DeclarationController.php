<?php

namespace App\Http\Controllers;

use App\Models\CategoryCatalog;
use App\Models\Declaration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeclarationController extends Controller
{
  public function declaration(Request $request){
    $categories = new CategoryCatalog();
    $declarationsQuery = Declaration::query();

    if ($request->filled('sortby')){
        $declarationsQuery->where('category', '=', $request->sortby);
    }
    if ($request->filled('costfrom')){
        $declarationsQuery->where('cost', '>=', $request->costfrom);
    }
    if ($request->filled('costto')){
        $declarationsQuery->where('cost', '<=', $request->costto);
    }
    if ($request->filled('orderbycategory') || $request->filled('orderby')){
        $declarationsQuery->orderBy($request->orderbycategory, $request->orderby);
    }
    if ($request->filled('view')){
        $declarationsQuery->where('view', '=', $request->view);
    }
    $declarations = $declarationsQuery->paginate(12)->withPath("?" . $request->getQueryString());
    return view('declaration', ['declarations' => $declarations, 'categories' => $categories->all()]);
  }

  public function declaration_update(Request $request){
    if(isset($request->update_declaration_item)){
      if(is_null($request->file('img'))){
        $img = $request->image;
      }
      else{
        $path = $request->file('img')->store('images', 'public');
        $img = "/storage/".$path;
      }

      $update = DB::update("
      update declarations set
      category = ? ,
      title = ? ,
      description = ? ,
      img = ? ,
      cost = ? ,
      view = ?
      where id = ?",
      [$request->category,
      $request->title,
      $request->description,
      $img,
      $request->cost,
      $request->view,
      $request->update_declaration_item]
    );
    // dd($request);
    }
    if(isset($request->delete_declaration_item)){
      $delete = DB::delete('delete from declarations where id = ?',[$request->delete_declaration_item]);
    }

    return redirect()->route('cabinet');
  }
  public function update(Request $request){
    $categories = new CategoryCatalog();
    $declarationQuery = Declaration::query();
    $declarationQuery->where('id', '=', $request->declaration_item_id);
    $declaration = $declarationQuery->first();
    // dd($declaration);
    return view('update', ['categories' => $categories->all(), 'declaration' => $declaration]);
  }
}
