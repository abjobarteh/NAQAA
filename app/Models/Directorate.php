<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Directorate extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        'name',
        'directorate_code',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Directorate';
    
    protected static $logOnlyDirty = true;

    // public function getDescriptionForEvent(string $eventName): string
    // {
    //     switch($eventName){
    //         case 'created': 
    //                  return "New Directorate added by ".auth()->user()->username;
    //         case 'updated': 
    //                  return "Directorate updated by ".auth()->user()->username;
    //         case 'deleted': 
    //                  return "Directorate deleted by ".auth()->user()->username;
    //     };
        
    // }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

}
