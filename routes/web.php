<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdviserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\DashHomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/firstRegister',[App\Http\Controllers\HomeController::class, 'firstRegister'])->name('firstRegister');
Route::get('/dashboard2', [App\Http\Controllers\HomeController::class, 'dashboard2'])->name('dashboard2');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// categories table
Route::get('insertCate',[\App\Http\Controllers\CateController::class, 'insertFormCate']);
Route::post('createCate',[\App\Http\Controllers\CateController::class, 'insertCate']);
Route::get('deletecate/{cate_id}',[\App\Http\Controllers\CateController::class, 'deletecate'])->name('deletecate');
Route::get('editcate',[\App\Http\Controllers\CateController::class, 'updatecate'])->name('updatecate');
Route::get('editcate/{cate_id}',[\App\Http\Controllers\CateController::class, 'updateFormCate'])->name('updateFormCate');


// projects table
Route::get('insertProject',[\App\Http\Controllers\ProjectController::class, 'insertFormProject']);
Route::post('createProject',[\App\Http\Controllers\ProjectController::class, 'insertProject']);

//dashHome
Route::get('/sum',[\App\Http\Controllers\DashHomeController::class, 'sum'])->name('sum');

//dashboard
Route::get('/allcate', [\App\Http\Controllers\cateController::class, 'allcate'])->name('allcate');

//user
Route::get('/alluser', [\App\Http\Controllers\UserController::class, 'allUser'])->name('alluser');
Route::get('/addUser', [\App\Http\Controllers\UserController::class, 'addUser'])->name('addUser');
Route::get('/addUserForm', [\App\Http\Controllers\UserController::class, 'addUserForm'])->name('addUserForm');
Route::get('/deleteUser/{id}', [\App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');
Route::get('edituser',[\App\Http\Controllers\UserController::class, 'updateuser'])->name('updateuser');
Route::get('edituser/{id}',[\App\Http\Controllers\UserController::class, 'updateFormUser'])->name('updateFormUser');

//Project
Route::get('/allproject', [\App\Http\Controllers\ProjectController::class, 'allProject'])->name('allproject');
Route::get('/editproject', [\App\Http\Controllers\ProjectController::class, 'editproject'])->name('editproject');
Route::get('/addProject', [\App\Http\Controllers\ProjectController::class, 'addProject'])->name('addProject');
Route::get('/deletepro/{project_id}', [\App\Http\Controllers\ProjectController::class, 'deletepro'])->name('deletepro');
Route::post('/updateproject', [\App\Http\Controllers\ProjectController::class, 'updateproject'])->name('updateproject');
Route::get('/edit_project', [\App\Http\Controllers\ProjectController::class, 'edit_project'])->name('edit_project');


// Document
Route::get('/addfile/{project_id}', [\App\Http\Controllers\DocController::class, 'addfile'])->name('addfile');
Route::post('/uploadfile', [\App\Http\Controllers\DocController::class, 'uploadfile'])->name('uploadfile');
Route::post('/fileUploadPost', [\App\Http\Controllers\DocController::class, 'fileUploadPost'])->name('fileUploadPost');
Route::post('/store', [\App\Http\Controllers\DocController::class, 'store'])->name('store');
Route::get('/allfiles/{project_id}', [\App\Http\Controllers\DocController::class, 'allfiles'])->name('allfiles');
Route::get('/allfile/{project_id}', [\App\Http\Controllers\DocController::class, 'allfile'])->name('allfile');


// adviser
Route::get('/alladviser', [\App\Http\Controllers\AdviserController::class, 'alladviser'])->name('alladviser');
Route::get('/addAdviser', [\App\Http\Controllers\AdviserController::class, 'addAdviser'])->name('addAdviser');
Route::get('/deleteadviser/{adviser_id}', [\App\Http\Controllers\AdviserController::class, 'deleteadviser'])->name('deleteadviser');
Route::post('updateadviser',[\App\Http\Controllers\AdviserController::class, 'updateadviser'])->name('updateadviser');