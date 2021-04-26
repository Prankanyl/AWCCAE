<?php

namespace App\Http\Controllers;

use App\Models\CategoryCatalog;
use App\Models\Declaration;
use Illuminate\Http\Request;

class DeclarationController extends Controller
{
  public function declaration(){
    $categories = new CategoryCatalog();
    $declarations = new Declaration();
    return view('declaration', ['declarations' => $declarations->all(), 'categories' => $categories->all()]);
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
