<?php

use App\Http\Controllers\MemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MemoController::class, "index"]);

route::resource("memos", MemoController::class);
