<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaymentOrdersController;
use App\Http\Controllers\ContractsController;

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


Route::get('/contracts',  'App\Http\Controllers\ContractsController@index')->name('contracts.index');

Route::get('/contracts/update',  'App\Http\Controllers\ContractsController@update');
Route::get('/contracts/delete',  'App\Http\Controllers\ContractsController@delete');
Route::get('/contracts/restore',  'App\Http\Controllers\ContractsController@restore');
Route::get('/contracts/first_or_create',  'App\Http\Controllers\ContractsController@firstOrCreate');
Route::get('/contracts/update_or_create',  'App\Http\Controllers\ContractsController@updateOrCreate');

Route::get('/users',  'App\Http\Controllers\UsersController@index')->name('users.index');
Route::get('/about',  'App\Http\Controllers\AboutController@index')->name('about.index');
Route::get('/',  'App\Http\Controllers\MainController@index')->name('main.index');

// payment orders Route
Route::get('/payment_order/list',  [PaymentOrdersController::class, 'list'])->name('payment_orders.list');
Route::get('/payment_order/add',  [PaymentOrdersController::class, 'add'])->name('payment_orders.add');
Route::get('/payment_order/edit',  [PaymentOrdersController::class, 'edit'])->name('payment_orders.edit');
Route::get('/payment_order/preview',  [PaymentOrdersController::class, 'preview'])->name('payment_orders.preview');
Route::get('/payment_order/print',  [PaymentOrdersController::class, 'print'])->name('payment_orders.print');

// contracts Route
Route::get('/contract/list',  [ContractsController::class, 'list'])->name('contracts.list');
Route::get('/contract/add',  [ContractsController::class, 'add'])->name('contracts.add');
Route::get('/contract/edit',  [ContractsController::class, 'edit'])->name('contracts.edit');
