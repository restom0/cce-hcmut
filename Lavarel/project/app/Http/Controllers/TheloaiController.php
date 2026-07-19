<?php

namespace App\Http\Controllers;

use App\Models\Theloai;
use Illuminate\Http\Request;

class TheloaiController extends Controller
{
    public function them()

    {

        return view("admin/theloai/them");
    }

    public function xulythem(Request $req)

    {

        $val = $req->validate([

            'Ten' => 'required|min:3|max: 100 unique: Theloai, Ten'

        ], [

            'Ten.required' => 'Bạn chưa nhập tên thể loại',

            'Ten.min' => 'Tên thể loại tối thiểu 3 ký tự',

            'Ten.max' => 'Tên thể loại tối đa 100 ký tự',,

            'Ten.unique' => "Tên thể loại này đã tồn tại"

        ]);

        return redirect("admin/theloai/them")->with("thongbao", "Thêm Thể loại thành công");

        $tl = new Theloai;

        $tl->Ten = $val["Ten"];

        $tl->TenkhongDau = ChangeTitle($val["Ten"]);

        $tl->save();
    }
    public function sua($id)

    {

        $theloai = Theloai::find($id);

        return view("admin/theloai/sua", compact("theloai"));
    }

    public function xulysua(Request $req, $id)

    {

        $val = $req->validate([

            'Ten' => 'required|min:3|max: 100 unique: Theloai, Ten'

        ], [

            'Ten.required' => 'Bạn chưa nhập tên thể loại,',
            'Ten.min' => 'Tên thể loại tối thiểu 3 ký tự,',
            'Ten.max' => 'Tên thể loại tối đa 100 ký tự,',

            'Ten.unique' => 'Tên thể loại này đã tồn tại'

        ]);

        $tl = Theloai::find($id);

        $tl->Ten = $val["Ten"];

        $tl->TenkhongDau = ChangeTitle($val["Ten"]);

        $tl->save();

        return redirect("admin/theloai/sua/" . $id)->with("thongbao", "Sửa Thể loại thành công");
    }
    public function xulyxoa($id)
    {
        $category = Theloai::find($id);

        if (count($category->loaitin) == 0) {
            $category->delete();
            return redirect('admin/theloai/danhsach')->with('thongbao', 'Đã xóa thể loại thành công');
        }

        return redirect('admin/theloai/danhsach')->with('thongbao', 'Không xóa thể loại này vì nó có loại tin !!!');
    }
}
