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
    
    public function roles() 
    {

        return $this->belongsToMany(Role::class,'roles_permissions');
            
     }
     
     public function users() 
     {
     
        return $this->belongsToMany(User::class,'users_permissions');
            
     }
}
