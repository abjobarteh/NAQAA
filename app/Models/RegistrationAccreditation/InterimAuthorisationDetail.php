<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class InterimAuthorisationDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'training_provider_id',
        'application_id',
        'proposed_name',
        'street',
        'region_id',
        'district_id',
        'town_village_id',
        'mission',
        'vision',
        'organogramme',
        'objectives',
        'sources_of_funding_details',
        'physical_structure_plan',
        'five_year_strategic_plan',
    ];


    public function setSourcesOfFundingDetailsAttribute($value)
    {
        $this->attributes['sources_of_funding_details'] = json_encode($value);
    }

    public function getSourcesOfFundingDetailsAttribute($value)
    {
        return json_decode($value);
    }

    public function promoters()
    {
        return $this->hasMany(InstitutionPromoter::class, 'interim_authorisation_id');
    }

    public function programmes()
    {
        return $this->belongsTo(InterimAuthorisationDetail::class, 'interim_authorisation_id');
    }

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'application_id');
    }

    public function instituion()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }
}
