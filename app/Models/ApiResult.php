<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ApiResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'api_results';

    protected $fillable = [
        'tagged',
        'todate',
        'fromdate',
        'result'
    ];

}
