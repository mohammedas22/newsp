<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Contact_requestsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\User_authController;
use App\Http\Controllers\ViewerController;
use App\Http\Controllers\Website\HomeController;
use App\Models\Contact_requests;
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
    return view('welcome');
});

Route::prefix('cms/')->middleware('guest:admin')->group(function(){
    Route::get('{guard}/login',[User_authController::class ,'showLogin'])->name('view.login');
    Route::post('{guard}/login',[User_authController::class ,'Login']);
});

Route::prefix('cms/admin')->middleware('auth:admin')->group(function(){
    Route::get('logout' , [User_authController::class , 'Logout'])->name('cms.admin.logout');
});
// ->middleware('auth:admin')
Route::prefix('cms/admin/')->middleware('auth:admin')->group(function(){
    Route::view('','cms.parent');
    Route::view('temp','cms.temp');
    Route::resource('countries', CountryController::class);
    Route::post('update_country/{id}',[CountryController::class,'update' ])->name('update_country');
    Route::resource('admins', AdminController::class);
    Route::post('update_admins/{id}',[AdminController::class,'update' ])->name('update_admins');
    Route::resource('settings', settingController::class);
    Route::post('update_settings/{id}',[settingController::class,'update' ])->name('update_settings');
    Route::resource('viewers', ViewerController::class);
    Route::post('update_viewers/{id}',[ViewerController::class,'update' ])->name('update_viewers');
    Route::resource('authors', AuthorController::class);
    Route::post('update_authors/{id}',[AuthorController::class,'update' ])->name('update_authors');
    Route::resource('categories', CategoryController::class);
    Route::post('update_categories/{id}',[CategoryController::class,'update' ])->name('update_categories');
    Route::resource('contact_requests', Contact_requestsController::class);
    Route::post('update_contact_requests/{id}',[Contact_requestsController::class,'update' ])->name('update_contact_requests');
    Route::resource('articles', ArticleController::class);
    Route::post('update_articles/{id}',[ArticleController::class,'update' ])->name('update_articles');

    Route::resource('contacts', ContactsController::class);
    Route::post('update_contacts/{id}',[ContactsController::class,'update' ])->name('update_contacts');

    Route::resource('sliders', SliderController::class);
    Route::post('update_sliders/{id}',[SliderController::class,'update' ])->name('update_sliders');

    Route::resource('roles', RoleController::class);
    Route::post('update_roles/{id}' , [RoleController::class , 'update'])->name('update_roles');
    Route::resource('permissions', PermissionController::class);
    Route::post('update_permissions/{id}' , [PermissionController::class , 'update'])->name('update_permissions');
    Route::resource('role.permissions', RolePermissionController::class);

});

Route::prefix('news/')->group(function(){
    Route::view('show/{id}' ,[HomeController::class ,'showDet'])->name('website.det');
    Route::view('frond1', 'frond.master');
    Route::view('index', 'frond.index')->name('news.index');
    Route::view('contact', 'frond.contact')->name('news.contact');
    Route::view('all', 'frond.all-news')->name('news.all-news');
    Route::view('det', 'frond.newsdetailes')->name('news.det');

});
// ['nawspage'=>'Website']
