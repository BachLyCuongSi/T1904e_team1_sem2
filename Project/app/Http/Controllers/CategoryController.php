<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Barryvdh\Debugbar\Facade;
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
        $lsCategory = Category::where('deleted_at', null)->paginate(10);
        return view('layouts_back_end.category.list')->with(['lsCategory' => $lsCategory]);
    }
    //Tìm kiếm thông tin danh Mục

    public function search(Request $request)
    {
        try {
            $lsCategory = DB::table('categories')->where('deleted_at', null)
                ->when(request('cat_name', null), function ($query, $name) {
                    return $query->where('name', 'like', '%' . implode('%', explode(' ', $name)) . '%');
                })
                ->when(request('fromDate', null), function ($query, $fromDate) {
                    return $query->where('created_at', '>=', date('Y-d-m 0:0:0', strtotime($fromDate)));
                })
                ->when(request('toDate', null), function ($query, $toDate) {
                    return $query->where('created_at', '<=', date('Y-d-m 23:59:59', strtotime($toDate)));
                })
                ->orderBy('created_at', 'desc')
                ->paginate(20);
            Facade::warning($lsCategory);
            return view('layouts_back_end.category.tableCate', compact('lsCategory'));
        } catch (\Exception $e) {
            $e->getmessage();

            return $lsCategory = null;
        }
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
            } else {
                return response()->json(['status' => 0, 'message' => 'Không tồn tại.']);
            }
        } catch (\Exception $e) {
            $e->getMessage();
            return response()->json(['status' => 0, 'message' => 'Có lỗi']);
        }
    }
}
