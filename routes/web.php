<?php

use App\Http\Controllers\DayMealsController;
use App\Http\Controllers\DayProductsController;
use App\Http\Controllers\DaysController;
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

Route::get('/days/{day}/meals/create', [DayMealsController::class, 'create'])->name('day-meals.create');
Route::post('/days/{day}/meals', [DayMealsController::class, 'store'])->name('day-meals.store');
Route::delete('/days/{day}/meals/{mealId}', [DayMealsController::class, 'destroy'])->name('day-meals.destroy');

Route::get('/days/{day}/products/create', [DayProductsController::class, 'create'])->name('day-products.create');
Route::post('/days/{day}/products', [DayProductsController::class, 'store'])->name('day-products.store');
Route::delete('/days/{day}/products/{productId}', [DayProductsController::class, 'destroy'])->name('day-products.destroy');
Route::get('day-products/{dayProduct}', [DayProductsController::class, 'edit'])->name('day-products.edit');
Route::put('day-products/{dayProduct}', [DayProductsController::class, 'update'])->name('day-products.update');
