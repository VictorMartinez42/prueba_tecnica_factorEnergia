<?php

namespace App\Services;

use App\Models\ApiResult;

class QuestionsService
{
    public static function checkIfExistsInDB($inputs) {
        $toDate = (isset($inputs['todate']))? $inputs['todate']: null;
        $fromDate = (isset($inputs['fromdate']))? $inputs['fromdate']: null;

        $checkResult = ApiResult::where('tagged', $inputs['tagged'])
            ->where('todate', $toDate)
            ->where('fromdate', $fromDate)
            ->first();

        return $checkResult;
    }

    public static function saveApiResults($inputs, $json) {
        $inputs['result'] = $json;
        ApiResult::create($inputs);
    }
}
