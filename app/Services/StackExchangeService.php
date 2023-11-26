<?php

namespace App\Services;

use App\Services\CurlService;
use App\Services\QuestionsService;

class StackExchangeService
{
    private static function getURL() {
        $url = env('STACKEXCHANGE_API_URL').'questions?site=stackoverflow';
        return $url;
    }

    public static function getQuestions($inputs) {
        $url = self::getURLWithFilters($inputs);
        $json = CurlService::getRequest($url);

        QuestionsService::saveApiResults($inputs, $json);

        $data = json_decode($json, true);

        return $data;
    }

    private static function getURLWithFilters($inputs) {
        $url = self::getURL().'&tagged='.$inputs['tagged'];

        if(isset($inputs['todate'])) {
            $url = $url.'&todate='.$inputs['todate'];
        }
        if(isset($inputs['fromdate'])) {
            $url = $url.'&fromdate='.$inputs['fromdate'];
        }

        return $url;
    }
}
