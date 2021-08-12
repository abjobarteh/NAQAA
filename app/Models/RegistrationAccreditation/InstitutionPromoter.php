<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class InstitutionPromoter extends Model
{
    use HasFactory;

    protected $fillable = [
        'interim_authorisation_id',
        'firstname',
        'middlename',
        'lastname',
        'date_of_birth',
        'occupation',
        'address',
        'passport_copy',
    ];

    public function interimAuthorisation()
    {
        return $this->belongsTo(InterimAuthorisationDetail::class, 'interim_authorisation_id');
    }
}
