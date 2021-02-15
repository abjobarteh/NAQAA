<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id' => '1',
                'name' => ' User Management Access',
                'slug' => 'user_management_access'
            ],
            [
                'id' => '2',
                'name' => 'Permission access',
                'slug' => 'permission_access'
            ],
            [
                'id' => '3',
                'name' => 'Permission create',
                'slug' => 'permission_create'
            ],
            [
                'id' => '4',
                'name' => 'Permission edit',
                'slug' => 'permission_edit'
            ],
            [
                'id' => '5',
                'name' => 'Permission show',
                'slug' => 'permission_show'
            ],
            [
                'id' => '6',
                'name' => 'Permission delete',
                'slug' => 'permission_delete'
            ],
            [
                'id' => '7',
                'name' => 'Role access',
                'slug' => 'role_access'
            ],
            [
                'id' => '8',
                'name' => 'Role create',
                'slug' => 'role_create'
            ],
            [
                'id' => '9',
                'name' => 'Role edit',
                'slug' => 'role_edit'
            ],
            [
                'id' => '10',
                'name' => 'Role show',
                'slug' => 'role_show'
            ],
            [
                'id' => '11',
                'name' => 'Role delete',
                'slug' => 'role_delete'
            ],
            [
                'id' => '12',
                'name' => 'Role access',
                'slug' => 'role_access'
            ],
            [
                'id' => '13',
                'name' => 'User create',
                'slug' => 'user_create'
            ],
            [
                'id' => '14',
                'name' => 'User edit',
                'slug' => 'user_edit'
            ],
            [
                'id' => '15',
                'name' => 'User show',
                'slug' => 'user_show'
            ],
            [
                'id' => '16',
                'name' => 'user delete',
                'slug' => 'user_delete'
            ],
            [
                'id' => '17',
                'name' => 'directorate access',
                'slug' => 'directorate_access'
            ],
            [
                'id' => '18',
                'name' => 'directorate create',
                'slug' => 'directorate_create'
            ],
            [
                'id' => '19',
                'name' => 'directorate edit',
                'slug' => 'directorate_edit'
            ],
            [
                'id' => '20',
                'name' => 'directorate show',
                'slug' => 'directorate_show'
            ],
            [
                'id' => '21',
                'name' => 'directorate delete',
                'slug' => 'directorate_delete'
            ],
            [
                'id' => '22',
                'name' => 'designation access',
                'slug' => 'designation_access'
            ],
            [
                'id' => '23',
                'name' => 'designation create',
                'slug' => 'designation_create'
            ],
            [
                'id' => '24',
                'name' => 'designation edit',
                'slug' => 'designation_edit'
            ],
            [
                'id' => '25',
                'name' => 'designation show',
                'slug' => 'designation_show'
            ],
            [
                'id' => '26',
                'name' => 'designation delete',
                'slug' => 'designation_delete'
            ],
            [
                'id' => '27',
                'name' => 'subdivision access',
                'slug' => 'subdivision_access'
            ],
            [
                'id' => '28',
                'name' => 'subdivision create',
                'slug' => 'subdivision_create'
            ],
            [
                'id' => '29',
                'name' => 'subdivision edit',
                'slug' => 'subdivision_edit'
            ],
            [
                'id' => '30',
                'name' => 'subdivision show',
                'slug' => 'subdivision_show'
            ],
            [
                'id' => '31',
                'name' => 'subdivision delete',
                'slug' => 'subdivision_delete'
            ],
            [
                'id' => '32',
                'name' => 'activity logs access',
                'slug' => 'activity_logs_access'
            ],
            [
                'id' => '33',
                'name' => 'settings access',
                'slug' => 'settings_access'
            ],
            [
                'id' => '34',
                'name' => 'settings update',
                'slug' => 'settings_update'
            ],
            [
                'id' => '35',
                'name' => 'institution access',
                'slug' => 'institution_access'
            ],
            [
                'id' => '36',
                'name' => 'institution create',
                'slug' => 'institution_create'
            ],
            [
                'id' => '37',
                'name' => 'institution edit',
                'slug' => 'institution_edit'
            ],
            [
                'id' => '38',
                'name' => 'institution show',
                'slug' => 'institution_show'
            ],
            [
                'id' => '39',
                'name' => 'trainer access',
                'slug' => 'trainer_access'
            ],
            [
                'id' => '40',
                'name' => 'trainer create',
                'slug' => 'trainer_create'
            ],
            [
                'id' => '41',
                'name' => 'trainer edit',
                'slug' => 'trainer_edit'
            ],
            [
                'id' => '42',
                'name' => 'trainer show',
                'slug' => 'trainer_show'
            ],
            [
                'id' => '43',
                'name' => 'assessor access',
                'slug' => 'assessor_access'
            ],
            [
                'id' => '44',
                'name' => 'assessor create',
                'slug' => 'assessor_create'
            ],
            [
                'id' => '45',
                'name' => 'assessor edit',
                'slug' => 'assessor_edit'
            ],
            [
                'id' => '46',
                'name' => 'assessor show',
                'slug' => 'assessor_show'
            ],
            [
                'id' => '47',
                'name' => 'institution programs access',
                'slug' => 'institution_program_access'
            ],
            [
                'id' => '48',
                'name' => 'institution programs create',
                'slug' => 'institution_program_create'
            ],
            [
                'id' => '49',
                'name' => 'institution programs edit',
                'slug' => 'institution_program_edit'
            ],
            [
                'id' => '50',
                'name' => 'institution programs show',
                'slug' => 'institution_program_show'
            ],
            [
                'id' => '51',
                'name' => 'institution categories access',
                'slug' => 'institution_categories_access'
            ],
            [
                'id' => '52',
                'name' => 'institution categories create',
                'slug' => 'institution_categories_create'
            ],
            [
                'id' => '53',
                'name' => 'institution categories edit',
                'slug' => 'institution_categories_edit'
            ],
            [
                'id' => '54',
                'name' => 'institution categories show',
                'slug' => 'institution_categories_show'
            ],
            [
                'id' => '55',
                'name' => 'institution application access',
                'slug' => 'institution_application_access'
            ],
            [
                'id' => '56',
                'name' => 'institution application create',
                'slug' => 'institution_application_create'
            ],
            [
                'id' => '57',
                'name' => 'institution application edit',
                'slug' => 'institution_application_edit'
            ],
            [
                'id' => '58',
                'name' => 'institution application show',
                'slug' => 'institution_application_show'
            ],
            [
                'id' => '59',
                'name' => 'trainer application access',
                'slug' => 'trainer_application_access'
            ],
            [
                'id' => '60',
                'name' => 'trainer application create',
                'slug' => 'trainer_application_create'
            ],
            [
                'id' => '61',
                'name' => 'trainer application edit',
                'slug' => 'trainer_application_edit'
            ],
            [
                'id' => '62',
                'name' => 'trainer application show',
                'slug' => 'trainer_application_show'
            ],
            [
                'id' => '63',
                'name' => 'Users access',
                'slug' => 'user_access'
            ],
        ];

        Permission::insert($permissions);
    }
}
