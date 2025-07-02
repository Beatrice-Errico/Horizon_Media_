<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RevisorController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// le rotte che gestiscono gli articoli
Route::get('/article/index',[ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [HomeController::class, 'careerssubmit'])->name('careers.submit');
// ROTTE ADMIN
Route::middleware('admin')->group(function(){
Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
Route::put('/admin/edit/category/{category}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
Route::delete('/admin/delete/category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
Route::delete('/admin/delete/tag/{tag}', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
Route::put('/admin/edit/tag/{tag}', [AdminController::class,'editTag'])->name('admin.editTag');
Route::post('/admin/tag/store', [AdminController::class, 'storeTag'])->name('admin.storeTag');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::patch('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
Route::patch('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
Route::patch('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
});
// ROTTE REVISOR
Route::middleware('revisor')->group(function(){
Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
Route::post('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
Route::post('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
Route::post('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});
// ROTTE WRITER
Route::middleware('writer')->group(function(){
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/writer/dashboard',[WriterController::class, 'dashboard'])->name('writer.dashboard');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
});


//ROTTE TNT SEARCH
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');


// ROTTE COMMENTI E LIKE
Route::middleware('auth')->group(function () {
Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/articles/{article}/like', [LikeController::class, 'toggle'])->name('articles.like');
});

//ROTTA DOVE SIAMO

Route::get('/dove-siamo', function () {
return view('dove-siamo');
})->name('dove.siamo');






