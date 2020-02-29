<?php

use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\UniversityIdController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\PermissionController;

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

Route::view('/', 'welcome');

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => ['admin.auth:admin','permission:access_admin_dashboard']], function () {

        //Options
        Route::get('/options', [OptionController::class, 'index']);
        Route::get('/options/create', [OptionController::class, 'create']);
        Route::post('/options', [OptionController::class, 'store']);
        Route::get('/options/{option}/edit', [OptionController::class, 'edit']);
        Route::patch('/options/{option}', [OptionController::class, 'update']);

        //University Id
        Route::get('/university-ids', [UniversityIdController::class, 'index']);
        Route::get('/university-ids/create', [UniversityIdController::class, 'create']);
        Route::post('/university-ids', [UniversityIdController::class, 'store']);
        Route::get('/university-ids/{universityId}/edit', [UniversityIdController::class, 'edit']);
        Route::patch('/university-ids/{universityId}', [UniversityIdController::class, 'update']);

        //Members
        Route::get('/members', [MemberController::class, 'index']);
        Route::get('/members/{member}', [MemberController::class, 'show']);
        Route::get('/members/{member}/edit', [MemberController::class, 'edit']);
        Route::patch('/members/{member}', [MemberController::class, 'update']);

    });
    
});

Route::get('/members/registration', [MemberController::class, 'create']);
Route::post('/members', [MemberController::class, 'store']);
//Invoices
Route::get('/members/{member}/invoices/{invoice}', [InvoiceController::class, 'show']);

Route::get('/test', function(){
    $member = App\Member::first();

    //return view()
    $pdf = PDF::loadView('admin.members.show', compact('member'));
    return $pdf->stream();
    //return $pdf->download('invoice.pdf');
});