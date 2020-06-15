<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
        $lstProduct = DB::table('products as p')->leftjoin('categories as c', 'p.cat_id', '=', 'c.cat_id')->where('p.deleted_at', null)->orderBy('pr_quantity', 'desc')->paginate(10);
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
            $it->pr_price = $request->price;
            $it->pr_description = $request->description;
            $it->pr_quantity = $request->amount;
            $it->pr_title = $request->title;

            // $cover = $request->image;

            // $filename = str_replace(' ', '-', $cover);

            // $filename = uniqid() . '.' . $filename;

            // $path = $filename->store('images', $filename);

            // $url = Storage::disk('public')->put($path,  File::get($cover));
            // $it->pr_image = 'uploads/'.$path;

            $it->fill($request->all());
            $it->save();
            return response()->json(['status' => 1, 'message' => "Thêm sản phẩm mới thành công"]);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['status' => 0, 'message' => 'Có lỗi!']);
        }
    }
    public function saveedit(Request $request)
    {
        try {
            $pr = DB::table('products')->where('pr_id', $request->id)
                ->update([
                    'pr_name' => $request->name, 'pr_price' => $request->price,
                    'pr_description' => $request->description, 'pr_quantity' => $request->amount, 'pr_title' => $request->title, 'cat_id' => $request->category
                ]);
            return response()->json(['status' => 1, 'message' => "Sửa sản phẩm thành công"]);
        } catch (\Exception $e) {
            dd($e);
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
    public function edit(Request $request)
    {
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
    public function destroy(Request $request)
    {
        try {
            $pr = DB::table('products')->where('pr_id', $request->id)
                ->update(['deleted_at' => Carbon::now()]);

            return response()->json(['status' => 1, 'message' => "Xóa sản phẩm thành công"]);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['status' => 0, 'message' => 'Có lỗi!']);
        }
    }

    //Tìm kiếm thông tin sản phẩm
    public function search(Request $request)
    {
        $lstProduct = DB::table('products as p')->leftjoin('categories as c', 'p.cat_id', '=', 'c.cat_id')->where('p.deleted_at', null)
            ->when(request('name', null), function ($query, $name) {
                return $query->where('p.pr_name', 'like', '%' . implode('%', explode(' ', $name)) . '%');
            })
            ->when(request('fromDate', null), function ($query, $fromDate) {
                return $query->where('p.created_at', '>=', date('Y-d-m 0:0:0', strtotime($fromDate)));
            })
            ->when(request('toDate', null), function ($query, $toDate) {
                return $query->where('p.created_at', '<=', date('Y-d-m 23:59:59', strtotime($toDate)));
            })
            ->when(request('cateId', null), function ($query, $cateId) {
                return $query->where('p.cat_id', $cateId);
            })
            ->orderBy('p.pr_quantity', 'desc')->paginate(10);
        return view('layouts_back_end.product.tblProduct', compact('lstProduct'));
    }
}
