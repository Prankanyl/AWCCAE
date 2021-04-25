<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function welcome(){
    return view('welcome');
  }

  public function contacts(){
    return view('contacts');
  }

  public function authorization(){
    return view('authorization');
  }

  public function cabinet(){
    return view('cabinet');
  }

  public function review(Request $request){
    // dd($request);
    $valid = $request->validate([
      'email' => 'required|min:4|max:100',
      'subject' => 'required|min:4|max:100',
      'message' => 'required|min:4|max:500'
    ]);

    $review = new Contact();
    $review->email = $request->input('email');
    $review->subject = $request->input('subject');
    $review->message = $request->input('message');

    $review->save();

    return redirect()->route('contacts');
  }
}
