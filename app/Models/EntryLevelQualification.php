<?php

namespace App\Models;

use App\Models\ResearchDevelopment\StudentDetailsDataCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EntryLevelQualification extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name','description'];

    protected static $logFillable = true;

    protected static $logName = 'Entry level Qualification';

    protected static $logOnlyDirty = true;

    // public function getDescriptionForEvent(string $eventName): string
    // {
    //     switch($eventName){
    //         case 'created': 
    //                  return "New Entry level Qualification added by ".auth()->user()->username;
    //         case 'updated': 
    //                  return "Entry level Qualification updated by ".auth()->user()->username;
    //         case 'deleted': 
    //                  return "Entry level Qualification deleted by ".auth()->user()->username;
    //     };
        
    // }

    public function studentsAwards()
    {
        return $this->hasMany(StudentDetailsDataCollection::class,'award');
    }

    public function studentsEntryQualifications()
    {
        return $this->hasMany(StudentDetailsDataCollection::class,'qualification_at_entry');
    }
}
