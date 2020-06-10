<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function welcome() {
    return view('welcome');
  }

  public function shop($pr_id=null) {
    
      $lsProduct= Product::paginate(4);
      $allProduct=Product::all();
    
    return view('shop')->with(['lsProduct'=>$lsProduct , 'allProduct'=>$allProduct]);
  }

  public function vegetables($pr_id=null){
    $lsProduct=Product::where('cat_id','1')->paginate(4);
    
    
    return view('vegetables')->with(['lsProduct'=>$lsProduct]);
  }

  public function fruits($pr_id=null){
    $lsProduct=Product::where('cat_id','2')->paginate(4);
    
    
    return view('fruits')->with(['lsProduct'=>$lsProduct]);
  }

  public function juice($pr_id=null){
    $lsProduct=Product::where('cat_id','3')->paginate(4);
    
    
    return view('vegetables')->with(['lsProduct'=>$lsProduct]);
  }

  public function dried($pr_id=null){
    $lsProduct=Product::where('cat_id','4')->paginate(4);
    
    
    return view('dried')->with(['lsProduct'=>$lsProduct]);
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
