<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
       'name',
       'slug',
       'created_at',
       'updated_at'
    ];

    protected static $logFillable = true;
    
    public function permissions() 
    {

        return $this->belongsToMany(Permission::class,'roles_permissions');
            
     }

     public function users() 
     {

        return $this->belongsToMany(User::class,'users_roles');
            
     }
}
