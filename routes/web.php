<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HomestayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);


Route::get('/chat', function () {
    return view('chat');
});


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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('loginusr', [AuthController::class, 'index'])->name('loginusr');
    Route::get('loginadmin', [AuthController::class, 'indexadmin'])->name('loginadmin');
    Route::post('postloginusr', [AuthController::class, 'login']);
    Route::post('postloginadmin', [AuthController::class, 'loginadmin']);
    Route::get('regusr', [AuthController::class, 'register']);
    Route::post('postregisterusr', [AuthController::class, 'store']);
});

Route::middleware(['admin'])->group(function () {
    Route::get('homestays', [HomestayController::class, 'index']);
    Route::get('createhomestays', [HomestayController::class, 'create']);
    Route::POST('storehomestays', [HomestayController::class, 'store']);
    Route::get('edithomestays/{id}', [HomestayController::class, 'edit']);
    Route::POST('updatehomestays/{id}', [HomestayController::class, 'update']);
    Route::get('viewhomestays/{id}', [HomestayController::class, 'show']);
    Route::any('deletehomestays/{id}', [HomestayController::class, 'destroy']);
    Route::get('bookinglist', [AdminController::class, 'bookinglist']);
    Route::get('viewbookingadmin/{id}', [AdminController::class, 'viewbookingadmin']);
    Route::get('mysupportadmin',[AdminController::class, 'mysupportadmin']);
    Route::get('customers',[AdminController::class, 'customers']);
Route::post('sendReplyAdmin/{id}',[AdminController::class, 'replyAdmin']);

Route::get('createbookingAdmin',[AdminController::class, 'createBooking']);
Route::POST('storeBookingAdmin',[AdminController::class, 'store']);
Route::get('editbookingAdmin/{id}',[AdminController::class, 'edit']);
Route::POST('updateBookingAdmin/{id}',[AdminController::class, 'update']);
Route::any('deleteBookingadmin/{id}',[AdminController::class, 'destroyBooking']);

Route::get('createCustomer',[AdminController::class, 'createCustomer']);
Route::POST('storeCustomer',[AdminController::class, 'storeCustomer']);
Route::get('editCustomer/{id}',[AdminController::class, 'editCustomer']);
Route::get('viewCustomer/{id}',[AdminController::class, 'viewCustomer']);
Route::POST('updateCustomer/{id}',[AdminController::class, 'updateCustomer']);
Route::any('deletecustomer/{id}',[AdminController::class, 'destroyCustomer']);


});

Route::middleware(['customer'])->group(function () {
    Route::get('homeusr',[CustomerController::class, 'index']);
    Route::get('calendar',[CustomerController::class, 'calendar']);
    Route::get('createbooking',[CustomerController::class, 'create']);
    Route::POST('storeBooking',[CustomerController::class, 'store']);
    Route::get('editbooking/{id}',[CustomerController::class, 'edit']);
    Route::POST('updateBooking/{id}',[CustomerController::class, 'update']);
    Route::get('viewbooking/{id}',[CustomerController::class, 'show']);
    Route::any('deletebooking/{id}',[CustomerController::class, 'destroy']);
    Route::get('packagelist',[CustomerController::class, 'packagelist']);
    Route::get('custsupport',[CustomerController::class, 'custsupport']);
    Route::post('sendReplyCustomer/{id}',[CustomerController::class, 'replyCustomer']);
    Route::get('profile',[CustomerController::class, 'profile']);
    Route::post('updProfile',[CustomerController::class, 'updProfile']);
    
    });

    Route::get('faq',[FAQController::class, 'index']);
Route::any('signout', [AuthController::class, 'signout']);




