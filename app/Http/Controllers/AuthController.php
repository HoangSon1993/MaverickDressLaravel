<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public  function showFormRegister(){
        return view('auth.register');
    }
    public  function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user -> save();

        return redirect()->route('show-form-register')->with('success','Dang ky thanh cong');
    }
    public function showFormLogin(){
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Kiểm tra xem thông tin đăng nhập (email và mật khẩu) hợp lệ hay không
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Đăng nhập thành công, chuyển hướng người dùng đến trang khác
            return redirect()->route('web.home.home');
        }

        // Đăng nhập thất bại, chuyển hướng người dùng đến trang đăng nhập lại với thông báo lỗi
        return redirect()->route('show-form-login')->with('error', 'Email hoặc mật khẩu không chính xác');
    }

    public function showProfile(){
//        //Nguoi dung da dang nhap cho ho truy cap trang profile
//        if(Auth::check()){
//            return view('auth.profile');
//        }
//        //Nguoi dung chua dang nhap, chuyen ho den trang login
//        return redirect()->route('show-form-login');

        return view('auth.profile');
    }
    public function  profile(Request $request){
        $user = User::find(\auth()->id());
        $user->name = $request->name;
        if($request->chang_password == 'on'){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('web.home.home')->with('success','Cap nhat thanh cong');
    }
    public function logout (){
        Auth::logout();
        return redirect()->route('web.home.home');
    }
}
