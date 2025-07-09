<?php

use App\Http\Controllers\GalleryController;

Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
Route::put('/gallery/{id}', [GalleryController::class, 'update'])->name('gallery.index');
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
