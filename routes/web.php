<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/csrf-token', function () {
    return ['csrf_token' => csrf_token()];
});

Route::get('/storage/images/{filename}', function ($filename) {
    $path = storage_path('app/public/images/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::get('/blogs', [BlogController::class, 'index']);
Route::post('/blogs', [BlogController::class, 'store']);
Route::get('/blogs/{blog}', [BlogController::class, 'show']);
Route::put('/blogs/{blog}', [BlogController::class, 'update']);
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy']);
