<?php

namespace App\Http\Controllers;

use App\Models\CategoryCatalog;
use App\Models\Declaration;
use Illuminate\Http\Request;

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
    $declarations = $declarationsQuery->paginate(12)->withPath("?" . $request->getQueryString());
    return view('declaration', ['declarations' => $declarations, 'categories' => $categories->all()]);
  }

  public function added_declaration(Request $request){
    // dd($request);
    // $valid = $request->validate([
    //   'email' => 'required|min:4|max:100',
    //   'subject' => 'required|min:4|max:100',
    //   'message' => 'required|min:4|max:500'
    // ]);

    $declaration = new Declaration();
    $declaration->category = $request->input('category');
    $declaration->title = $request->input('title');
    $declaration->description = $request->input('description');
    // $declaration->img = $request->input('img');
    $declaration->cost = $request->input('cost');
    // $declaration->id_users = $request->input('message');

    $declaration->save();

    return redirect()->route('declaration');
  }
}
