<?php

use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\ProductAssetController;
use App\Http\Controllers\ProductPublicationController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'name' => config('app.name'),
        'health' => 'ok',
        'admin' => url('/admin'),
    ]);
});

Route::view('/session/name', 'session-name');
Route::post('/session/name', function (Request $request) {
    $validated = $request->validate(['name' => ['required', 'string', 'max:80']]);
    $request->session()->put('demo_name', $validated['name']);

    return back()->with('status', 'Name stored in database session.');
});
Route::get('/session/current', fn (Request $request) => response()->json([
    'name' => $request->session()->get('demo_name'),
]));

Route::get('/catalog/cache-summary', function () {
    return Cache::remember('catalog:summary:v1', now()->addMinutes(10), fn () => [
        'active_products' => Product::where('is_active', true)->count(),
        'total_products' => Product::count(),
    ]);
});

Route::middleware(['auth', 'throttle:products-api'])->prefix('api')->group(function () {
    Route::post('products/{product}/publish', ProductPublicationController::class)->name('products.publish');
    Route::apiResource('products', ProductApiController::class);
    Route::post('products/{product}/asset', [ProductAssetController::class, 'store']);
});
