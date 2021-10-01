<?php

namespace App\Models;

use App\Models\ResearchDevelopment\JobVacancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PositionAdvertised extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name'
    ];

    public function jobvacancies()
    {
        return $this->hasMany(JobVacancy::class, 'position_advertised_id');
    }
}
