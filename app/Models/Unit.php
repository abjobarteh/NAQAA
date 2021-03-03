<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Unit extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'units';

    protected static $logFillable = true;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function directorates()
    {
        return $this->belongsTo(Directorate::class);
    }
}
