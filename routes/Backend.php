<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\DoctorController;





/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/Dashboard_Admin', [DashboardController::class,'index']);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function()
    {
        //############################   Dashboard user #########################################
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.index');
        })->middleware(['auth', 'verified'])->name('dashboard.user');

        //############################ end Dashboard user #########################################

        //############################   Dashboard admin #########################################

        
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.index');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');
        Route::post('logout', [AdminController::class, 'destroy'])->name('logout_admin');


        //############################ end Dashboard admin #########################################

       Route::middleware(['auth:admin'])->group(function () {
           //############################   Dashboard sections #########################################

           Route::resource('Sections', SectionController::class);
          //############################   end Dashboard sections #######################################


           //############################   Dashboard doctors #########################################
           Route::resource('Doctors', DoctorController::class);


           
       });





        
        
        
        require __DIR__.'/auth.php';

    });


