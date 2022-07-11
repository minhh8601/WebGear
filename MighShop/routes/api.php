<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\API\NhanvienController;
use App\Http\Controllers\API\nhacungcapcontroller;
use App\Http\Controllers\API\Loaisanphamcontroller;
use App\Http\Controllers\API\Khocontroller;
use App\Http\Controllers\API\Khachhangcontroller;
use App\Http\Controllers\API\Billbancontroller;
use App\Http\Controllers\API\Billnhapcontroller;
use App\Http\Controllers\API\Billdetailbancontroller;
use App\Http\Controllers\API\Newscontroller;
use App\Http\Controllers\API\Sanphamcontroller;
use App\Http\Controllers\API\Userscontroller;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/search','App\Http\Controllers\API\SanphamController@search');


Route::resource('nhanviens', NhanvienController::class);
Route::resource('nccs', nhacungcapcontroller::class);
Route::resource('loaisanphams', Loaisanphamcontroller::class);
Route::resource('khos', Khocontroller::class);
Route::resource('khachhangs', Khachhangcontroller::class);
Route::resource('billsbans', Billbancontroller::class);
Route::resource('billsnhap', Billnhapcontroller::class);
Route::resource('billdetailbans', Billdetailbancontroller::class);
Route::resource('newss', Newscontroller::class);
Route::resource('sanphams', Sanphamcontroller::class);
Route::resource('userss', Userscontroller::class);