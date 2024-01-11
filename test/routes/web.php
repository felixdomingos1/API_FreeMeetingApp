<?php

use App\Http\Controllers\api\NotificationController;
use App\Http\Controllers\Api\ReceitasController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AvaliarReceitasController;
use App\Http\Controllers\DetalhesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Models\Receitas;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
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
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::get('/recipes', [RecipeController::class, 'index']);

// require __DIR__.'/auth.php';

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Minhas Cenas


Route::get('/', [HomeController::class, 'show'])->name('app');
Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('signup', [RegisterController::class, 'index'])->name('signup');
Route::post('signup', [RegisterController::class, 'register']);

Route::get('login', [ LoginController::class, 'index' ])->name('login');
Route::post('login', [ LoginController::class, 'login' ]);
Route::post('logout', [ LoginController::class, 'logout' ])->name('logout');


Route::get('receitas', [ReceitasController::class,'index'])->name('receitas');
Route::post('receitas', [ReceitasController::class,'store']);
Route::get('myReceitas', [ReceitasController::class,'showMyReceitas'])->name('myReceitas');

Route::get('detalhes/{receitaId}', [DetalhesController::class, 'showDetailPage'])->name('detalhes');

Route::post('avaliar/{score}', [AvaliarReceitasController::class, 'store'])->name('avaliarReceitas');
Route::get('notifivation', [NotificationController::class, 'showNotification'])->name('notification');

Route::get('profile', [RegisterController::class, 'showProfile'])->name('profile');


