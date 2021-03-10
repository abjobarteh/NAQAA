<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProgramCategory extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
    
    protected static $logFillable = true;
}
