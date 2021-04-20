<?php

namespace App\Models\ResearchDevelopment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class GraduateStudentDataCollection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'student_details_id',
        'completion_date'
    ];

    protected static $logFillable = true;

    protected static $logName = "Graduate Student detail";

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Graduate Student detail added by ".auth()->user()->username;
            case 'updated': 
                     return "Graduate Student detail updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Graduate Student detail deleted by ".auth()->user()->username;
        };
        
    }

    public function studentDetails()
    {
        return $this->belongsTo(StudentDetailsDataCollection::class,'student_details_id');
    }
}
