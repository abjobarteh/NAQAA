<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ComplianceLevel extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'percentage_start',
        'percentage_end',
        'created_at',
        'updated_at'
    ];
}
