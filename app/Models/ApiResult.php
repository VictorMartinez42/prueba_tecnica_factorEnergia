<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiResult extends Model
{
    protected $table = 'api_results';

    protected $fillable = [
        'tagged',
        'todate',
        'fromdate',
        'result'
    ];

}
