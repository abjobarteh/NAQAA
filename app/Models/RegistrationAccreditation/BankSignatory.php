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

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }
}
