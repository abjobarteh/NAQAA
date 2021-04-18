<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Unit extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'directorate_id'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Unit';

    protected static $logOnlyDirty = true;

    // public function getDescriptionForEvent(string $eventName): string
    // {
    //     switch($eventName){
    //         case 'created': 
    //                  return "New Unit added by ".auth()->user()->username;
    //         case 'updated': 
    //                  return "Unit updated by ".auth()->user()->username;
    //         case 'deleted': 
    //                  return "Unit deleted by ".auth()->user()->username;
    //     };
        
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }
}
