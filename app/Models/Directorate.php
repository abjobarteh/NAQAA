<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Directorate extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        'name',
        'directorate_code',
    ];

    protected static $logFillable = true;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
