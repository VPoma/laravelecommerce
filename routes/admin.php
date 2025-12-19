<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hola desde el Administrador';
})->name('dashboard');

Route::get('/tiki', function () {
    return 'Hola tiki tiki';
})->name('tiki.index');