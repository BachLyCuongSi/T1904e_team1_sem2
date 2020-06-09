<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function welcome() {
    return view('welcome');
  }

  public function shop($id=null) {
    return view('shop');
  }

  public function wishlist() {
    return view('wishlist');
  }

  public function cart() {
    return view('cart');
  }

  public function single() {
    return view('product-single');
    }

    public function about() {
      return view('about');
    }

    public function contact() {
      return view('contact');
    }
}
