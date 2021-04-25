<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
  public function welcome(){
    return view('welcome');
  }

  public function catalog(){
    return view('catalog');
  }

  public function declaration(){
    return view('declaration');
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

  public function review(){
    return view('review');
  }
}
