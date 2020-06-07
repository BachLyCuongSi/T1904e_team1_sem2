<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstCategory = DB::table('categories')->where('deleted_at', null)->get();
        $lstProduct = DB::table('products')->where('deleted_at', null)->paginate(10);

        return view('layouts_back_end.product.list', compact('lstCategory', 'lstProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $it = new product();
            $it->cat_id = $request->category;
            $it->pr_name = $request->name;
            $it->pr_image = $request->imgUrl;
            $it->pr_price = $request->price;
            $it->pr_description = $request->description;
            $it->pr_quantity = $request->amount;
            $it->pr_title = $request->title;
            $it->created_at = Carbon::now();
            $it->save();
            return response()->json(['status' => 1, 'message' => "Thêm sản phẩm mới thành công"]);
        } catch (\Exception $e) {
            $e->getMessage();
            return response()->json(['status' => 0, 'message' => 'Có lỗi!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
