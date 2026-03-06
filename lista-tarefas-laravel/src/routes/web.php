<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return redirect()->route('tarefas.index');
});

Route::get('/ola-mundo', function () {
    return 'Olá, mundo!';
});

Route::get('/teste-view', function () {
    return view('teste-view');
});

Route::resource('tarefas', TarefaController::class);

Route::resource('categorias', CategoriaController::class);
