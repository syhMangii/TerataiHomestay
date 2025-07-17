<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\FlipchartController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuitDateController;
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
    // Route::get('/admin/patient/{id}/checkins', [AdminController::class, 'viewCheckins'])->name('admin.checkins');
    Route::get('/admin/patient/{id}/edit', [AdminController::class, 'editUser'])->name('admin.editUser');
    Route::delete('/admin/patient/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    Route::get('/admin/patient/{id}/checkins', [AdminController::class, 'viewCheckins'])->name('admin.checkins');
    Route::get('/admin/checkin/{id}/edit', [AdminController::class, 'editCheckin'])->name('admin.checkin.edit');
    Route::delete('/admin/checkin/{id}/delete', [AdminController::class, 'deleteCheckin'])->name('admin.checkin.delete');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
    Route::get('/admin/patients', [AdminController::class, 'indexPatients'])->name('admin.patients');
    Route::get('/admin/patient-details/{user}', [AdminController::class, 'userDetails'])->name('admin.userDetails');
    Route::get('/admin/user/{id}/edit', [AdminController::class, 'editUser'])->name('admin.editUser');
    Route::put('/admin/user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
    // CHECK-IN edit + update + delete
    Route::get('/checkin/{checkin}/edit', [AdminController::class, 'editCheckin'])->name('admin.editCheckin');
    Route::post('/checkin/{checkin}/update', [AdminController::class, 'updateCheckin'])->name('admin.updateCheckin');
    Route::delete('/checkin/{checkin}/delete', [AdminController::class, 'deleteCheckin'])->name('admin.deleteCheckin');
    // STREAK edit + update + delete
    Route::get('/streak/{streak}/edit', [AdminController::class, 'editStreak'])->name('admin.editStreak');
    Route::post('/streak/{streak}/update', [AdminController::class, 'updateStreak'])->name('admin.updateStreak');
    Route::delete('/streak/{streak}/delete', [AdminController::class, 'deleteStreak'])->name('admin.deleteStreak');

    // Add Patient form (GET)
    Route::get('/admin/patients/add', [AdminController::class, 'addUserForm'])->name('admin.addUserForm');

    // Save Patient (POST)
    Route::post('/admin/patients/add', [AdminController::class, 'saveUser'])->name('admin.saveUser');


        Route::get('homestays', [HomestayController::class, 'index']);
        Route::get('createhomestays', [HomestayController::class, 'create']);
        Route::POST('storehomestays', [HomestayController::class, 'store']);
        Route::get('edithomestays/{id}', [HomestayController::class, 'edit']);
        Route::POST('updatehomestays/{id}', [HomestayController::class, 'update']);
        Route::get('viewhomestays/{id}', [HomestayController::class, 'show']);
        Route::any('deletehomestays/{id}', [HomestayController::class, 'destroy']);
        Route::get('bookinglist', [AdminController::class, 'bookinglist']);
        Route::get('viewbookingadmin/{id}', [AdminController::class, 'viewbookingadmin']);
        Route::get('/booking/{id}/download-receipt-admin', [AdminController::class, 'downloadReceipt']);

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
    Route::get('/checkin/create', [CheckInController::class, 'create'])->name('checkin.create');
    Route::post('/checkin/store', [CheckInController::class, 'store'])->name('checkin.store');
    Route::get('/checkin/history', [CheckInController::class, 'history'])->name('checkin.history');
    // Route::get('/badges', [CheckInController::class, 'badges'])->name('checkin.badges');
    Route::get('/collection', [BadgeController::class, 'collection'])->name('checkin.collection');
    Route::get('/aboutus', [CheckInController::class, 'aboutus'])->name('checkin.aboutus');
    Route::get('/flipchart', [FlipchartController::class, 'flipchart'])->name('flipchart');
    Route::get('/flipchart-welcome', [FlipchartController::class, 'welcome'])->name('flipchart.welcome');
    Route::get('/flipchart2', [FlipchartController::class, 'flipchart2'])->name('flipchart.afterQuit');
    Route::post('/flipchart/submit-quiz', [FlipchartController::class, 'submitQuiz'])->name('slides.submit-quiz');
    Route::post('/slides/confirm-read', [FlipchartController::class, 'confirmRead'])->name('slides.confirm-read');

    Route::post('/quit-dates', [QuitDateController::class, 'store'])->name('quit-dates.store');

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
    Route::get('/booking/{id}/download-receipt', [CustomerController::class, 'downloadReceipt'])->name('download.receipt');
    
    });

    Route::get('faq',[FAQController::class, 'index']);
Route::any('signout', [AuthController::class, 'signout']);




