<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;

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

Route::get('/', [StaterkitController::class, 'home'])->name('home');
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


Route::get('/payment_order/list',  'App\Http\Controllers\PaymentOrdersController@list')->name('payment_orders.list');
Route::get('/payment_order/add',  'App\Http\Controllers\PaymentOrdersController@add')->name('payment_orders.add');
Route::get('/payment_order/edit',  'App\Http\Controllers\PaymentOrdersController@edit')->name('payment_orders.edit');
Route::get('/payment_order/preview',  'App\Http\Controllers\PaymentOrdersController@preview')->name('payment_orders.preview');
Route::get('/payment_order/print',  'App\Http\Controllers\PaymentOrdersController@print')->name('payment_orders.print');
