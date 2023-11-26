<?php

namespace App\Http\Controllers;

use App\Models\Loaitin;
use App\Models\Theloai;
use Illuminate\Http\Request;

class LoaitinController extends Controller
{
    public function them()

    {

        return view("admin/loaitin/them", compact('theloai'));
    }

    public function xulythem(Request $req)

    {

        $val = $req->validate([

            'Ten' => 'required|min:3|max: 100 unique: loaitin, Ten',
            'theloai' => 'required'

        ], [

            'Ten.required' => 'Bạn chưa nhập tên loại tin',

            'Ten.min' => 'Tên thể loại tối thiểu 3 ký tự',

            'Ten.max' => 'Tên thể loại tối đa 100 ký tự',

            'Ten.unique' => 'Tên thể loại này đã tồn tại',

            'theloai.required' => 'Bạn chưa chọn thể loại'

        ]);

        $tl = new LoaiTin;

        $tl->Ten = $val["Ten"];

        $tl->idTheLoai = $val["theloai"];

        $tl->TenKhongDau = ChangeTitle($val["Ten"]);

        $tl->save();

        return redirect("admin/loaitin/them")->with("thongbao", "Thêm loại tin thành công");
    }
    public function sua($id)
    {
        // Find the item to be edited.
        $loaitin = LoaiTin::find($id);

        // Get all of the categories.
        $theloai = Theloai::all();

        // Return the view with the item and categories variables.
        return view("admin/loaitin/sua", compact("loaitin", "theloai"));
    }

    public function xulysua(Request $req, $id)
    {
        // Validate the request data.
        $val = $req->validate([
            "Ten" => "required|min:3|max:100|unique:loaitin,Ten",
            "theloai" => "required",
        ], [
            "Ten.required" => "Bạn chưa nhập tên thể loại",
            "Ten.min" => "Tên thể loại tối thiểu 3 ký tự",
            "Ten.max" => "Tên thể loại tối đa 100 ký tự",
            "Ten.unique" => "Tên thể loại này đã tồn tại",
            "theloai.required" => "Bạn chưa chọn thể loại",
        ]);

        // Update the item with the new data from the request.
        $loaitin = LoaiTin::find($id);
        $loaitin->Ten = $val["Ten"];
        $loaitin->TenkhongDau = ChangeTitle($val["Ten"]);
        $loaitin->idTheLoai = $val["theloai"];
        $loaitin->save();

        // Redirect the user to the sua() function with a success message.
        return redirect("admin/loaitin/sua/$id")->with("thongbao", "Sửa Loại Tin thành công");
    }
    public function xulyxoa($id)
    {

        $loaitin = LoaiTin::find($id);

        if (count($loaitin->tintuc) == 0) {

            $loaitin->delete();
            return redirect("admin/loaitin/danhsach")->with("thongbao", "đã xóa thể loại thành công");
        }

        return redirect("admin/loaitin/danhsach")->with("thongbao", "Không xóa thể loại này vì nó có loại tin !!!");
    }
}