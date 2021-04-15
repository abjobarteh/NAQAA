<?php

namespace App\Models\StandardsCurriculum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class UnitStandardReview extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'unit_standard_id',
        'review_date'
    ];

    protected static $logName = 'Unit Standard Rview';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Unit Standard Rview was added by ".auth()->user()->username;
            case 'updated': 
                     return "Unit Standard Rview was updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Unit Standard Rview was deleted by ".auth()->user()->username;
        };
        
    }
    
    public function unitStandard()
    {
        return $this->belongsTo(UnitStandard::class,'unit_standard_id');
    }

}
