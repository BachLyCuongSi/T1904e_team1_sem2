<?php

namespace App\Http\Controllers;

use App\category;
use App\comment;
use App\product;
// use App\Category;
// use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
  public function welcome() {
        // // $com = new comment();
        // $lsComment = $com->commindex();
    $lsCategory = category::all();
        //$lsProduct = product::select('select * from products where pr_discount != 0 ORDER BY pr_id DESC LIMIT 8');
    $lsProduct= DB::table('products')->where('discount','!=',0)->orderBy('pr_id','desc')->limit('8')->get();
        // $lsComment = comment::select('select * from comments inner join customers on comments.cus_id =customers.cus_id ORDER BY comm_id DESC limit 3');
     $lsComment=DB::table('comments')->join('customers','comments.cus_id','=','customers.cus_id')->orderBy('comm_id','DESC')->limit('3')->get();

    return view('welcome')->with('lsCategory',$lsCategory)->with('lsProduct',$lsProduct)->with('lsComment',$lsComment);
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

  public function wishlist($id) {

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
        //lấy tất cả sản phẩm theo từng category
        $lsProduct = DB::table('products')->where('cat_id','=',$id)->get();
        return view('wishlist',compact('lsProduct'));
    }

//     public function loadWishlist(Request $request){
//         $dataCat = DB::table('products')->where('cat_id',) ->join('categories', 'products.cat_id', '=', 'categories.cat_id')->paginate(4);
// //     // return view('shop',compact('dataCat'));
//     }
}
