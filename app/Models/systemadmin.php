<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class systemadmin extends Model
{
    use HasFactory;

    public function getAllUsers()
    {
        return DB::table('users')->get();
    }
}
