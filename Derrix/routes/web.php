<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessageController;
use App\Models\Message;

// View all

Route::get('/', function () {
    return view('contact');
});

Route::get('/admin/messages', [MessageController::class, 'index']);
Route::post('/admin/messages/{id}/read', [MessageController::class, 'markAsRead']);
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy']);






























// Admin route/layout
/*
Route::get('/admin/messages', function () {
    $messages = Message::latest()->get();
    return view('admin.messages', compact('messages'));
});
*/
