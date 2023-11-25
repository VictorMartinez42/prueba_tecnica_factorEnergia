<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StackExchangeService;
use App\Services\QuestionsService;
use Validator;

use function PHPUnit\Framework\isNull;

class QuestionsController extends Controller
{
    public function getAllQuestions(Request $request) {
        $inputs = $request->all();
        $validated = Validator::make($inputs, [
            'tagged' => 'required',
            'todate' => '',
            'fromdate' => '',
        ]);

        if ($validated->fails()) {
            $errors = $validated->errors();
            return response()->json(['errors'=> $errors->messages(), 'status' => 'failure']);
        }

        $checkExist = QuestionsService::checkIfExistsInDB($inputs);

        if(!isNull($checkExist) || $checkExist) {
            $data = json_decode($checkExist->result);
        } else {
            $data = StackExchangeService::getQuestions($inputs);
        }

        return response()->json(['data' => $data]);
    }
}
