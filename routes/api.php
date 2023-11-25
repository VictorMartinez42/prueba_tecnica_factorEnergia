<?php

use App\Http\Controllers\Questions\QuestionsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'stackexchange'], function() {
    Route::get('/questions', [QuestionsController::class, 'getAllQuestions']);
});
