<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();

        $admin_permissions = $permissions->filter(function ($permission) {
            return substr($permission->slug, 0, 5) == 'user_' || substr($permission->slug, 0, 5) == 'role_' || substr($permission->slug, 0, 11) == 'permission_' ||
            substr($permission->slug, 0, 12) == 'directorate_' || substr($permission->slug, 0, 12) == 'designation_' || substr($permission->slug, 0, 12) == 'subdivision_'
            || substr($permission->slug, 0, 5) == 'unit_';
        });
    
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
    }
}
