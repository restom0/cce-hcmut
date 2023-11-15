<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function get_tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tinnoibat = TinTuc::where('NoiBat', 1)->take(4)->get();
        $tinlienquan = TinTuc::where("idLoaiTin", $tintuc->idLoaiTin)->take(4)->get();
        return view("front.pages.tintuc", compact("tintuc", 'tinnoibat', 'tinlienquan'));
    }
    function get_dangnhap()
    {
        return view("front. pages. dangnhap");
    }
    function post_dangnhap(Request $req)
    {
        $validate = $req->validate([
            'email' => 'required',
            'password' => 'requiredImin:31max:32'
        ], [
            'email.required' => 'Ban chva nhap email',
            'password.required' => 'Ban chtia nhap Password', 'password.min' => 'Password khong dvqc nhO han 3 kjr ty', 'password.max' => 'Password khOng &rot lan han 32 kj, tu',
        ]);
        if (Auth::attempt(['email' => $validate['email'], 'password' => $validate['password']])) {
            return redirect('front/trangchu');
        } else {
            return back()->with("thongbao", "Dang nhap that bai");
        }
    }
    function get_dangxuat()
    {
        Auth::logout();
        return view('front.pages.trangchu');
    }
    function post_comment(Request $req, $id)
    {
        $val = $req->validate([
            'noidung' => 'required'
        ], [
            'noidung.required' => 'Ban chua nhap binh luan'
        ]);
        $tintuc = TinTuc::find($id);
        $comment = new Comment();
        $comment->idTinTuc = $id;
        $comment->idUser = Auth::user()->id;
        $comment->noidung = $req->noidung;
        $comment->save();
        return redirect()->route('tintuc', [$id, $tintuc->TieuDeKhongDau]);
    }
    function get_nguoidung()
    {
        $user = Auth::user();
        return view("front.pages.nguoidung", compact("user"));
    }
    function post_nguoidung(Request $req)
    {
        $val = $req->validate([
            'name' => 'required|min:3'
        ], [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng tối thiểu 3 ký tự'
        ]);
        $user = Auth::user();
        $user->name = $val["name"];
        if ($req->changepassword == "on") {
            $val = $req->validate([
                'password' => 'required|min:3|max:32', 'passwordAgain' => 'required|same:password'
            ], [
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải ít nhất 3 ký tự',
                'password.max' => 'Mật khảu tối đa 32 ký tự',
                'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same' => 'Mật khẩu không khớp'
            ]);
            $user->password = bcrypt($val["password"]);
        }
        $user->save();
        return back()->with("thongbao", "Bạn đã cập nhật thành công");
    }
    function get_dangky()
    {
        return view("front.pages.dangky");
    }
    function post_dangky(Request $req)
    {
        $validate = $req->validate(
            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'name.required' => 'Ban chua nhap tén ngudi ding',
                'name.min' => 'Tén nguoi ding phai cé it nhat 3 ky tu',
                'email.required' => 'Chua nhap email',
                'email.email' => 'Ban nhap chua dung dinh dang Email',
                'email.unique' => 'Email nay da co nguoi dang ky réi',
                'password.required' => 'Ban chua nhap mat khau',
                'password.min' => 'Mat khau phai it nhat 3 ky ty',
                'password.max' => 'Mat khau chi duge téi da 32 ky ty',
                'passwordAgain' => 'Ban chua nhaép lai mat khau',
                'passwordAgain.same' => 'Mat khau nhap lai khéng khép'
            ]
        );
        $user = new User;
        $user->name = $validate["name"];
        $user->email = $validate["email"];
        $user->password = berypt($validate['password']);
        $user->quyen = 0;
        $user->save();
        return redirect()->route("dangky")->with("thongbao", "chic ming ban da dang ky thanh céng");
    }
    function get_timkiem()
    {
        $tukhoa = $_GET["tukhoa"];
        $tintuc = TinTuc::where('TieuDe', 'like', "%$tukhoa%")
            ->orWhere("TomTat", "like", "%$tukhoa%")
            ->orWhere("NoiDung", "like", "%$tukhoa%")->paginate(5);
        return view("front.pages.timkiem", compact("tintuc", "tukhoa"));
    }
    function post_timkiem(Request $req)
    {
        $tukhoa = $req->tukhoa;
        $tintuc = TinTuc::where('TieuDe', 'like', "%$tukhoa%")
            ->orWhere("TomTat", "like", "%$tukhoa%")
            ->orWhere("NoiDung", "like", "%$tukhoa%")->take("30")->paginate(5);
        return view("front.pages.timkiem", compact("tintuc", "tukhoa"));
    }
}
