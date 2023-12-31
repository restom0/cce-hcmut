<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Buoi03Controller;
use App\Http\Controllers\Buoi04Controller;
use App\Http\Controllers\Buoi05Controller;
use App\Http\Controllers\Buoi06Controller;
use App\Http\Controllers\mycontroller;
use App\Http\Controllers\Buoi07Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'Buoi01'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/chao/{nam?}/{hoten?}', function ($nam = null, $hoten = null) {

        return "$hoten chào các bạn, năm $nam là năm tốt";
    })->name("chaoban");

    Route::get('/xemtho', function () {
        return view('Buoi01/thoquehuong');
    });

    Route::get('/thome', function () {
        return view("thome");
    })->name("xemthome");

    Route::get("/vidu01", function () {
        return view("Buoi02/vidu01");
    });

    Route::post("/dangkytb", function () {
        return "Dang Ky thanh cong";
    })->name("dangky");
});

Route::group(['prefix' => "Buoi02"], function () {
    Route::get('tinhluong', function () {
        return view("Buoi02/tinhluong");
    });

    Route::post('tinhluong', function (Request $abc) {
        $nc = $abc["ngaycong"];
        $lg = $abc["luongngay"];
        $lt = $nc * $lg;
        return view("Buoi02/tinhluong", compact("lt", "nc", "lg"));
    });

    Route::get('tl02', function () {
        return view("Buoi02/tl02");
    });

    Route::post('tl02', function (Request $req) {
        $nc = $req["ngaycong"];
        $lg = $req["luongngay"];
        $lt = $nc * $lg;
        return view("Buoi02/tl02", compact("nc", "lg", "lt"));
    });
});

Route::group(['prefix' => "Buoi03"], function () {
    Route::get("/ChaoBan", [Buoi03Controller::class, "ChaoBan"]);
    Route::get("/tinhluong", [Buoi03Controller::class, "tinhluong"]);
    Route::post("/tinhluong", [Buoi03Controller::class, "xulytinhluong"]);

    Route::get('/HinhChuNhat/{cd?}/{cr?}', [Buoi03Controller::class, "HinhChuNhat"])->name("hcn1");
});

Route::group(['prefix' => 'Buoi04'], function () {
    Route::get('page', function () {
        return view('Buoi04.page');
    });
    Route::get('/tonghaiso', [Buoi04Controller::class, "tong"]);
    Route::post('/tonghaiso', [Buoi04Controller::class, "tinhtong"]);

    Route::get('/tong2so', [Buoi04Controller::class, "tongmoi"]);
    Route::post('/tong2so', [Buoi04Controller::class, "tinhtongmoi"]);

    Route::get('/danghinh', [Buoi04Controller::class, "DangHinh"]);
    Route::post('/danghinh', [Buoi04Controller::class, "XuLyDangHinh"]);

    Route::get("/xemtruyen01", [Buoi04Controller::class, "xemtruyen01"])->name("t01");
    Route::get("/xemtruyen02", [Buoi04Controller::class, "xemtruyen02"])->name("t02");

    Route::get("Xemtruyen/{id?}", [Buoi04Controller::class, "xemtruyen"])->name("truyen");
    Route::get("/", [Buoi04Controller::class, "xemtruyen"])->name("index");
});

Route::group(['prefix' => 'Buoi05'], function () {
    Route::get('lietkemonhoc', [Buoi05Controller::class, "getDanhSachMonHoc"]);
    Route::get('danhsachmonhoc', [Buoi05Controller::class, "LietKeMonHoc"]);
});

Route::group(['prefix' => 'Buoi06'], function () {
    Route::get('lietke1', [Buoi06Controller::class, "TruyVan1"])->name("lietke1");
    Route::get('lietke2', [Buoi06Controller::class, "TruyVan2"])->name("lietke2");

    Route::get("danhsachmonhoc", [Buoi06Controller::class, "DanhSach_MonHoc"])->name("danhsachmonhoc");
    Route::get('themmonhoc', [Buoi06Controller::class, "ThemMoi_MonHoc"])->name("themmonhoc");
    Route::post('themmonhoc', [Buoi06Controller::class, "Xuly_them_mh"])->name("xuly_them_mh");
    Route::get("suamonhoc/{mamh}", [Buoi06Controller::class, "Sua_MonHoc"])->name("suamonhoc");
    Route::post("suamonhoc/{mamh}", [Buoi06Controller::class, "xuly_sua_mh"])->name("xuly_sua_mh");
    Route::get("xoamonhoc/{mamh}", [Buoi06Controller::class, "xuly_xoa_mh"])->name("xuly_xoa_mh");
});
Route::group(['prefix' => "Buoi07"], function () {
    Route::get("/lienketdsmh", [mycontroller::class, "display_all_subjects"]);
    Route::group(["prefix" => "monhoc"], function () {
        Route::get("lietkemonhoc", [baitapcontroller::class, "get_lkmonhoc"])->name("lkmh");
        Route::get("themmonhoc", [baitapcontroller::class, "get_themmonhoc"])->name("thmh");
        Route::post("themmonhoc", [baitapcontroller::class, "post_themmonhoc"])->name("ltmh");
        Route::get("suamonhoc/{mamh}", [baitapcontroller::class, "get_suamonhoc1"])->name("suamh1");
        Route::post("suamonhoc/{mamh}", [baitapcontroller::class, "post_suamonhoc"])->name('cnmh');
        Route::get("xoamonhoc/{mamh}", [baitapcontroller::class, "get_xoamonhoc"])->name("xoamh");
    });
});
Route::group(['prefix' => 'Buoi08'], function () {
    Route::resource("monhoc", MonhocController::class);
    Route::resource("lophoc", LophocController::class);
});
Route::group(['prefix' => 'Buoi09'], function () {
    Route::group(["prefix" => "front"], function () {
        Route::get("trangchu", [Pagecontroller::class, "get_trangchul"]);
        Route::get("lienhe", [Pagecontroller::class, "get_lienhe"]);
        Route::get("loaitin/{id}/{TenKhongDau}.html", [Pagecontroller::class, "get_loaitin"])->name("loaitin");
        //Route::getrloaitin/{id}/{TenKhongDau}.html",[Pagecontroller::class,"get_loaitin1)->name("loaitin");
        Route::get("tintuc/{id}/{TieuDeKhongDau}.html", [Pagecontroller::class, "get_tintucl"])->name("tintuc");
        Route::post("comment/{id}", [Pagecontroller::class, "post_comment"])->name('xylucomment');
    });
    Route::get("dangnhap", [Pagecontroller::class, "get_dangnhap"])->name("dangnhap");
    Route::post("dangnhap", [Pagecontroller::class, "post_dangnhap1"])->name("dangnhap");
    Route::get("dangxuat", [Pagecontroller::class, "get_dangxuat1"])->name("dangxuat");
    Route::get("nguoidung", [PageController::class, "nguoidung"])->name("nguoidung");
    Route::post("nguoidung", [PageController::class, "xulynguoidung"])->name("xulynguoidung");
    Route::get("dangky", [pagecontroller::class, "get_dangky"])->name("dangky");
    Route::post("dangky", [pagecontroller::class, "post_dangky"])->name("xulydangky");
    Route::get("gioithieu", [Pagecontroller::class, "get_gioithieu"])->name("getgioithieu");
    Route::post("timkiem", [Pagecontroller::class, "post_timkiem"])->name("timkiem");
});
Route::group(['prefix' => 'admin', 'middleware' => 'AdminLogin'], function () {
    // Theloai group
    Route::group(['prefix' => 'theloai'], function () {
        Route::get('danhsach', [TheloaiController::class, "danhsach"])->name("danhsachtl");
        Route::get('sua', [TheloaiController::class, "sua"])->name("suatl");
        Route::get('them', [TheloaiController::class, "them"])->name("themtl");
        Route::get('them', [TheloaiController::class, "xulythem"])->name("xulythemtl");
        Route::get('sua/{id}', [TheloaiController::class, 'sua'])->name("suatl");
        Route::post('sua/{id}', [TheloaiController::class, 'xulysua'])->name('xulysuatl');
        Route::get('xoa/{id}', [TheloaiController::class, 'xulyxoa'])->name('xulyxoatl');
    });

    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('danhsach', [Loaitinontroller::class, "danhsach"])->name("danhsachlt");
        Route::get('sua', [LoaitinController::class, "sua"])->name("sualt");
        Route::get('them', [LoaitinController::class, "them"])->name("themtl");
    });
    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('danhsach', [TintucController::class, "danhsach"])->name("danhsachtt");

        Route::get('them', [TintucController::class, "them"])->name("themtt");
        Route::post('them', [TintucController::class, "xulythem"])->name("xulythemtt");

        Route::get('sua/{id}', [TintucController::class, "sua"])->name("suatt");
        Route::post('sua/{id}', [TintucController::class, "xulysua"])->name("xulysuatt");

        Route::get('xoa/{id}', [TintucController::class, "xulyxoa"])->name("xulyxoatt");
    });
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{idTheLoai)', 'AjaxController@getLoaiTin');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('danhsach', [UserController::class, 'get_danhsach_usr'])->name('danhsach_usr');
        Route::get('sua/{id}', [UserController::class, 'get_suads_usr'])->name('sua_ds_usr');
        Route::post('sua', [UserController::class, 'post_suads_usr'])->name('sua_ds_usr');
        Route::get('them', [UserController::class, 'get_themds_usr'])->name('them_ds_usr');
        Route::post('them', [UserController::class, 'post_themds_usr'])->name('them_ds_usr');
        Route::get('xoa/{id}', [UserController::class, 'xoa_usr'])->name('xoa_usr');
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('danhsach', [SildeController::class, 'get_danhsach_sl'])->name('danhsach_sl');
        Route::get('sua/{id}', [SildeController::class, 'get_suads_sl'])->name('sua_ds_sl');
        Route::post('sua/{id}', [SildeController::class, 'post_suads_sl'])->name('sua_ds_sl');
        Route::get('them', [SildeController::class, 'get_themds_sl'])->name('them_ds_sl');
        Route::post('them', [SildeController::class, 'post_themds_sl'])->name('them_ds_sl');
        Route::get('xoa/{id}', [SildeController::class, 'xoa_sl'])->name('xoa_sl');
    });
});
Route::get('login', [AdminController::class, 'getLogin'])->name('login');
Route::post('login', [AdminController::class, 'postLogin'])->name('login');
Route::get('logout', [AdminController::class, 'getLogout'])->name('logout');
Route::get('profileUser', [AdminController::class, 'getProfileUser'])->name('profile');
Route::get('dashboard', [AdminController::class, 'getDashboard'])->name('dashboard');
