<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdviserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\DashHomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SearchHomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [\App\Http\Controllers\DashController::class, 'sum'])->middleware(['auth'])->name('dashboard');
Route::get('dashuser', [\App\Http\Controllers\UserController::class, 'dashuser'])->middleware('level')->name('dashuser');
Route::get('stddashboard', [\App\Http\Controllers\UserController::class, 'stddashboard'])->name('stddashboard')->middleware('std');
Route::get('tchdashboard', [\App\Http\Controllers\UserController::class, 'tchdashboard'])->name('tchdashboard')->middleware('tch');
Route::get('tchDashUser', [\App\Http\Controllers\UserController::class, 'tchDashUser'])->name('tchDashUser')->middleware('tch');
require __DIR__ . '/auth.php';


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// categories table
Route::get('insertCate', [\App\Http\Controllers\CateController::class, 'insertFormCate']);
Route::post('createCate', [\App\Http\Controllers\CateController::class, 'insertCate'])->name('createCate');
Route::get('deletecate/{cate_id}', [\App\Http\Controllers\CateController::class, 'deletecate'])->name('deletecate');
Route::get('editcate', [\App\Http\Controllers\CateController::class, 'updatecate'])->name('updatecate');
Route::get('editcate/{cate_id}', [\App\Http\Controllers\CateController::class, 'updateFormCate'])->name('updateFormCate');


// projects table
Route::get('insertProject', [\App\Http\Controllers\ProjectController::class, 'insertFormProject']);
Route::post('createProject', [\App\Http\Controllers\ProjectController::class, 'insertProject']);

//dashHome
Route::get('/sum', [\App\Http\Controllers\DashHomeController::class, 'sum'])->name('sum');

//dashboard
Route::get('/allcate', [\App\Http\Controllers\cateController::class, 'allcate'])->name('allcate');

//user
Route::get('/alluser', [\App\Http\Controllers\UserController::class, 'allUser'])->name('alluser');
Route::get('/addUser', [\App\Http\Controllers\UserController::class, 'addUser'])->name('addUser');
Route::get('/addUserForm', [\App\Http\Controllers\UserController::class, 'addUserForm'])->name('addUserForm');
Route::get('/deleteUser/{id}', [\App\Http\Controllers\UserController::class, 'deleteUser'])->name('deleteUser');
Route::get('edituser', [\App\Http\Controllers\UserController::class, 'updateuser'])->name('updateuser');
Route::get('edituser/{id}', [\App\Http\Controllers\UserController::class, 'updateFormUser'])->name('updateFormUser');

//Project
Route::get('/allproject', [\App\Http\Controllers\ProjectController::class, 'allProject'])->name('allproject');
Route::get('/editproject', [\App\Http\Controllers\ProjectController::class, 'editproject'])->name('editproject');
Route::get('/addProject', [\App\Http\Controllers\ProjectController::class, 'addProject'])->name('addProject');
Route::get('/deletepro/{project_id}', [\App\Http\Controllers\ProjectController::class, 'deletepro'])->name('deletepro');
Route::post('/updateproject', [\App\Http\Controllers\ProjectController::class, 'updateproject'])->name('updateproject');
Route::get('/edit_project', [\App\Http\Controllers\ProjectController::class, 'edit_project'])->name('edit_project');
Route::get('/contact', [\App\Http\Controllers\ProjectController::class, 'contact'])->name('contact');


// dashboard member
Route::post('/stdUpdateproject', [\App\Http\Controllers\ProjectController::class, 'stdUpdateproject'])->name('stdUpdateproject');
Route::get('/stdProjects', [\App\Http\Controllers\ProjectController::class, 'stdProjects'])->name('stdProjects');
Route::get('/stdAddProject', [\App\Http\Controllers\ProjectController::class, 'stdAddProject'])->name('stdAddProject');
Route::get('/stdAllFiles/{project_id}', [\App\Http\Controllers\DocController::class, 'stdAllFiles'])->name('stdAllFiles');

Route::post('/tchUpdateproject', [\App\Http\Controllers\ProjectController::class, 'tchUpdateproject'])->name('tchUpdateproject');
Route::get('/tchProjects', [\App\Http\Controllers\ProjectController::class, 'tchProjects'])->name('tchProjects');
Route::get('/tchAddProject', [\App\Http\Controllers\ProjectController::class, 'tchAddProject'])->name('tchAddProject');
Route::get('/tchAllFiles/{project_id}', [\App\Http\Controllers\DocController::class, 'tchAllFiles'])->name('tchAllFiles');
Route::get('/tchPending', [\App\Http\Controllers\ProjectController::class, 'tchPending'])->name('tchPending');


// Document
Route::get('/addfile/{project_id}', [\App\Http\Controllers\DocController::class, 'addfile'])->name('addfile');
Route::post('/uploadfile', [\App\Http\Controllers\DocController::class, 'uploadfile'])->name('uploadfile');
Route::post('/fileUploadPost', [\App\Http\Controllers\DocController::class, 'fileUploadPost'])->name('fileUploadPost');
Route::post('/store', [\App\Http\Controllers\DocController::class, 'store'])->name('store');
Route::post('/storeAgain', [\App\Http\Controllers\DocController::class, 'storeAgain'])->name('storeAgain');
Route::post('/upFileDoc', [\App\Http\Controllers\DocController::class, 'upFileDoc'])->name('upFileDoc');

Route::get('/allfiles/{project_id}', [\App\Http\Controllers\DocController::class, 'allfiles'])->name('allfiles');


Route::get('/allfile/{project_id}', [\App\Http\Controllers\DocController::class, 'allfile'])->name('allfile');
Route::get('/deletedoc/{doc_id}', [\App\Http\Controllers\DocController::class, 'deletedoc'])->name('deletedoc');
Route::get('/documents/{title_th}', [\App\Http\Controllers\DocController::class, 'fileindoc'])->name('fileindoc');
Route::get('allFiles', [DocController::class, 'allFiles'])->name('allFiles');
Route::get('Doc/{project_id}', [\App\Http\Controllers\DocController::class, 'showDoc'])->name('Doc');
Route::post('stdUploadfile', [\App\Http\Controllers\DocController::class, 'stdUploadfile'])->name('stdUploadfile');

// adviser
Route::get('/alladviser', [\App\Http\Controllers\AdviserController::class, 'alladviser'])->name('alladviser');
Route::get('/addAdviser', [\App\Http\Controllers\AdviserController::class, 'addAdviser'])->name('addAdviser');
Route::get('/deleteadviser/{adviser_id}', [\App\Http\Controllers\AdviserController::class, 'deleteadviser'])->name('deleteadviser');
Route::post('updateadviser', [\App\Http\Controllers\AdviserController::class, 'updateadviser'])->name('updateadviser');

// Search
Route::get('searched', [\App\Http\Controllers\SearchController::class, 'showsec']);
Route::get('dashsearch', [\App\Http\Controllers\SearchController::class, 'dashsearch'])->name('dashsearch');
Route::get('result_dashsearch', [\App\Http\Controllers\SearchController::class, 'result_dashsearch'])->name('result_dashsearch');
Route::get('search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('konha', [\App\Http\Controllers\SearchController::class, 'konha'])->name('konha');
Route::get('konhasearch', [\App\Http\Controllers\SearchController::class, 'konhasearch'])->name('konhasearch');
Route::get('searchProject', [\App\Http\Controllers\SearchController::class, 'searchProject'])->name('searchProject');

// Search Home
Route::get('searchsec', [\App\Http\Controllers\SearchController::class, 'showProjects'])->name('searchsec');
Route::get('searchhome', [\App\Http\Controllers\SearchHomeController::class, 'searchhome'])->name('searchhome');
Route::get('Document/{project_id}', [\App\Http\Controllers\SearchHomeController::class, 'showDoc'])->name('Document');
Route::get('searchcate/{cate_id}', [\App\Http\Controllers\SearchHomeController::class, 'searchcate'])->name('searchcate');

// sidebar
Route::get('newProject', [\App\Http\Controllers\SearchHomeController::class, 'newProject'])->name('newProject');
Route::get('oldProject', [\App\Http\Controllers\SearchHomeController::class, 'oldProject'])->name('oldProject');
Route::get('cate1Project', [\App\Http\Controllers\SearchHomeController::class, 'cate1Project'])->name('cate1Project');
Route::get('cate2Project', [\App\Http\Controllers\SearchHomeController::class, 'cate2Project'])->name('cate2Project');
Route::get('cate4Project', [\App\Http\Controllers\SearchHomeController::class, 'cate4Project'])->name('cate4Project');

// download
// Route::get('/download/{doc_id}/{docname}', [DocController::class, 'Download'])->name('download');
Route::get('/get-file/{doc_id}/{docname}', [DocController::class, 'Download']);
Route::get('/get-pdf/{doc_path}', [DocController::class, 'getpdf']);

// report
Route::get('all-report', [\App\Http\Controllers\ReportController::class, 'index'])->name('allreport');

// pending
Route::get('pending-projects', [\App\Http\Controllers\ProjectController::class, 'pendingProject'])->name('pendingProject');
Route::get('publishProject/{project_id}', [\App\Http\Controllers\ProjectController::class, 'publishProject'])->name('publishProject');
Route::get('pending-users', [\App\Http\Controllers\UserController::class, 'pendingUser'])->name('pendingUser');
Route::get('approveUser/{id}', [\App\Http\Controllers\UserController::class, 'approveUser'])->name('approveUser');

// dash

//Report
Route::get('user-report', [\App\Http\Controllers\ReportController::class, 'userReport'])->name('userReport');
Route::get('Project-categories-port', [\App\Http\Controllers\ReportController::class, 'projectCateReport'])->name('projectCateReport');
Route::get('Project-port', [\App\Http\Controllers\ReportController::class, 'projectReport'])->name('projectReport');

Route::get('/forgot', [\App\Http\Controllers\PasswordResetLinkController::class, 'create'])->name('forgot');


// Route::middleware('level')->group(function () {
//     Route::get('pending-projects', [\App\Http\Controllers\ProjectController::class, 'pendingProject'])->name('pendingProject');
//     Route::get('publishProject', [\App\Http\Controllers\ProjectController::class, 'publishProject'])->name('publishProject');
//     Route::get('pending-users', [\App\Http\Controllers\UserController::class, 'pendingUser'])->name('pendingUser');
//     Route::get('approveUser', [\App\Http\Controllers\UserController::class, 'approveUser'])->name('approveUser');
// });
