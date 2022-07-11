<?php

use App\Models\nhanvien;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('_layout');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog-details', function () {
    return view('blog-details');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/banphim', function () {
    return view('banphim');
});

Route::get('/chuot', function () {
    return view('chuot');
});

Route::get('/tainghe', function () {
    return view('tainghe');
});

Route::get('/shop-grid', function () {
    return view('shop-grid');
});


Route::get('/shoping-cart', function () {
    return view('shoping-cart');
});

Route::get('/productdetail/{id}', function () {
    return view('productdetail');
});

Route::get('/blog-details/{id}', function () {
    return view('blog-details');
});
Route::get('/admin/nhanvien',function(){
    return view('admin.nhanvien.index');
});

Route::get('/admin/nhacungcap', function () {
    return view('admin.nhacungcap.index');
});

Route::get('/admin/billsban', function () {
    return view('admin.billsban.index');
});

Route::get('/admin/billsnhap', function () {
    return view('admin.billsnhap.index');
});

Route::get('/admin/sanpham',function(){
    return view('admin.sanpham.index');
});

Route::get('/admin/loaisp', function () {
    return view('admin.loaisp.index');
});

Route::get('/admin/khachhang', function () {
    return view('admin.khachhang.index');
});

Route::get('/admin/kho', function () {
    return view('admin.kho.index');
});

Route::get('/admin/billdetailban',function(){
    return view('admin.billdetailban.index');
});

Route::get('/admin/billdetailnhap',function(){
    return view('admin.billdetailnhap.index');
});

Route::get('/admin/news',function(){
    return view('admin.news.index');
});

Route::get('/admin/users',function(){
    return view('admin.users.index');
});
////////////////////////////////////////////////////////

Route::get('/nhanvien', function () {
    return view('admin.nhanvien.index');
});

Route::get('/nhacungcap', function () {
    return view('admin.nhacungcap.index');
});

Route::get('/sanpham',function(){
    return view('admin.sanpham.index');
});

Route::get('/loaisp', function () {
    return view('admin.loaisp.index');
});

Route::get('/khachhang', function () {
    return view('admin.khachhang.index');
});

Route::get('/kho', function () {
    return view('admin.kho.index');
});

Route::get('/billsban', function () {
    return view('admin.billsban.index');
});

Route::get('/billsnhap', function () {
    return view('admin.billsnhap.index');
});

Route::get('/billdetailban',function(){
    return view('admin.billdetailban.index');
});

Route::get('/billdetailnhap',function(){
    return view('admin.billdetailnhap.index');
});

Route::get('/news',function(){
    return view('admin.news.index');
});

Route::get('/user',function(){
    return view('admin.users.index');
});
Route::get('/index',function(){
    return view('index');
});
