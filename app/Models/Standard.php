<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Standard extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'title',
        'description',
        'maximum_score',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;
}
