<?php

namespace App\Models;

use App\Models\RegistrationAccreditation\TrainingProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProviderCategory extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Training Provider category';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Training Provider category added by " . auth()->user()->username;
            case 'updated':
                return "Training Provider category updated by " . auth()->user()->username;
            case 'deleted':
                return "Training Provider category deleted by " . auth()->user()->username;
        };
    }

    public function trainingproviders()
    {
        return $this->hasMany(TrainingProvider::class, 'category_id');
    }
}
