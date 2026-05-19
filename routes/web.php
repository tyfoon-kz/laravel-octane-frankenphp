<?php

use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\ProductAssetController;
use App\Http\Controllers\ProductPublicationController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use App\Support\Runtime\WorkerMemoryCounter;

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

if (app()->environment(['local', 'testing'])) {

    Route::prefix('dev/runtime')->group(function () {
        Route::get('light', fn () => response()->json([
            'ok' => true,
            'pid' => getmypid(),
            'timestamp' => now()->toISOString(),
        ]));

        Route::get('products-count', fn () => response()->json([
            'products' => Product::count(),
            'pid' => getmypid(),
        ]));

        Route::get('db-ping', fn () => response()->json([
            'connection' => config('database.default'),
            'result' => DB::select('select 1 as ok')[0]->ok ?? 1,
            'pid' => getmypid(),
        ]));


        Route::post('worker-counter/reset', function () {
            WorkerMemoryCounter::reset();

            return response()->json(['reset' => true]);
        });

        Route::get('worker-counter', function (Request $request, WorkerMemoryCounter $counter) {
            return response()->json($counter->increment($request->query('label', 'default')));
        });









    });
}

Route::middleware(['auth', 'throttle:products-api'])->prefix('api')->group(function () {
    Route::post('products/{product}/publish', ProductPublicationController::class)->name('products.publish');
    Route::apiResource('products', ProductApiController::class);
    Route::post('products/{product}/asset', [ProductAssetController::class, 'store']);
});
