<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Buoi04Controller extends Controller
{
    public function tong()
    {
        return view("Buoi04/tonghaiso");
    }
    public function tinhtong(Request $frm)
    {
        $kiemloi = $frm->validate([
            "so01" => 'required|numeric',
            "so02" => 'required|numeric'
        ], [
            "so01.required" => "Bạn chưa nhập số thứ 01",
            "so01.numeric"  => "số thứ 01 Phải nhập số nha em !!!",
            "so02.required" => "Bạn chưa nhập số thứ 02",
            "so02.numeric"  => "Số thứ 02 Phải nhập số nha em !!!",
        ]);
        $s1 = $frm["so01"];
        $s2 = $frm["so02"];
        $tong = $s1 + $s2;
        return view("Buoi04/tonghaiso", compact("tong", "s1", "s2"));
    }

    public function tongmoi()
    {
        return view("Buoi04/tong2so");
    }
    public function tinhtongmoi(Request $frm)
    {
        $kiemloi = $frm->validate([
            "so01" => 'required|numeric',
            "so02" => 'required|numeric'
        ], [
            "so01.required" => "Bạn chưa nhập số thứ 01",
            "so01.numeric"  => "số thứ 01 Phải nhập số nha em !!!",
            "so02.required" => "Bạn chưa nhập số thứ 02",
            "so02.numeric"  => "Số thứ 02 Phải nhập số nha em !!!",
        ]);
        $s1 = $kiemloi["so01"];
        $s2 = $kiemloi["so02"];
        $tong = $s1 + $s2;
        return view("Buoi04/tonghaiso", compact("tong", "s1", "s2"));
    }

    public function DangHinh()
    {
        return view("Buoi04/danghinh");
    }
    public function XuLyDangHinh(request $frm)
    {
        $val = $frm->validate([
            "taptin" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ], [
            "taptin.required" => "Bạn chưa chọn tập tin ảnh",
            "taptin.image"    => "Tập tin mà bạn chọn, không phải là tập tin ảnh",
            "taptin.mimes"    => "Chỉ đăng các tập tin có phần mở rộng jpeg, jpg, png, gif, svg",
            "taptin.max"      => "Kích thước tập tin không quá 2MB"
        ]);
        $hinh = $val["taptin"];
        $duongdan = public_path("Images");
        $newname  = time() . "." . $hinh->getClientOriginalExtension();
        $hinh->move($duongdan, $newname);

        return back()->with(["thongbao" => "Đăng hình thành công !!!", "tentt" => $newname]);
    }
    public function xemtruyen01()
    {
        return view("Buoi04/truyen01");
    }
    public function xemtruyen02()
    {
        return view("Buoi04/truyen02");
    }

    public function xemtruyen($id = null)
    {
        switch ($id) {
            case 1:
                return view("Buoi04/truyen01");
                break;
            case 2:
                return view("Buoi04/truyen02");
                break;
            case 3:
                return view("Buoi04/truyen03");
                break;
            default:
                return view("Buoi04/index");
        }
    }
}
