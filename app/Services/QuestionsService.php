<?php

namespace App\Services;

use App\Models\ApiResult;

class QuestionsService
{
    public static function checkIfExistsInDB($inputs) {
        $checkResult = ApiResult::where('tagged', $inputs['tagged']);

        if(isset($inputs['todate'])) {
            $checkResult->where('todate', $inputs['todate']);
        } else {
            $checkResult->where('todate', NULL);
        }

        if(isset($inputs['fromdate'])) {
            $checkResult->where('fromdate', $inputs['fromdate']);
        } else {
            $checkResult->where('fromdate', NULL);
        }

        return $checkResult->first();
    }

    public static function saveApiResults($inputs, $json) {
        $inputs['result'] = $json;
        ApiResult::create($inputs);
    }
}
