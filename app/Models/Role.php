<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use HasFactory, LogsActivity, Notifiable;

    protected $fillable = [
        'name',
        'slug',
        'role_level',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Role';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Role added by " . auth()->user()->username;
            case 'updated':
                return "Role updated by " . auth()->user()->username;
            case 'deleted':
                return "Role deleted by " . auth()->user()->username;
        };
    }

    public function permissions()
    {

        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    public function users()
    {

        return $this->belongsToMany(User::class, 'users_roles');
    }
}
