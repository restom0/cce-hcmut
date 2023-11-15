<?php

namespace App\Http\Controllers;

use App\Models\Monhoc;
use Illuminate\Http\Request;

class Buoi07Controller extends Controller
{
    public function get_lkmonhoc()
    {
        $dsmh = Monhoc::all();
        return view("buoi07.monhoc", compact('dsmh'));
    }
    public function get_themmonhoc()
    {
        return view("buoi07.themmonhoc");
    }
    public function post_themmonhoc(Request $req)
    {
        $vl = $req->validate([
            'tenmh' => 'required|min:7',
            'sotinchi' => 'required|numeric|min:3|max:10'
        ], [
            'tenmh.required' => 'Bạn chưa nhập tên môn học',
            'tenmh.min' => 'Tên môn học tối thiểu 7 ký tự',
            'sotinchi.required' => 'Chưa nhập số tín chỉ',
            'sotinchi.numeric' => 'phải nhập số',
            'sotinchi.min' => 'tối thiểu 3 tín chỉ',
            'sotinchi.max' => 'tối đa 10 tín chỉ'
        ]);
        $monhoc = new Monhoc();
        $monhoc->tenmh = $vl["tenmh"];
        $monhoc->sotinchi = $vl["sotinchi"];
        $monhoc->save();
        return redirect()->route("lkmh")->with("thongbao", "Thêm môn học thành công");
    }
    public function get_suamonhoc($mamh)
    {
        $monhoc = Monhoc::find($mamh);
        return view("buoi07.suamonhoc", compact("monhoc"));
    }
    public function post_suamonhoc(Request $req, $mamh)
    {
        $vl = $req->validate([
            'tenmh' => 'required|min:7',
            'sotinchi' => 'required|numeric|min:3|max:10'
        ], [
            'tenmh.required' => 'Bạn chưa nhập tên môn học',
            'tenmh.min' => 'Tên môn học tối thiểu 7 ký tự',
            'sotinchi.required' => 'Chưa nhập số tín chỉ',
            'sotinchi.numeric' => 'phải nhập số',
            'sotinchi.min' => 'tối thiểu 3 tín chỉ',
            'sotinchi.max' => 'tối đa 10 tín chỉ'
        ]);
        $monhoc = Monhoc::find($mamh);
        $monhoc->tenmh = $vl["tenmh"];
        $monhoc->sotinchi = $vl["sotinchi"];
        $monhoc->save();
        return redirect()->route('lkmh')->with('thongbao', 'Cập nhật môn học thành công');
    }
    public function get_xoamonhoc($mamh)
    {
        $monhoc = Monhoc::find($mamh);
        $monhoc->delete();
        return redirect()->route("lkmh")->with("thongbao", "Đã xóa môn học thành công");
    }
}
