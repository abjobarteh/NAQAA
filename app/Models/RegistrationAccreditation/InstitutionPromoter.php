<?php

namespace App\Models\RegistrationAccreditation;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class InstitutionPromoter extends Model
{
    use HasFactory;

    protected $fillable = [
        'interim_authorisation_id',
        'fullname',
        'date_of_birth',
        'occupation',
        'address',
        'passport_copy',
    ];

    public function interimAuthorisation()
    {
        return $this->belongsTo(InterimAuthorisationDetail::class, 'interim_authorisation_id');
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = new Carbon($value);
    }
}
