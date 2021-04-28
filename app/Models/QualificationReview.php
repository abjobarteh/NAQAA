<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class QualificationReview extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'qualification_level_id',
        'review_date'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Qualification review';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Qualification review added by ".auth()->user()->username;
            case 'updated': 
                     return "Qualification review updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Qualification review deleted by ".auth()->user()->username;
        };
        
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class,'qualification_id');
    }
}
