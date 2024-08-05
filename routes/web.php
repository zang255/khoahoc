<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseClientController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\CheckRoleAdminMiddleware;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// Route::get('/admin', function () {

//     return view('admin.home');
// })->middleware('auth.admin')->name('admin.home');


Route::prefix('clients')
    ->as('clients.')

    ->group(function () {
        Route::get('/', function () {

            $data = Course::query()->with(['category', 'instructor'])->latest()->paginate(6);


            return view('client.home', compact('data'));
        })->name('home');

        Route::get('cart', [CartController::class, 'showCart'])->middleware('auth')->name('cart');
        Route::get('checkout', [CartController::class, 'checkout'])->middleware('auth')->name('checkout');
        Route::post('add-to-cart', [CartController::class, 'addToCart'])->middleware('auth')->name('addToCart');
        Route::post('update-to-cart', [CartController::class, 'updateToCart'])->middleware('auth')->name('updateToCart');


        Route::post('buy-now', [CartController::class, 'buyNow'])->name('buynow');
        Route::prefix('courses')
            ->as('courses.')
            ->group(function () {
                Route::get('/', [CourseClientController::class, 'index'])->name('index');
                Route::get('/create', [CourseClientController::class, 'create'])->name('create');
                Route::post('/store', [CourseClientController::class, 'store'])->name('store');
                Route::get('/{course}', [CourseClientController::class, 'show'])->name('show');
                Route::get('/{course}/edit', [CourseClientController::class, 'edit'])->name('edit');
                Route::put('/{course}/update', [CourseClientController::class, 'update'])->name('update');
                Route::delete('/{course}/destroy', [CourseClientController::class, 'destroy'])->name('destroy');
            });

        Route::post('vnpay_payment', [PaymentController::class, 'vnpay_payment'])->name('vnpay_payment');
        Route::get('vnpay_return', [PaymentController::class, 'vnpay_return'])->name('vnpay_return');
       


        Route::post('add-review', [ReviewController::class, 'addReview'])->middleware('auth')->name('addReview');

    });





Route::get('login', [AuthController::class, 'showFormLogin'])->name('showLogin');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('register', [AuthController::class, 'showFormRegister']);
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');










// Route::get('/', function () {

//     $data = Course::query()->with(['category', 'instructor'])->latest()->paginate(6);


//     return view('client.home', compact('data'));
// })->middleware('auth')->name('client.home');










Route::middleware('auth.admin')->prefix('admins')
    ->as('admins.')
    ->group(function () {
        Route::get('/admin', function () {

            return view('admin.home');
        })->name('home');


        Route::resource('roles', RoleController::class);

        Route::resource('categories', CategoryController::class);

        Route::prefix('courses')
            ->as('courses.')
            ->group(function () {
                Route::get('/', [CourseController::class, 'index'])->name('index');
                Route::get('/create', [CourseController::class, 'create'])->name('create');
                Route::post('/store', [CourseController::class, 'store'])->name('store');
                Route::get('/{course}', [CourseController::class, 'show'])->name('show');
                Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('edit');
                Route::put('/{course}/update', [CourseController::class, 'update'])->name('update');
                Route::delete('/{course}', [CourseController::class, 'destroy'])->name('destroy');
            });


    });









