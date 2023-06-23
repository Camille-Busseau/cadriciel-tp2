<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RepertoireController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\CustomAuthController;
use App\Models\Repertoire;

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

// vers l'accueil
Route::get('/', [StudentController::class, 'index'])->name('maisonneuve.index');

// liste des étudiants
// Route::get('students', [CustomAuthController::class, 'students'])->name('students')->middleware('auth');

// REPERTOIRE
Route::get('repertoire', [RepertoireController::class, 'index'])->name('repertoire')->middleware('auth');
Route::get('repertoire-create', [RepertoireController::class, 'create'])->name('repertoire.create')->middleware('auth');
Route::post('repertoire-create', [RepertoireController::class, 'store'])->name('repertoire.store')->middleware('auth');
Route::get('repertoire/{repertoire}', [RepertoireController::class, 'show'])->name('repertoire.show')->middleware('auth');
Route::get('repertoire-edit/{repertoire}', [RepertoireController::class, 'edit'])->name('repertoire.edit')->middleware('auth');
Route::put('repertoire-edit/{repertoire}', [RepertoireController::class, 'update'])->middleware('auth');
Route::delete('repertoire/{repertoire}', [RepertoireController::class, 'destroy'])->middleware('auth');
Route::get('repertoire-download/{repertoire}', [RepertoireController::class, 'download'])->name('repertoire.download')->middleware('auth');

// FORUM
Route::get('forum', [BlogPostController::class, 'index'])->name('forum.index')->middleware('auth');
Route::get('forum/{blogPost}', [BlogPostController::class, 'show'])->name('forum.show')->middleware('auth');
Route::get('forum-create', [BlogPostController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('forum-create', [BlogPostController::class, 'store'])->middleware('auth');
Route::get('forum-edit/{blogPost}', [BlogPostController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('forum-edit/{blogPost}', [BlogPostController::class, 'update'])->middleware('auth');
Route::delete('forum/{blogPost}', [BlogPostController::class, 'destroy'])->middleware('auth');

// Page d'inscription d'un nouvel usager
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('registration', [CustomAuthController::class, 'store']);

// Page de connexion d'un usager
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('login.authentication');

// Déconnexion
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

// vers la page du profil d'un.e étudiant.e
Route::get('student/{student}', [StudentController::class, 'show'])->name('maisonneuve.show')->middleware('auth');

// vers la page de modification d'un profil d'un.e étudiant.e
Route::get('student-edit/{student}', [StudentController::class, 'edit'])->name('maisonneuve.edit')->middleware('auth');
Route::post('student-edit/{student}', [StudentController::class, 'store'])->middleware('auth');
Route::put('student-edit/{student}', [StudentController::class, 'update'])->middleware('auth');

// suppression d'un profil d'un.e étudiant.e
Route::delete('student/{student}', [StudentController::class, 'destroy'])->middleware('auth');

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

