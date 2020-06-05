<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lsCategory = Category::paginate(3);
        return view('layouts_back_end.category.list')->with(['lsCategory'=>$lsCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->cate_name);
        $ca = new Category();
        $ca->cat_name = $request->name;
        $ca->created_at = Carbon::now();
        $ca->save();
        return response()->json(['status' => 1, 'message' => 'Thêm thành công']);
        
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
    public function destroy($cat_id, Request $request)
    {
        try {
            $category = Category::find($request->id);
            if ($category != null) {
                $category->delete();
            return response()->json(['status' => 1, 'message' => 'Xóa thành công']);
        }
           else{
            return response()->json(['status' => 0, 'message' => 'Không tồn tại.']);
        }
    
          } catch (\Exception $e) {
            $e ->getMessage();
              return response()->json(['status' => 0, 'message' => 'Có lỗi']);
          }
    }
}
