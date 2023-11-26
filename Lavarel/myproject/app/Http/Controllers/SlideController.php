<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;

class SildeController extends Controller
{
    function get_danhsach_sl()
    {
        $slide = Slide::all();
        return view('Admin.Slide.danhsach', compact('slide'));
    }
    function get_themds_sl()
    {
        return view('Admin.Slide.them');
    }
    function post_themds_sl(Request $req)
    {
        $validate = $req->validate([
            'noidungslide' => 'required'
        ], [
            'noidungslide.required' => 'Nhập nội dung của silde'
        ]);
        $slide = new Slide();
        $slide->Ten = $req->tenslide ? $req->tenslide : 'banner';
        $slide->NoiDung = $validate['noidungslide'];
        $slide->link = $req->linkslide ? $req->linkslide : 'link';
        if ($req->hasFile('uploadfile')) {
            $file = $req->file('uploadfile');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/slide/them')->with('loi', 'Bạn chỉ được thêm file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = "sildemoi" . random_int(0, 9) . "_" . $name;
            while (file_exists('../resources/image/slide/' . $hinh)) {
                $hinh = "hinhmoi" . random_int(0, 9) . "_" . $name;
            };
            $file->move('../resources/image/slide/', $hinh);
            // unlink("resources/image/tintuc/".$tintuc->Hinh);$slide->Hinh=$hinh;
        } else {
            $slide->Hinh = "";
        }
        $slide->save();
        return redirect('admin/slide/danhsach')->with('thongbao', 'Thêm Thành công');
    }
    //Sửa
    function get_suads_sl($id)
    {
        $slide = Slide::find($id);
        return view('Admin.Slide.sua', compact('slide'));
    }
    function post_suads_sl(Request $req, $id)
    {
        $validate = $req->validate([
            'noidungslide' => 'required'
        ], [
            'noidungslide.required' => 'Nhập nội dung của silde'
        ]);
        $slide = Slide::find($id);
        $slide->Ten = $req->tenslide ? $req->tenslide : 'banner_' . $id;
        $slide->NoiDung = $validate['noidungslide'];
        $slide->link = $req->linkslide ? $req->linkslide : 'link' . $id;
        if ($req->hasFile('uploadfile')) {
            $file = $req->file('uploadfile');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/slide/sua')->with('loi', 'Bạn chỉ được thêm file có đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = "sildemoi" . random_int(0, 9) . "_" . $name;
            while (file_exists('../resources/image/slide/' . $hinh)) {
                $hinh = "slidemoi" . random_int(0, 9) . "_" . $name;
            };
            $file->move('../resources/image/slide/', $hinh);
            // unlink("resources/image/tintuc/".$tintuc->Hinh);
            $slide->Hinh = $hinh;
        }
        $slide->save();
        return redirect('admin/slide/danhsach')->with('thongbao', 'Sửa Thành công');
    }
    //Xóa
    function xoa_sl($id)
    {
        $tl = Slide::find($id);
        $tl->delete();
        return redirect('admin/slide/danhsach')->with('thongbao', 'Xóa slide thành công');
    }
}
