<?php

namespace App\Models;

use App\Models\ResearchDevelopment\JobVacancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class JobVacancyCategory extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'description'
    ];

    public function jobVacancies()
    {
        return $this->belongsTo(JobVacancy::class, 'jobvacancy_category_id');
    }
}
