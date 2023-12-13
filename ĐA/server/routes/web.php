<?php

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
