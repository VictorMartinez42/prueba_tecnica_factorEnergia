<?php

namespace App\Services;

use App\Services\CurlService;

class StackExchangeService
{
    public static function getURL($component = null) {
        $url = env('STACKEXCHANGE_API_URL').$component.'?site=stackoverflow/';
        return $url;
    }

    public static function getQuestions() {
        $url = self::getURL('questions');
        $json = CurlService::getRequest($url);

        $data = json_decode($json, true);

        return $data;
    }
}
