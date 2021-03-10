<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TownVillage extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'towns_villages';

    protected $fillable = [
        'name',
        'district_id',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;
}
