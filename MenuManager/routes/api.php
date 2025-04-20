<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::get('/api/pratos/{locale}', [DishController::class, 'index']);
