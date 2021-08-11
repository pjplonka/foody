<?php

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

Route::get('/meals/{meal}/products/create', [MealProductController::class, 'create'])->name('meal-products.create');
Route::post('/meals/{meal}/products', [MealProductController::class, 'store'])->name('meal-products.store');
Route::get('meal-products/{mealProduct}', [MealProductController::class, 'edit'])->name('meal-products.edit');
Route::put('meal-products/{mealProduct}', [MealProductController::class, 'update'])->name('meal-products.update');
Route::delete('meal-products/{mealProduct}', [MealProductController::class, 'destroy'])->name('meal-products.destroy');
