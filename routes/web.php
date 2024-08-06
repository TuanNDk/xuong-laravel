<?php

use App\Models\Video;
use App\Models\Product;
use App\Models\Articles;
use App\Models\Catelogue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CatalogueController;

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

Route::get('/', function () {
    $topRatedArticles = Articles::with(['ratings' => function ($query) {
        $query->select(DB::raw('ratingable_id, AVG(rating) as average_rating'))
            ->groupBy('ratingable_id')
            ->orderByDesc('average_rating')
            ->take(5);
    }])->get();
    foreach ($topRatedArticles as $item) {
        echo $item->ratings->first()->average_rating . PHP_EOL;
    }

    $topRatedVideo = Video::with(['ratings' => function ($query) {
        $query->select(DB::raw('ratingable_id, AVG(rating) as average_rating'))
            ->groupBy('ratingable_id')
            ->orderByDesc('average_rating');
    }])->get();

    $products = Product::query()->latest('id')->limit(4)->get();

    $catelogues = Catelogue::query()->get();
    
    return view('home', compact('products', 'catelogues'));
})->name('home');

// Route::get('/admin', function () {
//     return 'This is Admin';
// })->middleware('isAdmin');

Route::get('auth/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('auth/login', [LoginController::class, 'login']);

Route::post('auth/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('auth/register', [RegisterController::class, 'showFormRegister'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('product/{slug}', [ProductController::class, 'detail'])->name('product.detail');

// Mua bán hàng
Route::get('cart/list', [CartController::class, 'list'])->name('cart.list');
Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('order/save', [OrderController::class, 'save'])->name('order.save');
