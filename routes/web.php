<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Day\DaysController;
use App\Http\Controllers\MealProductController;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\MyGoalController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('users', UsersController::class);
Route::resource('products', ProductsController::class);
Route::resource('meals', MealsController::class);
Route::resource('my-goals', MyGoalController::class);
Route::resource('days', DaysController::class);

Route::get('/meals/{meal}/products/create', [MealProductController::class, 'create'])->name('meal-products.create');
Route::post('/meals/{meal}/products', [MealProductController::class, 'store'])->name('meal-products.store');
Route::get('meal-products/{mealProduct}', [MealProductController::class, 'edit'])->name('meal-products.edit');
Route::put('meal-products/{mealProduct}', [MealProductController::class, 'update'])->name('meal-products.update');
Route::delete('meal-products/{mealProduct}', [MealProductController::class, 'destroy'])->name('meal-products.destroy');

Route::get('/days/{day}/meals/create', [\App\Http\Controllers\Day\MealsController::class, 'create'])->name('day-meals.create');
Route::post('/days/{day}/meals', [\App\Http\Controllers\Day\MealsController::class, 'store'])->name('day-meals.store');
Route::delete('/day-meals/{meal}', [\App\Http\Controllers\Day\MealsController::class, 'destroy'])->name('day-meals.destroy');

Route::get('/days/{day}/meals/{meal}/products/create', [\App\Http\Controllers\Day\ProductsController::class, 'create'])->name('day-meal-products.create');
Route::post('/days/{day}/meals/{meal}/products', [\App\Http\Controllers\Day\ProductsController::class, 'store'])->name('day-meal-products.store');

Route::delete('/day-products/{product}', [\App\Http\Controllers\Day\ProductsController::class, 'destroy'])->name('day-products.destroy');
Route::get('day-products/{product}', [\App\Http\Controllers\Day\ProductsController::class, 'edit'])->name('day-products.edit');
Route::put('day-products/{product}', [\App\Http\Controllers\Day\ProductsController::class, 'update'])->name('day-products.update');
