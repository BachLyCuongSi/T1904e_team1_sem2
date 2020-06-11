<?php

namespace App\Http\Controllers;

use App\category;
use App\comment;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
  public function welcome() {
        // // $com = new comment();
        // $lsComment = $com->commindex();
    $lsCategory = category::all();
        //$lsProduct = product::select('select * from products where pr_discount != 0 ORDER BY pr_id DESC LIMIT 8');
    $lsProduct= DB::table('products')->where('pr_discount','!=',0)->orderBy('pr_id','desc')->limit('8')->get();
        // $lsComment = comment::select('select * from comments inner join customers on comments.cus_id =customers.cus_id ORDER BY comm_id DESC limit 3');
     $lsComment=DB::table('comments')->join('customers','comments.cus_id','=','customers.cus_id')->orderBy('comm_id','DESC')->limit('3')->get();

    return view('welcome')->with('lsCategory',$lsCategory)->with('lsProduct',$lsProduct)->with('lsComment',$lsComment);
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

    public function cate($id){
        $lsProduct = DB::table('products')->where('cat_id','=',$id)->get();
        return view('categories',compact('lsProduct'));
    }
}
