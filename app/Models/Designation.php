<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Designation extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
