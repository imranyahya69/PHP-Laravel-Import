<?php

use App\Http\Controllers\ExcelController;
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

Route::get('/', function () {
    return redirect()->route('excel_lisiting');
});

Route::get('/excel-listing', [ExcelController::class, 'index'])->name('excel_lisiting');
Route::get('/excel-detail/{excelDetail}', [ExcelController::class, 'show'])->name('excel_detail');

Route::get('/import-excel', [ExcelController::class, 'create'])->name('import_excel');
Route::post('/import-excel', [ExcelController::class, 'store'])->name('import_excel');
