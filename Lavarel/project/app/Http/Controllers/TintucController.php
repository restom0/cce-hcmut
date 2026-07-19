<?php

namespace App\Http\Controllers;

use App\Models\Loaitin;
use App\Models\Theloai;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class TintucController extends Controller
{
    public function danhsach()
    {
        $tintuc = TinTuc::orderBy("id", "DESC")->get();

        return view("admin/tintuc/danhsach", compact("tintuc"));
    }
    function them()
    {
        $theloai = Theloai::all();
        $loaitin = Loaitin::all();
        return view('Admin.TinTuc.them', ['theloai' => $theloai, 'loaitin' => $loaitin]);
    }
    function xulythem(Request $req)
    {
        $validate = $req->validate([
            'loaitin' => 'required',
            'tieude' => 'required|min:3|unique:tintuc,TieuDe',
            'tomtat' => 'required',
            'noidung' => 'required'
        ], [
            'loaitin.required' => 'Bạn chưa chọn loại tin',
            'tieude.required' => 'Bạn chưa nhập tiêu đề',
            'tieude.min' => 'Tên tiêu đề có ít nhất 3 ký tự',
            'tieude.unique' => 'Tiêu đề đã tồn tại',
            'tomtat.required' => 'Cần có tóm tắt',
            'noidung.required' => 'Bạn chưa nhập nội dung'
        ]);
        $tintuc = new TinTuc();
        $tintuc->TieuDe = $validate['tieude'];
        $tintuc->TomTat = $validate['tomtat'];
        $tintuc->idLoaiTin = $validate['loaitin'];
        $tintuc->NoiDung = $validate['noidung'];
        $tintuc->SoLuotXem = 0;
        $tintuc->TieuDeKhongDau = changeTitle($validate['tieude']);
        if ($req->hasFile('filehinh')) {
            $file = $req->file('filehinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/them')->with('loi', 'Bạn chỉ được thêm file có
        đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = "hinhmoi" . random_int(0, 9) . "_" . $name;
            while (file_exists('../resources/image/tintuc/' . $hinh)) {
                $hinh = "hinhmoi" . random_int(0, 9) . "_" . $name;
            };
            $file->move('../resources/image/tintuc/', $hinh);
            // unlink("resources/image/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $hinh;
        } else {
            $tintuc->Hinh = "";
        }
        $tintuc->save();
        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Thêm Thành công');
    }
    function getLoaitin($idtl)
    {
        $loaitin = Loaitin::where('idTheLoai', $idtl)->get();
        foreach ($loaitin as $lt) {
            echo "<option value='>" . $lt->id . "'>" . $lt->Ten . "</option>";
        }
    }
    function sua($id)
    {
        $tintuc = Tintuc::find($id);
        $loaitin = LoaiTin::all();
        $theloai = Theloai::all();
        return view('Admin.TinTuc.sua', compact('tintuc', 'loaitin', 'theloai'));
    }
    function xulysua(Request $req, $id)
    {
        $validate = $req->validate([
            'loaitin' => 'required',
            'tieude' => 'required|min:3',
            'tomtat' => 'required',
            'noidung' => 'required'
        ], [
            'loaitin.required' => 'Bạn chưa chọn loại tin',
            'tieude.required' => 'Bạn chưa nhập tiêu đề',
            'tieude.min' => 'Tên tiêu đề có ít nhất 3 ký tự',
            'tomtat.required' => 'Cần có tóm tắt',
            'noidung.required' => 'Bạn chưa nhập nội dung'
        ]);
        $tintuc = Tintuc::find($id);
        $tintuc->TieuDe = $validate['tieude'];
        $tintuc->TomTat = $validate['tomtat'];
        $tintuc->idLoaiTin = $validate['loaitin'];
        $tintuc->NoiDung = $validate['noidung'];
        $tintuc->SoLuotXem = 0;
        $tintuc->TieuDeKhongDau = changeTitle($validate['tieude']);
        if ($req->hasFile('filehinh')) {
            $file = $req->file('filehinh');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/sua')->with('loi', 'Bạn chỉ được thêm file có
        đuôi jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = "hinhsua" . random_int(0, 9) . "_" . $name;
            while (file_exists('../resources/image/tintuc/' . $hinh)) {
                $hinh = "hinhsua" . random_int(0, 9) . "_" . $name;
            };
            $file->move('../resources/image/tintuc/', $hinh);
            // unlink("../resources/image/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $hinh;
        }
        $tintuc->save();
        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Sửa Thành công');
    }
    function xulyxoa($id)
    {
        $tl = Tintuc::find($id);
        $tl->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xóa tin tức thành
        công');
    }
}
