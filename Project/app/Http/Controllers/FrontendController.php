<?php

namespace App\Http\Controllers;
use App\category;
use App\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
  public function welcome() {
    return view('welcome');
  }

  public function shop($pr_id=null) {
    
      $lsProduct= Product::where('deleted_at', null)->paginate(4);
      $allProduct=Product::where('deleted_at',null)->get();
      $lstCategory=category::where('deleted_at',null)->get();
    
    return view('shop')->with(['lsProduct'=>$lsProduct , 'allProduct'=>$allProduct,'lstCategory'=>$lstCategory]);
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

  public function single($pr_id=null) {
    $SProduct =Product::where('pr_id',$pr_id)->find($pr_id);
    
    $lsProduct= Product::paginate(4);
    $allProduct=Product::all();
    return view('product-single')->with(['SProduct'=>$SProduct,'lsProduct'=>$lsProduct , 'allProduct'=>$allProduct]);
    }

    public function about() {
      return view('about');
    }

    public function contact() {
      return view('contact');
    }

    //Manh load chi tiet san pham

    public function loadDeatilProduct(Request $request){

      try{
        $data = product::where('pr_id',$request->id)->first();
        return response()->json(['status'=>1,'data'=>$data]);
      }catch(Exception $ex){
        $ex->getMessage();
        return response()->json(['status'=>0,'data'=>null]);
      }
    }
}
