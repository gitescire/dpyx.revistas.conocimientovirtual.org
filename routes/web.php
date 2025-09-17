<?php

use App\Models\Answer;
use App\Synchronizers\AnswerSynchronizer;
use Illuminate\Support\Facades\Auth;
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

// Auth::routes(['register' => false]);

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('welcome');

Route::get('synchronize', function(){
    foreach(Answer::get() as $answer){
        (new AnswerSynchronizer($answer))->execute();
    }
    return "synchronized";
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Users\Index::class)->middleware('can:index users')->name('users.index');
    Route::get('create', \App\Http\Livewire\Users\Create::class)->middleware('can:create users')->name('users.create');
    Route::get('account/edit', \App\Http\Livewire\Users\Account\Edit::class)->name('users.account.edit');
    Route::get('{user}/edit', \App\Http\Livewire\Users\Edit::class)->middleware('can:edit users')->name('users.edit');
    Route::get('account', \App\Http\Livewire\Users\Account::class)->name('users.account');
    Route::post('{user}/account', \App\Http\Controllers\Users\StoreAccountController::class)->name('users.account.store');
    Route::post('/', \App\Http\Controllers\Users\StoreUserController::class)->middleware('can:create users')->name('users.store');
    Route::put('{user}', \App\Http\Controllers\Users\UpdateUserController::class)->middleware('can:edit users')->name('users.update');
    Route::delete('{user}', \App\Http\Controllers\Users\DestroyUserController::class)->middleware('can:delete users')->name('users.destroy');
});

Route::prefix('categories')->middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Categories\Index::class)->middleware('can:index categories')->name('categories.index');
    Route::get('create', \App\Http\Livewire\Categories\Create::class)->middleware('can:create categories')->name('categories.create');
    Route::get('{category}/edit', \App\Http\Livewire\Categories\Edit::class)->middleware('can:edit categories')->name('categories.edit');
    Route::post('/', \App\Http\Controllers\Categories\StoreCategoryController::class)->middleware('can:create categories')->name('categories.store');
    Route::put('{category}', \App\Http\Controllers\Categories\UpdateCategoryController::class)->middleware('can:edit categories')->name('categories.update');
    Route::delete('{category}', \App\Http\Controllers\Categories\DestroyCategoryController::class)->middleware('can:delete categories')->name('categories.destroy');
});

Route::prefix('subcategories')->middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Subcategories\Index::class)->middleware('can:index subcategories')->name('subcategories.index');
    Route::get('create', \App\Http\Livewire\Subcategories\Create::class)->middleware('can:create subcategories')->name('subcategories.create');
    Route::get('{subcategory}/edit', \App\Http\Livewire\Subcategories\Edit::class)->middleware('can:edit subcategories')->name('subcategories.edit');
    Route::post('/', \App\Http\Controllers\Subcategories\StoreSubcategoryController::class)->middleware('can:create subcategories')->name('subcategories.store');
    Route::put('{subcategory}', \App\Http\Controllers\Subcategories\UpdateSubcategoryController::class)->middleware('can:edit subcategories')->name('subcategories.update');
    Route::delete('{subcategory}', \App\Http\Controllers\Subcategories\DestroySubcategoryController::class)->middleware('can:delete subcategories')->name('subcategories.destroy');
});

Route::prefix('questions')->middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Questions\Index::class)->middleware('can:index questions')->name('questions.index');
    Route::get('create', \App\Http\Livewire\Questions\Create::class)->middleware('can:create questions')->name('questions.create');
    Route::get('{question}/edit', \App\Http\Livewire\Questions\Edit::class)->middleware('can:edit questions')->name('questions.edit');
    Route::get('export', \App\Http\Controllers\Questions\ExportQuestionController::class)->middleware('can:index questions')->name('questions.export');
    Route::post('/', \App\Http\Controllers\Questions\StoreQuestionController::class)->middleware('can:create questions')->name('questions.store');
    Route::put('{question}', \App\Http\Controllers\Questions\UpdateQuestionController::class)->middleware('can:edit questions')->name('questions.update');
    Route::delete('{question}', \App\Http\Controllers\Questions\DestroyQuestionController::class)->middleware('can:delete questions')->name('questions.destroy');
});

Route::prefix('answers')->middleware('auth')->group(function () {
    Route::get('{answer}/show', \App\Http\Livewire\Answers\Show::class)->name('answers.show');
});

Route::prefix('observations')->middleware('auth')->group(function () {
    Route::post('store', \App\Http\Controllers\Observations\StoreObservationController::class)->middleware('can:create observations')->name('observations.store');
    Route::get('{observation}/files/{file}/download', \App\Http\Controllers\Observations\Files\DownloadFileController::class)->name('observations.files.download');
});

Route::prefix('announcements')->middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Announcements\Index::class)->name('announcements.index');
    Route::get('create', \App\Http\Livewire\Announcements\Create::class)->middleware('can:create announcements')->name('announcements.create');
    Route::get('{announcement}/edit', \App\Http\Livewire\Announcements\Edit::class)->middleware('can:edit announcements')->name('announcements.edit');
    Route::get('{announcement}/evaluations', \App\Http\Livewire\Announcements\Evaluations\Index::class)->middleware('can:index evaluations')->name('announcements.evaluations.index');
    Route::post('/', \App\Http\Controllers\Announcements\StoreAnnouncementController::class)->middleware('can:create announcements')->name('announcements.store');
    Route::put('{announcement}', \App\Http\Controllers\Announcements\UpdateAnnouncementController::class)->middleware('can:edit announcements')->name('announcements.update');
    Route::delete('{announcement}', \App\Http\Controllers\Announcements\DestroyAnnouncementController::class)->middleware('can:delete announcements')->name('announcements.destroy');
});

Route::prefix('repositories')->middleware('auth')->group(function () {
    Route::get('/', \App\Http\Livewire\Repositories\Index::class)->name('repositories.index');
    Route::get('/statistics', \App\Http\Livewire\Repositories\Statistics\All::class)->name('repositories.statistics.all');
    Route::get('{repository}/statistics', \App\Http\Livewire\Repositories\Statistics\Show::class)->name('repositories.statistics.show');
    Route::post('{repository}/send', \App\Http\Controllers\Repositories\SendRepositoryController::class)->middleware('can:edit evaluations')->name('repositories.send');
});

Route::prefix('evaluations')->middleware('auth')->group(function () {
    Route::get('{evaluation}/', \App\Http\Livewire\Evaluations\Show::class)->name('evaluations.show')->middleware('can:index evaluations');
    Route::get('{evaluation}/categories/{category}/questions', \App\Http\Livewire\Evaluations\Categories\Questions\Index::class)->name('evaluations.categories.questions.index')->middleware('evaluations.categories.questions.index');
    Route::get('{evaluation}/user/{user}/assign', \App\Http\Livewire\Evaluations\Assign::class)->middleware('can:edit evaluations')->name('evaluations.assign');
    Route::get('{evaluation}/pdf', \App\Http\Controllers\Evaluations\ExportEvaluationController::class)->name('evaluations.pdf');
    Route::post('{evaluation}/categories/{category}/questions', \App\Http\Controllers\Evaluations\Categories\Questions\StoreQuestionController::class)->name('evaluations.categories.questions.store');
    Route::post('{evaluation}/send', \App\Http\Controllers\Evaluations\SendEvaluationController::class)->name('evaluations.send');
});

Route::prefix('reports')->middleware('auth')->group(function(){
    Route::get('/',\App\Http\Controllers\Reports\DownloadReportController::class)->name('reports.download');
});

Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');