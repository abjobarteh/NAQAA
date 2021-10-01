<?php

namespace App\Models;

use App\Models\RegistrationAccreditation\TrainingProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalGovermentAreas extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region_id'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Localgoverment Area';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Localgoverment Area added by " . auth()->user()->username;
            case 'updated':
                return "Localgoverment Area updated by " . auth()->user()->username;
            case 'deleted':
                return "Localgoverment Area deleted by " . auth()->user()->username;
        };
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function trainingprovier()
    {
        return $this->hasMany(TrainingProvider::class, 'lga_id');
    }
}
