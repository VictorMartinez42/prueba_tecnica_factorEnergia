<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StackExchangeService;

class QuestionsController extends Controller
{
    public function getAllQuestions(Request $request) {
        $data = StackExchangeService::getQuestions();
        return response()->json(['data' => $data['items']]);
    }
}
