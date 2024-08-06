
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CatalogueController;





Route::prefix('admin')
    ->as('admin.')
    ->middleware(['auth', 'auth.admin'])
    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');


        Route::prefix('catalogues')
            ->as('catalogues.')
            ->group(function () {
                Route::get('/', [CatalogueController::class, 'index'])->name('index');
                Route::get('create', [CatalogueController::class, 'create'])->name('create');
                Route::post('store', [CatalogueController::class, 'store'])->name('store');
                Route::get('show/{id}', [CatalogueController::class, 'show'])->name('show');
                Route::get('{id}/edit', [CatalogueController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [CatalogueController::class, 'update'])->name('update');
                Route::get('{id}/destroy', [CatalogueController::class, 'destroy'])->name('destroy');
            });

        Route::resource('products', ProductController::class);
        Route::resource('users', UserController::class);
        Route::resource('orders', OrderController::class);
    });
