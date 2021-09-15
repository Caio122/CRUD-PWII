<?php

use App\Http\Controllers\Produtos;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/produtos')->group( function(){

    Route::get('/', [Produtos::class, 'index'])->name('produtos.index');

    Route::get('/create', [Produtos::class, 'create'])->name('produtos.create');

    Route::post('/create/store', [Produtos::class, 'store'])->name('produtos.store');

    Route::get('/show/{id}', [Produtos::class, 'show'])->name('produtos.show');

    Route::get('/edit/{id}', [Produtos::class, 'edit'])->name('produtos.edit');

    Route::put('/edit/update/{id}', [Produtos::class, 'update'])->name('produtos.update');

    Route::get('/produtos/delete/{produto}', [Produtos::class, 'destroy'])->name('produtos.delete');

});