<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkorController;
use App\Http\Controllers\TabelzController;
use App\Models\tabelz;

use function Laravel\Prompts\table;

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

// Route::get('/', function () {
//     return view('template.welcome');
// });




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

Route::get('/dashboard', [SkorController::class,'index']);
Route::get('/export', [SkorController::class,'export']);
Route::get('/read', [SkorController::class,'read']);

Route::get('/cari-nilaiz', [TabelzController::class, 'cariNilaiz'])->name('cari-nilaiz');
Route::get('/hasilcari', [TabelzController::class, 'hasilCari'])->name('hasilcari');



Route::get('/bergolong', [SkorController::class,'bergolong']);
Route::get('/frekuensi', [SkorController::class,'frekuensi']);
Route::get('/create', [SkorController::class,'create']);
Route::post('/upload', [SkorController::class,'upload']);
Route::delete('/delete/{skor:id}', [SkorController::class,'delete']);
Route::get('/edit/{skor:id}', [SkorController::class,'edit']);
Route::put('/edit/{skor:id}', [SkorController::class,'update']);

Route::get('/chi', [SkorController::class, 'getChiSqure']);
Route::post('/chi', [SkorController::class, 'calculateChiSquare'])->name('chi');

Route::get('/ttest', [SkorController::class,'ujiT']);

Route::get('/deskripsi', [SkorController::class,'deskripsi']);

Route::get('/liliefors', [SkorController::class, 'liliefors'])->name('liliefors');


Route::get('import/', function () {
    return view('dashboard.import');
   });
   
   Route::post('import/', [SkorController::class, 'import'])->name('import');



   Route::get('export-dataskor/', [SkorController::class, 'excel']); #disesuaikan
   Route::get('export-chikuadrat/', [SkorController::class, 'chiExcel']); #disesuaikan
   Route::get('export-databergolong/', [SkorController::class, 'bergolongExcel']); #disesuaikan