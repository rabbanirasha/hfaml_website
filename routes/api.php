<?php
use App\Http\Controllers\SyncApiController;
use Illuminate\Support\Facades\Route;

Route::post('/v1/sync/nav-data', [SyncApiController::class, 'store']) ->middleware('sync.auth');