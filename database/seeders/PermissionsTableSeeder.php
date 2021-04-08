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
        // $permissions = [
        //     [
        //         'name' => ' User Management Access',
        //         'slug' => 'user_management_access'
        //     ],
        //     [
        //         'name' => 'Permission access',
        //         'slug' => 'permission_access'
        //     ],
        //     [
        //         'name' => 'Permission create',
        //         'slug' => 'permission_create'
        //     ],
        //     [
        //         'name' => 'Permission edit',
        //         'slug' => 'permission_edit'
        //     ],
        //     [
        //         'name' => 'Permission show',
        //         'slug' => 'permission_show'
        //     ],
        //     [
        //         'name' => 'Permission delete',
        //         'slug' => 'permission_delete'
        //     ],
        //     [
        //         'name' => 'Role access',
        //         'slug' => 'role_access'
        //     ],
        //     [
        //         'name' => 'Role create',
        //         'slug' => 'role_create'
        //     ],
        //     [
        //         'name' => 'Role edit',
        //         'slug' => 'role_edit'
        //     ],
        //     [
        //         'name' => 'Role show',
        //         'slug' => 'role_show'
        //     ],
        //     [
        //         'name' => 'Role delete',
        //         'slug' => 'role_delete'
        //     ],
        //     [
        //         'name' => 'Users access',
        //         'slug' => 'user_access'
        //     ],
        //     [
        //         'name' => 'User create',
        //         'slug' => 'user_create'
        //     ],
        //     [
        //         'name' => 'User edit',
        //         'slug' => 'user_edit'
        //     ],
        //     [
        //         'name' => 'User show',
        //         'slug' => 'user_show'
        //     ],
        //     [
        //         'name' => 'user delete',
        //         'slug' => 'user_delete'
        //     ],
        //     [
        //         'name' => 'directorate access',
        //         'slug' => 'directorate_access'
        //     ],
        //     [
        //         'name' => 'directorate create',
        //         'slug' => 'directorate_create'
        //     ],
        //     [
        //         'name' => 'directorate edit',
        //         'slug' => 'directorate_edit'
        //     ],
        //     [
        //         'name' => 'directorate show',
        //         'slug' => 'directorate_show'
        //     ],
        //     [
        //         'name' => 'directorate delete',
        //         'slug' => 'directorate_delete'
        //     ],
        //     [
        //         'name' => 'unit access',
        //         'slug' => 'unit_access'
        //     ],
        //     [
        //         'name' => 'unit create',
        //         'slug' => 'unit_create'
        //     ],
        //     [
        //         'name' => 'unit edit',
        //         'slug' => 'unit_edit'
        //     ],
        //     [
        //         'name' => 'unit show',
        //         'slug' => 'unit_show'
        //     ],
        //     [
        //         'name' => 'unit delete',
        //         'slug' => 'unit_delete'
        //     ],
        //     [
        //         'name' => 'designation access',
        //         'slug' => 'designation_access'
        //     ],
        //     [
        //         'name' => 'designation create',
        //         'slug' => 'designation_create'
        //     ],
        //     [
        //         'name' => 'designation edit',
        //         'slug' => 'designation_edit'
        //     ],
        //     [
        //         'name' => 'designation show',
        //         'slug' => 'designation_show'
        //     ],
        //     [
        //         'name' => 'designation delete',
        //         'slug' => 'designation_delete'
        //     ],
        //     [
        //         'name' => 'subdivision access',
        //         'slug' => 'subdivision_access'
        //     ],
        //     [
        //         'name' => 'Region access',
        //         'slug' => 'region_access'
        //     ],
        //     [
        //         'name' => 'Region create',
        //         'slug' => 'region_create'
        //     ],
        //     [
        //         'name' => 'Region edit',
        //         'slug' => 'region_edit'
        //     ],
        //     [
        //         'name' => 'Region show',
        //         'slug' => 'region_show'
        //     ],
        //     [
        //         'name' => 'Region delete',
        //         'slug' => 'region_delete'
        //     ],
        //     [
        //         'name' => 'District access',
        //         'slug' => 'district_access'
        //     ],
        //     [
        //         'name' => 'District create',
        //         'slug' => 'district_create'
        //     ],
        //     [
        //         'name' => 'District edit',
        //         'slug' => 'district_edit'
        //     ],
        //     [
        //         'name' => 'District show',
        //         'slug' => 'district_show'
        //     ],
        //     [
        //         'name' => 'District delete',
        //         'slug' => 'district_delete'
        //     ],
        //     [
        //         'name' => 'towns_villages access',
        //         'slug' => 'towns_villages_access'
        //     ],
        //     [
        //         'name' => 'towns_villages create',
        //         'slug' => 'towns_villages_create'
        //     ],
        //     [
        //         'name' => 'towns_villages edit',
        //         'slug' => 'towns_villages_edit'
        //     ],
        //     [
        //         'name' => 'towns_villages show',
        //         'slug' => 'towns_villages_show'
        //     ],
        //     [
        //         'name' => 'towns_villages delete',
        //         'slug' => 'towns_villages_delete'
        //     ],
        //     [
        //         'name' => 'activity logs access',
        //         'slug' => 'activity_logs_access'
        //     ],
        //     [
        //         'name' => 'systemadmin reports access',
        //         'slug' => 'syste_reports_access'
        //     ],
        //     [
        //         'name' => 'Profile access',
        //         'slug' => 'profile_access'
        //     ],
        //     [
        //         'name' => 'Profile update',
        //         'slug' => 'Profile_update'
        //     ],
        //     [
        //         'name' => 'institution access',
        //         'slug' => 'institution_access'
        //     ],
        //     [
        //         'name' => 'institution create',
        //         'slug' => 'institution_create'
        //     ],
        //     [
        //         'name' => 'institution edit',
        //         'slug' => 'institution_edit'
        //     ],
        //     [
        //         'name' => 'institution show',
        //         'slug' => 'institution_show'
        //     ],
        //     [
        //         'name' => 'trainer access',
        //         'slug' => 'trainer_access'
        //     ],
        //     [
        //         'name' => 'trainer create',
        //         'slug' => 'trainer_create'
        //     ],
        //     [
        //         'name' => 'trainer edit',
        //         'slug' => 'trainer_edit'
        //     ],
        //     [
        //         'name' => 'trainer show',
        //         'slug' => 'trainer_show'
        //     ],
        //     [
        //         'name' => 'assessor access',
        //         'slug' => 'assessor_access'
        //     ],
        //     [
        //         'name' => 'assessor create',
        //         'slug' => 'assessor_create'
        //     ],
        //     [
        //         'name' => 'assessor edit',
        //         'slug' => 'assessor_edit'
        //     ],
        //     [
        //         'name' => 'assessor show',
        //         'slug' => 'assessor_show'
        //     ],
        //     [
        //         'name' => 'institution programs access',
        //         'slug' => 'institution_program_access'
        //     ],
        //     [
        //         'name' => 'institution programs create',
        //         'slug' => 'institution_program_create'
        //     ],
        //     [
        //         'name' => 'institution programs edit',
        //         'slug' => 'institution_program_edit'
        //     ],
        //     [
        //         'name' => 'institution programs show',
        //         'slug' => 'institution_program_show'
        //     ],
        //     [
        //         'name' => 'institution categories access',
        //         'slug' => 'institution_categories_access'
        //     ],
        //     [
        //         'name' => 'institution categories create',
        //         'slug' => 'institution_categories_create'
        //     ],
        //     [
        //         'name' => 'institution categories edit',
        //         'slug' => 'institution_categories_edit'
        //     ],
        //     [
        //         'name' => 'institution categories show',
        //         'slug' => 'institution_categories_show'
        //     ],
        //     [
        //         'name' => 'Institution type access',
        //         'slug' => 'institution_type_access'
        //     ],
        //     [
        //         'name' => 'Institution type create',
        //         'slug' => 'institution_type_create'
        //     ],
        //     [
        //         'name' => 'Institution type edit',
        //         'slug' => 'institution_type_edit'
        //     ],
        //     [
        //         'name' => 'Institution type show',
        //         'slug' => 'institution_type_show'
        //     ],
        //     [
        //         'name' => 'Institution type delete',
        //         'slug' => 'institution_type_delete'
        //     ],
        //     [
        //         'name' => 'standards management access',
        //         'slug' => 'standards_management_access'
        //     ],
        //     [
        //         'name' => 'standards access',
        //         'slug' => 'standards_access'
        //     ],
        //     [
        //         'name' => 'standards create',
        //         'slug' => 'standards_create'
        //     ],
        //     [
        //         'name' => 'standards edit',
        //         'slug' => 'standards_edit'
        //     ],
        //     [
        //         'name' => 'standards show',
        //         'slug' => 'standards_show'
        //     ],
        //     [
        //         'name' => 'standards delete',
        //         'slug' => 'standards_delete'
        //     ],
        //     [
        //         'name' => 'institution settings access',
        //         'slug' => 'institution_settings_access'
        //     ],
        //     [
        //         'name' => 'program level access',
        //         'slug' => 'program_level_access'
        //     ],
        //     [
        //         'name' => 'program level create',
        //         'slug' => 'program_level_create'
        //     ],
        //     [
        //         'name' => 'program level edit',
        //         'slug' => 'program_level_edit'
        //     ],
        //     [
        //         'name' => 'program level show',
        //         'slug' => 'program_level_show'
        //     ],
        //     [
        //         'name' => 'program level delete',
        //         'slug' => 'program_level_delete'
        //     ],
        //     [
        //         'name' => 'program category access',
        //         'slug' => 'program_category_access'
        //     ],
        //     [
        //         'name' => 'program category create',
        //         'slug' => 'program_category_create'
        //     ],
        //     [
        //         'name' => 'program category edit',
        //         'slug' => 'program_category_edit'
        //     ],
        //     [
        //         'name' => 'program category show',
        //         'slug' => 'program_category_show'
        //     ],
        //     [
        //         'name' => 'Compliance level access',
        //         'slug' => 'compliance_level_access'
        //     ],
        //     [
        //         'name' => 'Compliance level create',
        //         'slug' => 'compliance_level_create'
        //     ],
        //     [
        //         'name' => 'Compliance level edit',
        //         'slug' => 'compliance_level_edit'
        //     ],
        //     [
        //         'name' => 'Compliance level show',
        //         'slug' => 'compliance_level_show'
        //     ],
        //     [
        //         'name' => 'Compliance_level delete',
        //         'slug' => 'compliance_level_delete'
        //     ],
        //     [
        //         'name' => 'Backup access',
        //         'slug' => 'backup_access'
        //     ],
        //     [
        //         'name' => 'Backup settings access',
        //         'slug' => 'backup_settings_access'
        //     ],
        //     [
        //         'name' => 'Manual backup access',
        //         'slug' => 'manual_backup_access'
        //     ],
        //     [
        //         'name' => 'Registration access',
        //         'slug' => 'registration_access'
        //     ],
        //     [
        //         'name' => 'Apllication access',
        //         'slug' => 'application_access'
        //     ],
        //     [
        //         'name' => 'institution application access',
        //         'slug' => 'institution_application_access'
        //     ],
        //     [
        //         'name' => 'institution application create',
        //         'slug' => 'institution_application_create'
        //     ],
        //     [
        //         'name' => 'institution application edit',
        //         'slug' => 'institution_application_edit'
        //     ],
        //     [
        //         'name' => 'institution application show',
        //         'slug' => 'institution_application_show'
        //     ],
        //     [
        //         'name' => 'trainer application access',
        //         'slug' => 'trainer_application_access'
        //     ],
        //     [
        //         'name' => 'trainer application create',
        //         'slug' => 'trainer_application_create'
        //     ],
        //     [
        //         'name' => 'trainer application edit',
        //         'slug' => 'trainer_application_edit'
        //     ],
        //     [
        //         'name' => 'trainer application show',
        //         'slug' => 'trainer_application_show'
        //     ],
        //     [
        //         'name' => 'licence access',
        //         'slug' => 'licence_access'
        //     ],
        //     [
        //         'name' => 'licence create',
        //         'slug' => 'licence_create'
        //     ],
        //     [
        //         'name' => 'licence edit',
        //         'slug' => 'licence_edit'
        //     ],
        //     [
        //         'name' => 'licence show',
        //         'slug' => 'licence_show'
        //     ],
        //     [
        //         'name' => 'licence delete',
        //         'slug' => 'licence_delete'
        //     ],
        //     [
        //         'name' => 'Accreditation access',
        //         'slug' => 'accreditation_access'
        //     ],
        //     [
        //         'name' => 'Accreditation create',
        //         'slug' => 'accreditation_create'
        //     ],
        //     [
        //         'name' => 'Accreditation edit',
        //         'slug' => 'accreditation_edit'
        //     ],
        //     [
        //         'name' => 'Accreditation show',
        //         'slug' => 'accredtation_show'
        //     ],
        //     [
        //         'name' => 'Accreditation delete',
        //         'slug' => 'accreditation_delete'
        //     ],
        //     [
        //         'name' => 'Registration accreditation reports access',
        //         'slug' => 'registration_accreditation_reports_access'
        //     ],
        //     [
        //         'name' => 'Systemadmin reports access',
        //         'slug' => 'systemadmin_reports_access'
        //     ],
        // ];

        $permissions = [
            [
                'name' => 'Access User management',
                'slug' => 'access_user_management',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Permission',
                'slug' => 'access_permission',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Permission',
                'slug' => 'create_permission',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Permission',
                'slug' => 'edit_permission',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Permission',
                'slug' => 'show_permission',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Permission',
                'slug' => 'delete_permission',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Role',
                'slug' => 'access_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Role',
                'slug' => 'create_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Role',
                'slug' => 'edit_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Role',
                'slug' => 'show_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Role',
                'slug' => 'delete_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Users',
                'slug' => 'access_users',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create User',
                'slug' => 'create_user',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit User',
                'slug' => 'edit_user',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show User',
                'slug' => 'show_user',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete User',
                'slug' => 'delete_user',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Directorate',
                'slug' => 'access_directorate',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Directorate',
                'slug' => 'create_directorate',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Directorate',
                'slug' => 'edit_directorate',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Directorate',
                'slug' => 'show_directorate',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Directorate',
                'slug' => 'delete_directorate',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Unit',
                'slug' => 'access_unit',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Unit',
                'slug' => 'create_unit',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Unit',
                'slug' => 'edit_unit',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Unit',
                'slug' => 'show_unit',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Unit',
                'slug' => 'delete_unit',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Designation',
                'slug' => 'access_designation',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Designation',
                'slug' => 'create_designation',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Designation',
                'slug' => 'edit_designation',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Designation',
                'slug' => 'show_designation',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Designation',
                'slug' => 'delete_designation',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Subdivision',
                'slug' => 'access_subdivision',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Region',
                'slug' => 'access_region',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Region',
                'slug' => 'create_region',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Region',
                'slug' => 'edit_region',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Region',
                'slug' => 'show_region',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Region',
                'slug' => 'delete_region',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access District',
                'slug' => 'access_district',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create District',
                'slug' => 'create_district',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit District',
                'slug' => 'edit_district',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show District',
                'slug' => 'show_district',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete District',
                'slug' => 'delete_district',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Towns_Villages',
                'slug' => 'access_towns_villages',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Towns_Villages',
                'slug' => 'create_towns_villages',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Towns_Villages',
                'slug' => 'edit_towns_villages',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Towns_Villages',
                'slug' => 'show_towns_villages',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Towns_Villages',
                'slug' => 'delete_towns_villages',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Local Goverment Areas',
                'slug' => 'access_local_goverment_areas',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Local Goverment Areas',
                'slug' => 'create_local_goverment_areas',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Local Goverment Areas',
                'slug' => 'edit_local_goverment_areas',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Local Goverment Areas',
                'slug' => 'show_local_goverment_areas',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Local Goverment Areas',
                'slug' => 'delete_local_goverment_areas',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Activity Logs',
                'slug' => 'access_activity_logs',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Sysadmin Reports',
                'slug' => 'access_sysadmin_reports',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Field of Education',
                'slug' => 'access_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Field of Education',
                'slug' => 'create_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Field of Education',
                'slug' => 'edit_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Field of Education',
                'slug' => 'show_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Field of Education',
                'slug' => 'delete_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Sub Field of Education',
                'slug' => 'access_sub_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Sub Field of Education',
                'slug' => 'create_sub_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Sub Field of Education',
                'slug' => 'edit_sub_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Sub Field of Education',
                'slug' => 'show_sub_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Sub Field of Education',
                'slug' => 'delete_sub_field_of_education',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Training Provider Classification',
                'slug' => 'access_training_provider_classification',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Training Provider classification',
                'slug' => 'create_training_provider_classification',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Training Provider Classification',
                'slug' => 'edit_training_provider_classification',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Training Provider Classification',
                'slug' => 'show_training_provider_classification',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Training Provider Classification',
                'slug' => 'delete_training_provider_classification',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Training Provider Ownership',
                'slug' => 'access_training_provider_ownership',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Training Provider Ownership',
                'slug' => 'create_training_provider_ownership',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Training Provider Ownership',
                'slug' => 'edit_training_provider_ownership',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Training Provider Ownership',
                'slug' => 'show_training_provider_ownership',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Training Provider Ownership',
                'slug' => 'delete_training_provider_ownership',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Entry Level Qualifications',
                'slug' => 'access_entry_level_qualifications',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Entry Level Qualifications',
                'slug' => 'create_entry_level_qualifications',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Entry Level Qualifications',
                'slug' => 'edit_entry_level_qualifications',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Entry Level Qualifications',
                'slug' => 'show_entry_level_qualifications',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Entry Level Qualifications',
                'slug' => 'delete_entry_level_qualifications',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access General Configurations',
                'slug' => 'access_general_configurations',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Academic Rank Level',
                'slug' => 'access_academic_rank_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Academic Rank Level',
                'slug' => 'create_academic_rank_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Academic Rank Level',
                'slug' => 'edit_academic_rank_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Academic Rank Level',
                'slug' => 'show_academic_rank_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Academic Rank Level',
                'slug' => 'delete_academic_rank_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Academic Role Level',
                'slug' => 'access_academic_role_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Academic Role Level',
                'slug' => 'create_academic_Role_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Academic Role Level',
                'slug' => 'edit_academic_role_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Academic Role Level',
                'slug' => 'show_academic_role_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Academic Role Level',
                'slug' => 'delete_academic_role_level',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Backup',
                'slug' => 'access_backup',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Backup Settings',
                'slug' => 'access_backup_settings',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Manual Backup',
                'slug' => 'access_manual_backup',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Academic and Admin Staff Ranks',
                'slug' => 'access_academic_admin_staff_ranks',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Academic and Admin Staff Rank',
                'slug' => 'create_academic_admin_staff_rank',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Academic and Admin Staff Rank',
                'slug' => 'edit_academic_admin_staff_rank',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Academic and Admin Staff Rank',
                'slug' => 'show_academic_admin_staff_rank',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Academic and Admin Staff Rank',
                'slug' => 'delete_academic_admin_staff_rank',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Academic and Admin Staff Role',
                'slug' => 'access_academic_admin_staff_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Academic and Admin Staff Role',
                'slug' => 'create_academic_admin_staff_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Academic and Admin Staff Role',
                'slug' => 'edit_academic_admin_staff_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Academic and Admin Staff Role',
                'slug' => 'show_academic_admin_staff_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Academic and Admin Staff Role',
                'slug' => 'delete_academic_admin_staff_role',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Access Application Fees',
                'slug' => 'access_application_fees',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create Application Fees',
                'slug' => 'create_application_fees',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit Application Fees',
                'slug' => 'edit_application_fees',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show Application Fees',
                'slug' => 'show_application_fees',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete Application Fees',
                'slug' => 'delete_application_fees',
                'permission_type' => 'sysadmin'
            ],
            
        ];

        Permission::insert($permissions);
    }
}
