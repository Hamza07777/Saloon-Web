<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryServiceController;
use App\Http\Controllers\ComapnydetailController;
use App\Http\Controllers\CompanyheaderController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\purposebrandController;
use App\Http\Controllers\PurposeCategoryController;
use App\Http\Controllers\PurposeServiceController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CompanydaysController;
use App\Models\purpose_service;
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
// Route::get('mytest', function(){
//     return view('employee.services');
// })->name('testroute');
// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::group(['middleware' => 'auth'], function (){



Route::resource('service', ServicesController::class);
Route::resource('caregory', CategoryController::class);
// Route::resource('product', ProductController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('company_detail', ComapnydetailController::class);
Route::resource('service_category', CategoryServiceController::class);
Route::resource('company_header', CompanyheaderController::class);
Route::resource('company_deals', DealController::class);
Route::resource('purpose_service', PurposeServiceController::class);
Route::resource('purpose_Category', PurposeCategoryController::class);
Route::resource('purpose_brand', purposebrandController::class);
Route::resource('company_days', CompanydaysController::class);




Route::post('/service/change_status', [App\Http\Controllers\ServicesController::class, 'change_status'])->name('service.change_status');

// Route::get('/change_password_view', [App\Http\Controllers\HomeController::class, 'change_password_view'])->name('change_password_view');
Route::PUT('change_password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password');

Route::PUT('update_brand', [App\Http\Controllers\HomeController::class, 'update_brands'])->name('update_brand');


Route::get('/company_deals/get_services/{id}', [App\Http\Controllers\DealController::class, 'get_services'])->name('get_services');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/company_deals/get_services_edit/{id}', [App\Http\Controllers\DealController::class, 'get_services_edit'])->name('get_services_edit');


Route::get('/company_deals/get_deal_edit/{id}', [App\Http\Controllers\DealController::class, 'get_deal_edit'])->name('get_deal_edit');

Route::get('/search_company', [App\Http\Controllers\HomeController::class, 'search'])->name('search_company');

Route::get('/company_detail_Select', [App\Http\Controllers\HomeController::class, 'company_detail_Select'])->name('company_detail_Select');

});
