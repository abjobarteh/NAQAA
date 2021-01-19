<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\DB;

trait UserRoleTrait {

    public function getRole($id)
    {
        return DB::table('roles')->select('role_name')->where('id',$id)->get();
    }
}