<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\customer;
use App\category;
use validate;
use Hash;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {


        $arr = $request->all();
        $mail = $arr['email'];
        $password = $arr['password'];
        // $remember = $request->remember;
        // $data = DB::table('customers')->where('deleted_at', null)->get();
        $data = customer::where('deleted_at', null)->get();
        // dd($mail);

        foreach ($data as $data) {
            if (($data['deleted_at']) == null && ($data['cus_email']) == $mail && ($data['password']) == $password) {

                $name = $data['cus_name'];
                view::share('name', $name);

                // return  with('layouts.frontend' , compact('name')) ;
                return redirect()->route('home');
            } else {

                return view('register');
            }
        }
    }
    public function logout()
    {
        return redirect()->action('FrontendController@welcome');
    }
    // tao tai khoản
    public function register()
    {
        return view('register');
    }

    public function postRegister(request $request)
    {
        //  valid hay validate hổng biết sai ntn

        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:customer,cus_email',
                'password' => 'required|min:6|max:20',
                'name' => 'required',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập mail',
                'email.email' => 'Nhập đúng định dạng mail',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'Mật khẩu không giống nhau',
            ]
        );
        $cus = new customer();
        $cus->cus_email = $request->email;
        $cus->password = Hash::make($request->password);
        $cus->cus_name = $request->name;
        $cus->cus_addres = $request->addres;
        $cus->cus_phone = $request->phone;
        $cus->save();
        return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công');
    }
}
