<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BankSignatory extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'Fullname',
        'position',
        'signature',
        'training_provider_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Bank Signatory Detail';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Bank Signatory Detail created by " . auth()->user()->username;
            case 'updated':
                return "Bank Signatory Detail updated by " . auth()->user()->username;
            case 'deleted':
                return "Bank Signatory Detail deleted by " . auth()->user()->username;
        };
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }
}
