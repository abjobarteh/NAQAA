<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorisationProgrammeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'interim_authorisation_id',
        'title',
        'qualification_to_attain',
        'duration',
        'justification',
        'description',
        'objectives',
        'learning_outcome',
        'target_students',
        'entry_requirements',
    ];

    public function interimAuthorisation()
    {
        return $this->belongsTo(InterimAuthorisationDetail::class, 'interim_authorisation_id');
    }
}
