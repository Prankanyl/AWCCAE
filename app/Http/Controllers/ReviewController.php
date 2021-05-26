<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\CategoryCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ReviewController extends Controller
{
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

  public function contacts(Request $request){
    $categories = new CategoryCatalog();
    $reviewsQuery = Contact::query();
    $reviewsQuery->orderBy('id', 'desc');
    $reviews = $reviewsQuery->get();
    return view('contacts', ['categories' => $categories->all(), 'reviews' => $reviews]);
  }
}
