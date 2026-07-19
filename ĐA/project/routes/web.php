<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', [PageController::class, "getIndex"]);
Route::get('/loai-san-pham/{type}', [PageController::class, "getLoaisanpham"]);
Route::get('/chi-tiet-san-pham/{id}', [PageController::class, "getChitietsanpham"])->name('detailproduct');
Route::get('/lien-he', [PageController::class, "getLienHe"]);
Route::get('/gioi-thieu', [PageController::class, "getGioithieu"]);
Route::get("/them-vao-gio-hang/{id}", [PageController::class, "getThemgiohang"]);
Route::get("/xoa-gio-hang/{id}", [PageController::class, "getXoagiohang"]);
Route::get("/dat-hang", [PageController::class, "getDathang"]);
Route::post("/dat-hang", [PageController::class, "postDathang"]);
Route::get("/dang-nhap", [PageController::class, "getDangNhap"]);
Route::get("/dang-ky", [PageController::class, "getDangKy"]);
Route::post("/dang-nhap", [PageController::class, "postDangnhap"]);
Route::get("/dang-xuat", [PageController::class, "getDangXuat"]);
Route::post("/dang-ky", [PageController::class, "postDangKy"]);
Route::get("/tim-kiem", [PageController::class, "getTimKiem"]);
Route::group(['prefix' => 'admin'], function () {
    Route::get("/index", [Admincontroller::class, "getLoginAdmin"]);
    Route::post("/index", [Admincontroller::class, "postLoginAdmin"]);
    Route::get("/dangxuat", [Admincontroller::class, "getLogoutAdmin"]);
    Route::get("/thongtin", [Admincontroller::class, "getUserInfo"]);
    Route::get("/danhsachloai", [Admincontroller::class, "getProducttype"]);
    Route::get("/themloaisp", [Admincontroller::class, "getAddProducttype"]);
    Route::post("/themloaisp", [Admincontroller::class, "postAddProducttype"]);
    Route::get("/sualoaisp/{id}", [Admincontroller::class, "getEditProducttype"])->name("sualoaisp");
    Route::post("/sualoaisp/{id}", [Admincontroller::class, "postEditProducttype"]);
    Route::get("/xoaloaisp/{id}", [Admincontroller::class, "getDeleteProducttype"])->name("xoaloaisp");
    Route::get("/lietkedonhang", [Admincontroller::class, "getBills"]);
    Route::get("/capnhatdonhang/{id}", [Admincontroller::class, "getEditBills"])->name("capnhatdonhang");
    Route::post("/capnhatdonhang/{id}", [Admincontroller::class, "postEditBills"]);
    Route::get("/danhsachkh", [Admincontroller::class, "getCustomer"]);
    Route::get("/xoakhachhang/{id}", [Admincontroller::class, "deleteCustomer"]);
    Route::group(['prefix' => 'product'], function () {
        Route::get('/dssanpham', [Admincontroller::class, 'getDanhSachSanPham'])->name('dssanpham');
        Route::get('/themsanpham', [Admincontroller::class, 'getThemSanPham'])->name('themsanpham');
        Route::post('/themsanpham', [Admincontroller::class, 'postThemSanPham'])->name('themsanpham');
        Route::get('/editsanpham/{id?}', [Admincontroller::class, 'getSuaSanpham'])->name('editsanpham');
        Route::post('/editsanpham/{id?}', [Admincontroller::class, 'postSuaSanpham'])->name('editsanpham');
        Route::get('/xoasanpham/{id}', [Admincontroller::class, 'xoaSanPham'])->name('xoasanpham');
    });
    Route::group(["prefix" => "user"], function () {
        Route::get('/dsuser', [Admincontroller::class, 'getdsuser'])->name('dsuser');
        Route::get('/themuser', [Admincontroller::class, 'getThemUser'])->name('themuser');
        Route::post('/themuser', [Admincontroller::class, 'postThemUser'])->name('themuser');
        Route::get('/edituser/{id?}', [Admincontroller::class, 'getSuaUser'])->name('edituser');
        Route::post('/edituser/{id?}', [Admincontroller::class, 'postSuaUser'])->name('edituser');
        Route::get('/xoauser/{id}', [Admincontroller::class, 'xoaUser'])->name('xoauser');
    });
    Route::group(["prefix" => "slide"], function () {
        Route::get('/dsSlide', [Admincontroller::class, 'getdsSlide'])->name('dsSlide');
        Route::get('/themSlide', [Admincontroller::class, 'getThemSlide'])->name('themslide');
        Route::post('/themSlide', [Admincontroller::class, 'postThemSlide'])->name('themSlide');
        Route::get('/suaSlide/{id?}', [Admincontroller::class, 'getSuaSlide'])->name('editslide');
        Route::post('/suaSlide/{id?}', [Admincontroller::class, 'postSuaSlide'])->name('suaSlide');
        Route::get('/xoaslide/{id}', [Admincontroller::class, 'xoaSlide'])->name('xoaslide');
    });
});
