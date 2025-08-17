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
    Route::get('/streak', [\App\Http\Controllers\StreakController::class, 'index'])->name('streak.index');

    
    
    });

    Route::get('faq',[FAQController::class, 'index']);
Route::any('signout', [AuthController::class, 'signout']);




