<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\BuscarController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicControllers\ExportDocument;
use App\Http\Controllers\PublicControllers\ExportRelatorio;
use Illuminate\Support\Facades\Route;

//use Darryldecode\Cart\Cart;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{slug}', [HomeController::class, 'single'])->name('product.single');
Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category.single');
/**
 * Busca Rotas para exportações publicas.
 */

Route::group(['name' => 'public.', 'prefix' => 'export', 'middleware' => 'web'], function () {
    Route::get('/document/{public_id}', [ExportDocument::class, 'index'])->name('document');
    Route::get('/relatorio/{public_id}', [ExportRelatorio::class, 'index'])->name('relatorio');
});

Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/process', [CheckoutController::class, 'process'])->name('proccess');
    Route::get('/thanks', [CheckoutController::class, 'thanks'])->name('thanks');

    Route::post('/notification', [CheckoutController::class, 'notification'])->name('notification');
});

/**
 * Carrinho de compras
 */
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('add', [CartController::class, 'add'])->name('add');
    Route::get('remove/{slug}', [CartController::class, 'remove'])->name('remove');
    Route::get('cancel', [CartController::class, 'cancel'])->name('cancel');
});
Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::post('cep', [AjaxController::class, 'getCep'])->name('getCep');
    Route::post('frete', [AjaxController::class, 'getFrete'])->name('getFrete');
    Route::post('frete/add', [AjaxController::class, 'addFrete'])->name('addFrete');
});
Route::get('/blank', [CheckoutController::class, 'pay2']);


Route::get('/auth/{slug}/callback', [SocialiteController::class, 'callback']);
Route::get('/auth/{slug}/redirect', [SocialiteController::class, 'redirect']);

Route::get('/buscar', [BuscarController::class, 'index']);
use App\Http\Controllers\ContactController;
Route::get('/contato',[ContactController::class,'index'])->name('contact.index');
Route::post('/contato',[ContactController::class,'store'])->name('contact.store');
