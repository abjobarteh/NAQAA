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
            [
                'name' => 'Access DataCollection',
                'slug' => 'access_data_collection',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Create DataCollection',
                'slug' => 'create_data_collection',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Edit DataCollection',
                'slug' => 'edit_data_collection',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Show DataCollection',
                'slug' => 'show_data_collection',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Delete DataCollection',
                'slug' => 'delete_data_collection',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Access Research Survey Documentation',
                'slug' => 'access_research_survey_documentation',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Create Research Survey Documentation',
                'slug' => 'create_research_survey_documentation',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Edit Research Survey Documentation',
                'slug' => 'edit_research_survey_documentation',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Show Research Survey Documentation',
                'slug' => 'show_research_survey_documentation',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Access Research Development Reports',
                'slug' => 'access_research_development_reports',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Access Research Development Data Import',
                'slug' => 'access_research_development_data_import',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Access Unit Standards',
                'slug' => 'access_unit_standards',
                'permission_type' => 'standardscurriculum'
            ],
            [
                'name' => 'Edit Unit Standards',
                'slug' => 'edit_unit_standards',
                'permission_type' => 'standardscurriculum'
            ],
            [
                'name' => 'Show Unit Standards',
                'slug' => 'show_unit_standards',
                'permission_type' => 'standardscurriculum'
            ],
            [
                'name' => 'Access Unit Standard Reviews',
                'slug' => 'access_unit_standard_reviews',
                'permission_type' => 'standardscurriculum'
            ],
            [
                'name' => 'Create Unit Standard Reviews',
                'slug' => 'create_unit_standard_reviews',
                'permission_type' => 'standardscurriculum'
            ],
            [
                'name' => 'Show Unit Standard Reviews',
                'slug' => 'show_unit_standard_reviews',
                'permission_type' => 'standardscurriculum'
            ],
            [
                'name' => 'Access Unit Standard Reports',
                'slug' => 'access_unit_standard_reports',
                'permission_type' => 'standardscurriculum'
            ],
        ];

        Permission::insert($permissions);
    }
}
