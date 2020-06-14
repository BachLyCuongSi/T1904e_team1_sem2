<?php

namespace App\Http\Controllers;

use App\category;
use App\comment;
use App\product;
// use App\Category;
// use App\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Exception;

class FrontendController extends Controller
{
    public function welcome()
    {
        // // $com = new comment();
        // $lsComment = $com->commindex();
        $lsCategory = category::all();
        //$lsProduct = product::select('select * from products where pr_discount != 0 ORDER BY pr_id DESC LIMIT 8');
        $lsProduct = DB::table('products')->where('deleted_at', null)->where('discount', '!=', 0)->orderBy('pr_id', 'desc')->limit('8')->get();
        // $lsComment = comment::select('select * from comments inner join customers on comments.cus_id =customers.cus_id ORDER BY comm_id DESC limit 3');
        $lsComment = DB::table('comments')->join('customers', 'comments.cus_id', '=', 'customers.cus_id')->orderBy('comm_id', 'DESC')->limit('3')->get();

        return view('welcome')->with('lsCategory', $lsCategory)->with('lsProduct', $lsProduct)->with('lsComment', $lsComment);
    }

//  trang shop
    public function shop() {
        $lsProduct = Product::where('deleted_at', null)->paginate(4);
        $allProduct = Product::where('deleted_at', null)->paginate(8);
        $lstCategory =category::where('deleted_at',null)->get();

        // return view('shop')->with(['lsProduct'=>$lsProduct , 'allProduct'=>$allProduct , 'lstCategory'=>$lstCategory]);
        return view('shop',compact('lsProduct', 'allProduct', 'lstCategory'));
    }

    public function shopId($id){

        if ($id == 1 || $id == 2 || $id == 3 || $id == 4) {
            $lsProduct = Product::where('deleted_at', null)->where('cat_id','=', $id)->paginate(4);
            $lstCategory = category::where('deleted_at', null)->get();

            return view('shop', compact('lsProduct','lstCategory'));
        }else{
            $lsProduct = Product::where('deleted_at', null)->paginate(4);
            $lstCategory = category::where('deleted_at', null)->get();
            return view('shop', compact('lsProduct','lstCategory'));
         }

    }
//   ket thuc trang shop


    public function vegetables($pr_id = null)
    {
        $lsProduct = Product::where('cat_id', '1')->paginate(4);


        return view('vegetables')->with(['lsProduct' => $lsProduct]);
    }

    public function fruits($pr_id = null)
    {
        $lsProduct = Product::where('cat_id', '2')->paginate(4);


        return view('fruits')->with(['lsProduct' => $lsProduct]);
    }

    public function juice($pr_id = null)
    {
        $lsProduct = Product::where('cat_id', '3')->paginate(4);


        return view('vegetables')->with(['lsProduct' => $lsProduct]);
    }

    public function dried($pr_id = null)
    {
        $lsProduct = Product::where('cat_id', '4')->paginate(4);


        return view('dried')->with(['lsProduct' => $lsProduct]);
    }

    public function wishlist($id) {

        return view('wishlist');
    }


// chi tiet san pham
    public function single($id )
    {
    if($id!=0){
        $lsProduct = product::where('deleted_at', null)->where('pr_id', $id)->get();
        // $a =1;
        // // $lsProduct->cat_id;
        // $lspr = product::where('deleted_at', null)->where('cat_id',$a)->paginate(4);
    }else{
         $lsProduct = product::where('deleted_at', null)->find();

    }
    $lspr = product::where('deleted_at', null)->paginate(4);
        return view('product-single')->with(['lsProduct' => $lsProduct, 'lspr' => $lspr]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    //Manh load chi tiet san pham

    public function loadDeatilProduct(Request $request)
    {

        try {
        $data = product::where('pr_id', $request->id)->first();
        return response()->json(['status' => 1, 'data' => $data]);
        } catch (Exception $ex) {
        $ex->getMessage();
        return response()->json(['status' => 0, 'data' => null]);
        }
    }


    //Phan gio hang
    public function cate($id)
    {
        //lấy tất cả sản phẩm theo từng category
        $lsProduct = DB::table('products')->where('cat_id', '=', $id)->get();
        return view('wishlist', compact('lsProduct'));
    }


    //Phan gio hang

    public function cart()
    {
        return view('cart');
    }

    //   lỗi nè
    public function getAddCart($id)
    {
        $lsproduct = Product::find($id);
        Cart::add([
        'id' => $id, 'name' => $lsproduct->pr_name,
        'qty' => 1, 'price' => $lsproduct->pr_price,
        'options' => ['img' => $lsproduct->pr_image]
        ]);
        return back();
    }

    public function getDeleteCart($id)
    {
        dd($id);
        // Cart::remove();
        // return view('cart');
    }


    //Manh-> load product of a category

    public function loadProducOfCate(Request $request)
    {
        $lsProduct = product::where('deleted_at', null)->where('cat_id', $request->id)->paginate(4);

        return view('shop', compact('lsProduct'));
    }


}
