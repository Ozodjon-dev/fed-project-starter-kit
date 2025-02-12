<?php

use App\Http\Controllers\ContractCategoriesController;
use App\Http\Controllers\MemorialOrder2Controller;
use App\Http\Controllers\MemorialOrder6Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaymentOrdersController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\ContractorsController;
use App\Http\Controllers\ReceiptOfFundsController;

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


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




// Authentication

Route::post('/login', function (Request $request) {
    $user = User::where('login', $request->login)->first();

    if ($user && $request->password === $user->password) { // Hash o'rniga oddiy string solishtirish
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    return back()->with('error', 'Неправильный логин или пароль');
})->name('login.post');




Route::get('/login', function () {
    return view('auth.login');
})->name('login'); // Login sahifasi uchun GET methodi



Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Сначала войдите в систему!');
    }
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login')->with('message', 'Вы вышли из системы');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//Route::get('/', [StaterkitController::class, 'home'])->name('home');
Route::get('home', [StaterkitController::class, 'home'])->name('home');
// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);


//___________________________________________________________________


//Route::get('/contracts',  'App\Http\Controllers\ContractsController@index')->name('contracts.index');
//
//Route::get('/contracts/update',  'App\Http\Controllers\ContractsController@update');
//Route::get('/contracts/delete',  'App\Http\Controllers\ContractsController@delete');
//Route::get('/contracts/restore',  'App\Http\Controllers\ContractsController@restore');
//Route::get('/contracts/first_or_create',  'App\Http\Controllers\ContractsController@firstOrCreate');
//Route::get('/contracts/update_or_create',  'App\Http\Controllers\ContractsController@updateOrCreate');
//
//Route::get('/users',  'App\Http\Controllers\UsersController@index')->name('users.index');
//Route::get('/about',  'App\Http\Controllers\AboutController@index')->name('about.index');
Route::get('/', 'App\Http\Controllers\MainController@index')->name('main.index');

// payment orders Route
Route::get('/payment_order/list', [PaymentOrdersController::class, 'list'])->name('payment_orders.list');
Route::get('/payment_order/add', [PaymentOrdersController::class, 'add'])->name('payment_orders.add');
Route::post('/payment_order', [PaymentOrdersController::class, 'store'])->name('payment_orders.store');
Route::get('/payment_order/preview/{id}', [PaymentOrdersController::class, 'preview'])->name('payment_orders.preview');
Route::get('/payment_order/print/{id}', [PaymentOrdersController::class, 'print'])->name('payment_orders.print');
Route::get('/payment_order/{id}/edit', [PaymentOrdersController::class, 'edit'])->name('payment_orders.edit');
Route::patch('/payment_order/{id}', [PaymentOrdersController::class, 'update'])->name('payment_orders.update');
Route::delete('/payment_order/{id}', [PaymentOrdersController::class, 'destroy'])->name('payment_orders.delete');
Route::get('/payment_order/export', [PaymentOrdersController::class, 'exportPaymentOrders'])->name('payment_orders.export');


// contracts Route
Route::get('/contract/list', [ContractsController::class, 'list'])->name('contracts.list');
Route::get('/contract/add', [ContractsController::class, 'add'])->name('contracts.add');
Route::post('/contract', [ContractsController::class, 'store'])->name('contracts.store');
Route::get('/contract/{id}', [ContractsController::class, 'show'])->name('contracts.show');
Route::get('/contract/{id}/edit', [ContractsController::class, 'edit'])->name('contracts.edit');
Route::patch('/contract/{id}', [ContractsController::class, 'update'])->name('contracts.update');
Route::delete('/contract/{id}', [ContractsController::class, 'destroy'])->name('contracts.delete');
Route::get('/contracts/export', [ContractsController::class, 'exportContracts'])->name('contracts.export');

// contractors Route
Route::get('/contractor/list', [ContractorsController::class, 'list'])->name('contractors.list');
Route::get('/contractor/add', [ContractorsController::class, 'add'])->name('contractors.add');
Route::post('/contractor', [ContractorsController::class, 'store'])->name('contractors.store');
Route::get('/contractor/{id}', [ContractorsController::class, 'show'])->name('contractors.show');
Route::get('/contractor/{id}/edit', [ContractorsController::class, 'edit'])->name('contractors.edit');
Route::patch('/contractor/{id}', [ContractorsController::class, 'update'])->name('contractors.update');
Route::delete('/contractor/{id}', [ContractorsController::class, 'destroy'])->name('contractors.delete');

// contract categories Route
Route::get('/contracts_category/list', [ContractCategoriesController::class, 'list'])->name('contract_categories.list');
Route::get('/contracts_category/add', [ContractCategoriesController::class, 'add'])->name('contract_categories.add');
Route::post('/contracts_category', [ContractCategoriesController::class, 'store'])->name('contract_categories.store');
Route::get('/contracts_category/{id}', [ContractCategoriesController::class, 'show'])->name('contract_categories.show');
Route::get('/contracts_category/{id}/edit', [ContractCategoriesController::class, 'edit'])->name('contract_categories.edit');
Route::patch('/contracts_category/{id}', [ContractCategoriesController::class, 'update'])->name('contract_categories.update');
Route::delete('/contracts_category/{id}', [ContractCategoriesController::class, 'destroy'])->name('contract_categories.delete');

// memorial order-2 Route
Route::get('/memorial_order_2/list', [MemorialOrder2Controller::class, 'list'])->name('memorial_order2.list');

// memorial order-6 Route
Route::get('/memorial_order_6/list', [MemorialOrder6Controller::class, 'list'])->name('memorial_order6.list');

// receipt of funds Route
Route::get('/receipt_of_funds/list', [ReceiptOfFundsController::class, 'list'])->name('receipt_of_funds.list');
Route::get('/receipt_of_funds/add', [ReceiptOfFundsController::class, 'add'])->name('receipt_of_funds.add');
Route::post('/receipt_of_funds', [ReceiptOfFundsController::class, 'store'])->name('receipt_of_funds.store');
Route::get('/receipt_of_funds/{id}', [ReceiptOfFundsController::class, 'show'])->name('receipt_of_funds.show');
Route::get('/receipt_of_funds/{id}/edit', [ReceiptOfFundsController::class, 'edit'])->name('receipt_of_funds.edit');
Route::patch('/receipt_of_funds/{id}', [ReceiptOfFundsController::class, 'update'])->name('receipt_of_funds.update');
Route::delete('/receipt_of_funds/{id}', [ReceiptOfFundsController::class, 'destroy'])->name('receipt_of_funds.delete');
