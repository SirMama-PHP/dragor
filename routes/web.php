<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/','FrontendController@index')->name('index');
Route::get('/product/detiels/{Product_id}','FrontendController@ProductDetiels')->name('ProductDetiels');

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//CategoryController Route
Route::get('/add_category', 'CategoryController@AddCategory')->name('AddCategory');
Route::post('/add/category/post', 'CategoryController@AddCategoryPost')->name('AddCategoryPost');
Route::get('/update/category/{category_id}', 'CategoryController@UpdateCategory')->name('UpdateCategory');
Route::post('/update/category/post', 'CategoryController@UpdateCategoryPost')->name('UpdateCategoryPost');
Route::get('/delete/category/{id}', 'CategoryController@DeleteCategory')->name('DeleteCategory');
Route::get('/restore/category/{id}', 'CategoryController@RestoreCategory')->name('RestoreCategory');
Route::get('/hard_delete/category/{id}', 'CategoryController@HardDeleteCategory')->name('HardDeleteCategory');

//ProfileController Routes
Route::get('profile','ProfileController@profile')->name('profile');
Route::post('profile/post','ProfileController@ProfilePost')->name('ProfilePost');
Route::post('password/post','ProfileController@PasswordPost')->name('PasswordPost');

//ProductController Routes
Route::get('/add/product', 'ProductController@Add_Product')->name('Add_Product');
Route::post('/add/product/post', 'ProductController@AddProductPost')->name('AddProductPost');
Route::get('/update/category/{category_id}', 'ProductController@UpdateCategory')->name('UpdateCategory');
Route::post('/update/category/post', 'ProductController@UpdateCategoryPost')->name('UpdateCategoryPost');
Route::get('/delete/category/{id}', 'ProductController@DeleteCategory')->name('DeleteCategory');
Route::get('/restore/category/{id}', 'ProductController@RestoreCategory')->name('RestoreCategory');
Route::get('/hard_delete/category/{id}', 'ProductController@HardDeleteCategory')->name('HardDeleteCategory');
