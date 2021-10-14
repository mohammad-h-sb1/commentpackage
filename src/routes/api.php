<?php

use Illuminate\Support\Facades\Route;
use Saberycategory\Cms\App\Controller\CategoryController;
use Saberycategory\Cms\App\Controller\CommentController;
Route::middleware('auth:api')->group(function (){
    Route::prefix('category')->group(function (){
        Route::get('/list',[CategoryController::class,'index']);
        Route::post('/create',[CategoryController::class,'store']);
        Route::get('/show/{id}',[CategoryController::class,'show']);
        Route::get('/edit/{id}',[CategoryController::class,'edit']);
        Route::put('/update/{id}',[CategoryController::class,'update']);
    });

    Route::prefix('comment')->group(function (){
       Route::get('/list',[CommentController::class,'index']);
       Route::post('/create',[CommentController::class,'store']);
       Route::get('/show/{id}',[CommentController::class,'show']);
       Route::get('/edit/{id}',[CommentController::class,'edit']);
       Route::put('/update/{id}',[CommentController::class,'update']);
       Route::delete('/update/{id}',[CommentController::class,'delete']);
    });
});
