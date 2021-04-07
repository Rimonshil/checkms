<?php

use App\Http\Controllers\lookupController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[lookupController::class, 'welcome'])->name('welcome');
Route::get('/alllookup',[lookupController::class, 'alllookup'])->name('alllookup');




Route::post('/txtlookup',[lookupController::class, 'txtlookup'])->name('txtlookup');
Route::post('/ptrlookup',[lookupController::class, 'ptrlookup'])->name('ptrlookup');
Route::post('/nslookup',[lookupController::class, 'nslookup'])->name('nslookup');
Route::post('/alookup',[lookupController::class, 'alookup'])->name('alookup');
Route::post('/aaaalookup',[lookupController::class, 'aaaalookup'])->name('aaaalookup');
Route::post('/mxlookup',[lookupController::class, 'mxlookup'])->name('mxlookup');
Route::post('/spflookup',[lookupController::class, 'spflookup'])->name('spflookup');
Route::post('/dkimlookup',[lookupController::class, 'dkimlookup'])->name('dkimlookup');
Route::post('/dmarclookup',[lookupController::class, 'dmarclookup'])->name('dmarclookup');
Route::post('/spamlookup',[lookupController::class, 'spamlookup'])->name('spamlookup');













Route::get('/txt',[lookupController::class, 'txt'])->name('txt');
Route::get('/ptr',[lookupController::class, 'ptr'])->name('ptr');
Route::get('/ns',[lookupController::class, 'ns'])->name('ns');
Route::get('/a',[lookupController::class, 'a'])->name('a');
Route::get('/aaaa',[lookupController::class, 'aaaa'])->name('aaaa');
Route::get('/mx',[lookupController::class, 'mx'])->name('mx');
Route::get('/spf',[lookupController::class, 'spf'])->name('spf');
Route::get('/dkim',[lookupController::class, 'dkim'])->name('dkim');
Route::get('/dmarc',[lookupController::class, 'dmarc'])->name('dmarc');
Route::get('/spam',[lookupController::class, 'spam'])->name('spam');
