<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Unit extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'directorate_id'
    ];

    protected static $logFillable = true;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }
}
