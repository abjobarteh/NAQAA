<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
       'name',
       'slug',
       'permission_type',
       'created_at',
       'updated_at'
    ];
    
    protected static $logFillable = true;

    protected static $logName = 'Permission';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Permission added by ".auth()->user()->username;
            case 'updated': 
                     return "Permission updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Permission deleted by ".auth()->user()->username;
        };
        
    }
    
    public function roles() 
    {

        return $this->belongsToMany(Role::class,'roles_permissions');
            
     }
     
     public function users() 
     {
     
        return $this->belongsToMany(User::class,'users_permissions');
            
     }
}
