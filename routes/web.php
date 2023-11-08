<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [PublicController::class, 'welcome' ])->name('welcome');
Route::get('/article/index', [ArticleController::class, 'index' ])->name('article.index');
Route::get('/article/{article:slug}/show/', [ArticleController::class, 'show' ])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory' ])->name('article.byCategory');
Route::get('/profile/article', [ArticleController::class, 'profile'])->name('profile');
Route::delete('/profile/article/{id}',[ArticleController::class, 'destroy'])->name('delete');
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/{user}/set-Admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::get('/admin/{user}/set-Revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::get('/admin/{user}/set-Writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::put('/admin/edit/{tag}/tag', [AdminController::class,'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/{tag}/tag', [AdmoinController::class, 'deleteTag'])->name('admin.deleteTag');
    Route::put('/admin/edit/{category}/category', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/{category}/category', [AdmoinController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});

Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::get('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::get('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::get('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

Route::middleware('writer')->group(function(){

    Route::get('/article/create', [ArticleController::class, 'create' ])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/writer/dashboard', [WriterController::class, 'dashboard' ])->name('writer.dashboard');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit' ])->name('article.edit');
    Route::put('/article/{article}/update', [ArticleController::class, 'update' ])->name('article.update');
    Route::delete('/article/{article}/destroy', [ArticleController::class, 'destroy' ])->name('article.destroy');


});