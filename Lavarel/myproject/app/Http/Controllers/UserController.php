<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function get_danhsach_usr()
    {
        $user = User::all();
        return view('admin.User.danhsach', compact('user'));
    }
    function get_suads_usr($id)
    {
        $user = User::find($id);
        return view('Admin.User.sua', compact('user'));
    }
    function post_suads_usr(Request $req)
    {
        $vali = $req->validate([
            'quyen' => 'required'
        ], [
            'quyen.required' => 'Bạn chưa chọn quyền cho user'
        ]);
        $user = User::find($req->id);
        $user->quyen = $vali['quyen'];
        $user->save();
        return redirect('admin/user/danhsach')->with('thongbao', 'Sửa quyền User Thành công');
    }
    function get_themds_usr()
    {
        return view('admin.User.them');
    }
    function post_themds_usr(Request $req)
    {
        $vali = $req->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password1' => 'required|min:6',
            'password2' => 'required|same:password1',
            'quyen' => 'required'
        ], [
            'username.required' => 'Vui lòng nhập tên User',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Chưa đúng định dạng email',
            'password1.required' => 'Chưa nhập Password',
            'password1.min' => 'Mật khẩu phải trên 6 ký tự',
            'password2.required' => 'Bạn chưa nhập lại password', 'password2.same' => 'Password chưa khớp nhau',
            'quyen.required' => 'Bạn chưa chọn quyền cho user mới'
        ]);
        $user = new User();
        $user->name = $vali['username'];
        $user->email = $vali['email'];
        $user->quyen = $vali['quyen'];
        $user->password = bcrypt($vali['password2']);
        $user->save();
        return redirect('admin/user/danhsach')->with('thongbao', 'Thêm User Thành công');
    }
    function xoa_usr($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao', 'Xóa User Thành công');
    }
}
