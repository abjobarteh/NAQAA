<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class District extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'region_id',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;
}
