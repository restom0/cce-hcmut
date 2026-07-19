<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\Khoa;

class LophocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dslh = LopHoc::all();
        return view("Buoi08/danhsach", compact("dslh"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $dskhoa = Khoa::all();
        return view("Buoi08/themmoi", compact("dskhoa"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $val = $req->validate([
            "tenlop" => "required",
            "makhoa" => "required",
            "gvcn" => "required",
            "siso" => "required|numeric",
            "hocphi" => "required|numeric",
        ],[
            "tenlop.required" => "Bạn chưa nhập tên môn học",
            "makhoa.required" => "Bạn chưa chọn mã khoa",
            "gvcn.required" => "Bạn chưa nhập tên giáo viên",
            "siso.required"    => "bạn chưa nhập sỉ số",
            "siso.numeric"     => "Sỉ số chỉ phải nhập số",
            "hocphi.required"    => "bạn chưa nhập học phí",
            "hocphi.numeric"     => "học phí  phải nhập số"

        ]);
        $lh = new LopHoc();
        $lh->tenlop = $val["tenlop"];
        $lh->makhoa = $val["makhoa"];
        $lh->gvcn = $val["gvcn"];
        $lh->siso = $val["siso"];
        $lh->hocphi = $val["hocphi"];
        $lh->save();
        return redirect()->route("lophoc.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lophoc = LopHoc::find($id);
        return view("Buoi08/chitiet", compact("lophoc"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lophoc = LopHoc::where("malop","=", $id)->get();
        $dskhoa = Khoa::all();
        return view("Buoi08/sua", compact("lophoc", "dskhoa"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $val = $request->validate([
            "tenlop" => "required",
            "makhoa" => "required",
            "gvcn" => "required",
            "siso" => "required|numeric",
            "hocphi" => "required|numeric",
        ],[
            "tenlop.required" => "Bạn chưa nhập tên môn học",
            "makhoa.required" => "Bạn chưa chọn mã khoa",
            "gvcn.required" => "Bạn chưa nhập tên giáo viên",
            "siso.required"    => "bạn chưa nhập sỉ số",
            "siso.numeric"     => "Sỉ số chỉ phải nhập số",
            "hocphi.required"    => "bạn chưa nhập học phí",
            "hocphi.numeric"     => "học phí  phải nhập số"

        ]);
        $lh = LopHoc::find($id);
        $lh->tenlop = $val["tenlop"];
        $lh->makhoa = $val["makhoa"];
        $lh->gvcn = $val["gvcn"];
        $lh->siso = $val["siso"];
        $lh->hocphi = $val["hocphi"];
        $lh->save();
        return redirect()->route("lophoc.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //LopHoc::where("malop","=", $id)->delete()
        $lh = LopHoc::find($id);
        $lh->delete();
        return redirect()->route("lophoc.index");
    }
}
