<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units';

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function directorates()
    {
        return $this->belongsTo(Directorate::class);
    }
}
