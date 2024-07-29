<?php

use App\Http\Controllers\AccessibilityController;
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

$locale = Request::segment(1);

if (in_array($locale, ['ru', 'kk', 'en'])) {
    app()->setLocale($locale);
} else {
    app()->setLocale('ru');

    $locale = '';
}

Route::group([
    'prefix' => $locale
], function () {
    Route::get('/', [\App\Http\Controllers\Client\HomeController::class, 'index'])->name('home-page');
    Route::get('/news', [\App\Http\Controllers\Client\NewsController::class, 'index']);
    Route::get('/news/{slug}', [\App\Http\Controllers\Client\NewsController::class, 'show']);
    Route::get('/gallery', [\App\Http\Controllers\Client\GalleryController::class, 'index']);
    Route::get('/honors', [\App\Http\Controllers\Client\HonorsController::class, 'index']);
    Route::get('/faq', [\App\Http\Controllers\Client\FaqController::class, 'index']);
    Route::post('/faq', [\App\Http\Controllers\Client\FaqController::class, 'store']);
    Route::get('pages/{slug}', [\App\Http\Controllers\Client\PagesController::class, 'show']);
    Route::get('/search', [\App\Http\Controllers\Client\SearchController::class, 'show']);

    // MAIN
    Route::get('/dis-sovet', [\App\Http\Controllers\Client\DisSovetController::class, 'pages']);
    Route::get('/dis-sovet/pages/{slug}', [\App\Http\Controllers\Client\DisSovetController::class, 'single'])->name('dis-sovet.page-single');
    Route::get('/dis-sovet/documents', [\App\Http\Controllers\Client\DisSovetController::class, 'documents'])->name('dis-sovet.documents');
    Route::get('/dis-sovet/information', [\App\Http\Controllers\Client\DisSovetController::class, 'information'])->name('dis-sovet.information');
    Route::get('/dis-sovet/programs', [\App\Http\Controllers\Client\DisSovetController::class, 'eduPrograms'])->name('dis-sovet.eduPrograms');
    Route::get('/dis-sovet/programs/{id}', [\App\Http\Controllers\Client\DisSovetController::class, 'announcement'])->name('dis-sovet.announcement');

    Route::post('/toggle-accessibility', [AccessibilityController::class, 'toggleAccessibility'])->name('toggleAccessibility');
});

if (auth()->guard('moonshine')->user() !== null) {
    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('ckfinder_connector');

    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('ckfinder_browser');
}


Route::get('/test', function () {
    if (auth()->guard('moonshine')->user()) {
        dd('Авторизован');
    } else {
        dd('Не авторизован');
    }
});
