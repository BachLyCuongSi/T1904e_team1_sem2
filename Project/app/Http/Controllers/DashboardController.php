<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\View\View;

use App\comment;
use App\customer;
use App\order;
use App\product;
use Illuminate\Http\Request;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('layouts_back_end.dashboard');

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
        //
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

    public function countComm(){
        $count_comm = DB::table('comment')->count();
        return $count_comm;
    }

    public function countCat()
    {
        $count_cat = DB::table('category')->count();
        return $count_cat;
    }

    public function countPrd()
    {
        $count_prd = DB::table('product')->count();
        return $count_prd;
    }

    public function countOrd()
    {
        $count_ord = DB::table('order')->count();
        return $count_ord;
    }

    public function countCus()
    {
        $count_cus = DB::table('customer')->count();
        return $count_cus;
    }

    // list don hang trong ngay
    public function orderDay(){
        $lsOrder = DB::select('select * from order order by od_id DESC Limit 5');
        return $lsOrder;
    }

}
