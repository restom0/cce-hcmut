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
Route::get("/them-vao-gio-hang/{id}", [Pagecontroller::class, "getThemgiohang"]);
Route::get("/xoa-gio-hang/{id}", [Pagecontroller::class, "getXoagiohang"]);
Route::get("/dat-hang", [Pagecontroller::class, "getDathang"]);
Route::post("/dat-hang", [Pagecontroller::class, "postDathang"]);
Route::get("/dang-nhap", [Pagecontroller::class, "getDangNhap"]);
Route::get("/dang-ky", [Pagecontroller::class, "getDangKy"]);
Route::post("/dang-nhap", [Pagecontroller::class, "postDangnhap"]);
Route::get("/dang-xuat", [Pagecontroller::class, "getDangXuat"]);
Route::post("/dang-ky", [Pagecontroller::class, "postDangKy"]);
Route::get("/tim-kiem", [Pagecontroller::class, "getTimKiem"]);
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
        Route::get('/dssanpham', [AdminController::class, 'getDanhSachSanPham'])->name('dssanpham');
        Route::get('/themsanpham', [AdminController::class, 'getThemSanPham'])->name('themsanpham');
        Route::post('/themsanpham', [AdminController::class, 'postThemSanPham'])->name('themsanpham');
        Route::get('/editsanpham/{id?}', [AdminController::class, 'getSuaSanpham'])->name('editsanpham');
        Route::post('/editsanpham/{id?}', [AdminController::class, 'postSuaSanpham'])->name('editsanpham');
        Route::get('/xoasanpham/{id}', [AdminController::class, 'xoaSanPham'])->name('xoasanpham');
    });
    Route::group(["prefix" => "user"], function () {
        Route::get('/dsuser', [AdminController::class, 'getdsuser'])->name('dsuser');
        Route::get('/themuser', [AdminController::class, 'getThemUser'])->name('themuser');
        Route::post('/themuser', [AdminController::class, 'postThemUser'])->name('');
        Route::get('/edituser/{id?}', [AdminController::class, 'getSuaUser'])->name('edituser');
        Route::post('/edituser/{id?}', [AdminController::class, 'postSuaUser'])->name('edituser');
        Route::get('/xoauser/{id}', [AdminController::class, 'xoaUser'])->name('xoauser');
    });
    Route::group(["prefix" => "slide"], function () {
        Route::get('/dsSlide', [AdminController::class, 'getdsSlide'])->name('dsSlide');
        Route::get('/themSlide', [AdminController::class, 'getThemSlide'])->name('themslide');
        Route::post('/themSlide', [AdminController::class, 'postThemSlide'])->name('themSlide');
        Route::get('/suaSlide/{id?}', [AdminController::class, 'getSuaSlide'])->name('editslide');
        Route::post('/suaSlide/{id?}', [AdminController::class, 'postSuaSlide'])->name('suaSlide');
        Route::get('/xoaslide/{id}', [AdminController::class, 'xoaSlide'])->name('xoaslide');
    });
});
