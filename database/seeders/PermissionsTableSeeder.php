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
                'name' => ' User Management Access',
                'slug' => 'user_management_access'
            ],
            [
                'name' => 'Permission access',
                'slug' => 'permission_access'
            ],
            [
                'name' => 'Permission create',
                'slug' => 'permission_create'
            ],
            [
                'name' => 'Permission edit',
                'slug' => 'permission_edit'
            ],
            [
                'name' => 'Permission show',
                'slug' => 'permission_show'
            ],
            [
                'name' => 'Permission delete',
                'slug' => 'permission_delete'
            ],
            [
                'name' => 'Role access',
                'slug' => 'role_access'
            ],
            [
                'name' => 'Role create',
                'slug' => 'role_create'
            ],
            [
                'name' => 'Role edit',
                'slug' => 'role_edit'
            ],
            [
                'name' => 'Role show',
                'slug' => 'role_show'
            ],
            [
                'name' => 'Role delete',
                'slug' => 'role_delete'
            ],
            [
                'name' => 'Users access',
                'slug' => 'user_access'
            ],
            [
                'name' => 'User create',
                'slug' => 'user_create'
            ],
            [
                'name' => 'User edit',
                'slug' => 'user_edit'
            ],
            [
                'name' => 'User show',
                'slug' => 'user_show'
            ],
            [
                'name' => 'user delete',
                'slug' => 'user_delete'
            ],
            [
                'name' => 'directorate access',
                'slug' => 'directorate_access'
            ],
            [
                'name' => 'directorate create',
                'slug' => 'directorate_create'
            ],
            [
                'name' => 'directorate edit',
                'slug' => 'directorate_edit'
            ],
            [
                'name' => 'directorate show',
                'slug' => 'directorate_show'
            ],
            [
                'name' => 'directorate delete',
                'slug' => 'directorate_delete'
            ],
            [
                'name' => 'unit access',
                'slug' => 'unit_access'
            ],
            [
                'name' => 'unit create',
                'slug' => 'unit_create'
            ],
            [
                'name' => 'unit edit',
                'slug' => 'unit_edit'
            ],
            [
                'name' => 'unit show',
                'slug' => 'unit_show'
            ],
            [
                'name' => 'unit delete',
                'slug' => 'unit_delete'
            ],
            [
                'name' => 'designation access',
                'slug' => 'designation_access'
            ],
            [
                'name' => 'designation create',
                'slug' => 'designation_create'
            ],
            [
                'name' => 'designation edit',
                'slug' => 'designation_edit'
            ],
            [
                'name' => 'designation show',
                'slug' => 'designation_show'
            ],
            [
                'name' => 'designation delete',
                'slug' => 'designation_delete'
            ],
            [
                'name' => 'subdivision access',
                'slug' => 'subdivision_access'
            ],
            [
                'name' => 'Region access',
                'slug' => 'region_access'
            ],
            [
                'name' => 'Region create',
                'slug' => 'region_create'
            ],
            [
                'name' => 'Region edit',
                'slug' => 'region_edit'
            ],
            [
                'name' => 'Region show',
                'slug' => 'region_show'
            ],
            [
                'name' => 'Region delete',
                'slug' => 'region_delete'
            ],
            [
                'name' => 'District access',
                'slug' => 'district_access'
            ],
            [
                'name' => 'District create',
                'slug' => 'district_create'
            ],
            [
                'name' => 'District edit',
                'slug' => 'district_edit'
            ],
            [
                'name' => 'District show',
                'slug' => 'district_show'
            ],
            [
                'name' => 'District delete',
                'slug' => 'district_delete'
            ],
            [
                'name' => 'towns_villages access',
                'slug' => 'towns_villages_access'
            ],
            [
                'name' => 'towns_villages create',
                'slug' => 'towns_villages_create'
            ],
            [
                'name' => 'towns_villages edit',
                'slug' => 'towns_villages_edit'
            ],
            [
                'name' => 'towns_villages show',
                'slug' => 'towns_villages_show'
            ],
            [
                'name' => 'towns_villages delete',
                'slug' => 'towns_villages_delete'
            ],
            [
                'name' => 'activity logs access',
                'slug' => 'activity_logs_access'
            ],
            [
                'name' => 'systemadmin reports access',
                'slug' => 'syste_reports_access'
            ],
            [
                'name' => 'Profile access',
                'slug' => 'profile_access'
            ],
            [
                'name' => 'Profile update',
                'slug' => 'Profile_update'
            ],
            [
                'name' => 'institution access',
                'slug' => 'institution_access'
            ],
            [
                'name' => 'institution create',
                'slug' => 'institution_create'
            ],
            [
                'name' => 'institution edit',
                'slug' => 'institution_edit'
            ],
            [
                'name' => 'institution show',
                'slug' => 'institution_show'
            ],
            [
                'name' => 'trainer access',
                'slug' => 'trainer_access'
            ],
            [
                'name' => 'trainer create',
                'slug' => 'trainer_create'
            ],
            [
                'name' => 'trainer edit',
                'slug' => 'trainer_edit'
            ],
            [
                'name' => 'trainer show',
                'slug' => 'trainer_show'
            ],
            [
                'name' => 'assessor access',
                'slug' => 'assessor_access'
            ],
            [
                'name' => 'assessor create',
                'slug' => 'assessor_create'
            ],
            [
                'name' => 'assessor edit',
                'slug' => 'assessor_edit'
            ],
            [
                'name' => 'assessor show',
                'slug' => 'assessor_show'
            ],
            [
                'name' => 'institution programs access',
                'slug' => 'institution_program_access'
            ],
            [
                'name' => 'institution programs create',
                'slug' => 'institution_program_create'
            ],
            [
                'name' => 'institution programs edit',
                'slug' => 'institution_program_edit'
            ],
            [
                'name' => 'institution programs show',
                'slug' => 'institution_program_show'
            ],
            [
                'name' => 'institution categories access',
                'slug' => 'institution_categories_access'
            ],
            [
                'name' => 'institution categories create',
                'slug' => 'institution_categories_create'
            ],
            [
                'name' => 'institution categories edit',
                'slug' => 'institution_categories_edit'
            ],
            [
                'name' => 'institution categories show',
                'slug' => 'institution_categories_show'
            ],
            [
                'name' => 'Institution type access',
                'slug' => 'institution_type_access'
            ],
            [
                'name' => 'Institution type create',
                'slug' => 'institution_type_create'
            ],
            [
                'name' => 'Institution type edit',
                'slug' => 'institution_type_edit'
            ],
            [
                'name' => 'Institution type show',
                'slug' => 'institution_type_show'
            ],
            [
                'name' => 'Institution type delete',
                'slug' => 'institution_type_delete'
            ],
            [
                'name' => 'standards management access',
                'slug' => 'standards_management_access'
            ],
            [
                'name' => 'standards access',
                'slug' => 'standards_access'
            ],
            [
                'name' => 'standards create',
                'slug' => 'standards_create'
            ],
            [
                'name' => 'standards edit',
                'slug' => 'standards_edit'
            ],
            [
                'name' => 'standards show',
                'slug' => 'standards_show'
            ],
            [
                'name' => 'standards delete',
                'slug' => 'standards_delete'
            ],
            [
                'name' => 'institution settings access',
                'slug' => 'institution_settings_access'
            ],
            [
                'name' => 'program level access',
                'slug' => 'program_level_access'
            ],
            [
                'name' => 'program level create',
                'slug' => 'program_level_create'
            ],
            [
                'name' => 'program level edit',
                'slug' => 'program_level_edit'
            ],
            [
                'name' => 'program level show',
                'slug' => 'program_level_show'
            ],
            [
                'name' => 'program level delete',
                'slug' => 'program_level_delete'
            ],
            [
                'name' => 'program category access',
                'slug' => 'program_category_access'
            ],
            [
                'name' => 'program category create',
                'slug' => 'program_category_create'
            ],
            [
                'name' => 'program category edit',
                'slug' => 'program_category_edit'
            ],
            [
                'name' => 'program category show',
                'slug' => 'program_category_show'
            ],
            [
                'name' => 'Compliance level access',
                'slug' => 'compliance_level_access'
            ],
            [
                'name' => 'Compliance level create',
                'slug' => 'compliance_level_create'
            ],
            [
                'name' => 'Compliance level edit',
                'slug' => 'compliance_level_edit'
            ],
            [
                'name' => 'Compliance level show',
                'slug' => 'compliance_level_show'
            ],
            [
                'name' => 'Compliance_level delete',
                'slug' => 'compliance_level_delete'
            ],
            [
                'name' => 'Backup access',
                'slug' => 'backup_access'
            ],
            [
                'name' => 'Backup settings access',
                'slug' => 'backup_settings_access'
            ],
            [
                'name' => 'Manual backup access',
                'slug' => 'manual_backup_access'
            ],
            [
                'name' => 'Registration access',
                'slug' => 'registration_access'
            ],
            [
                'name' => 'Apllication access',
                'slug' => 'application_access'
            ],
            [
                'name' => 'institution application access',
                'slug' => 'institution_application_access'
            ],
            [
                'name' => 'institution application create',
                'slug' => 'institution_application_create'
            ],
            [
                'name' => 'institution application edit',
                'slug' => 'institution_application_edit'
            ],
            [
                'name' => 'institution application show',
                'slug' => 'institution_application_show'
            ],
            [
                'name' => 'trainer application access',
                'slug' => 'trainer_application_access'
            ],
            [
                'name' => 'trainer application create',
                'slug' => 'trainer_application_create'
            ],
            [
                'name' => 'trainer application edit',
                'slug' => 'trainer_application_edit'
            ],
            [
                'name' => 'trainer application show',
                'slug' => 'trainer_application_show'
            ],
            [
                'name' => 'licence access',
                'slug' => 'licence_access'
            ],
            [
                'name' => 'licence create',
                'slug' => 'licence_create'
            ],
            [
                'name' => 'licence edit',
                'slug' => 'licence_edit'
            ],
            [
                'name' => 'licence show',
                'slug' => 'licence_show'
            ],
            [
                'name' => 'licence delete',
                'slug' => 'licence_delete'
            ],
            [
                'name' => 'Accreditation access',
                'slug' => 'accreditation_access'
            ],
            [
                'name' => 'Accreditation create',
                'slug' => 'accreditation_create'
            ],
            [
                'name' => 'Accreditation edit',
                'slug' => 'accreditation_edit'
            ],
            [
                'name' => 'Accreditation show',
                'slug' => 'accredtation_show'
            ],
            [
                'name' => 'Accreditation delete',
                'slug' => 'accreditation_delete'
            ],
            [
                'name' => 'Registration accreditation reports access',
                'slug' => 'registration_accreditation_reports_access'
            ],
            [
                'name' => 'Systemadmin reports access',
                'slug' => 'systemadmin_reports_access'
            ],
        ];

        Permission::insert($permissions);
    }
}
