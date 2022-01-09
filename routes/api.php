<?php

use Illuminate\Support\Facades\Route;



Route::post('/cotacao', [\App\Http\Controllers\CotacaoFreteController::class, 'store']);
Route::put('/cotacao', [\App\Http\Controllers\CotacaoFreteController::class, 'calculoImposto']);
Route::get('/cotacao', [\App\Http\Controllers\CotacaoFreteController::class, 'index']);

Route::get('/transportadora', [\App\Http\Controllers\TransportadoraController::class, 'index']);


