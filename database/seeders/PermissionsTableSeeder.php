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
                'name' => 'Access Predefined Configurations',
                'slug' => 'access_general_configurations',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Create General Configurations',
                'slug' => 'create_general_configurations',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Edit General Configurations',
                'slug' => 'edit_general_configurations',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Show General Configurations',
                'slug' => 'show_general_configurations',
                'permission_type' => 'sysadmin'
            ],
            [
                'name' => 'Delete General Configurations',
                'slug' => 'delete_general_configurations',
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
                'name' => 'Access Job Vacancy',
                'slug' => 'access_job_vacancy',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Create Job Vacancy',
                'slug' => 'create_job_vacancy',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Edit Job Vacancy',
                'slug' => 'edit_job_vacancy',
                'permission_type' => 'researchdevelopment'
            ],
            [
                'name' => 'Show Job Vacancy',
                'slug' => 'show_job_vacancy',
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
                'name' => 'Create Unit Standards',
                'slug' => 'create_unit_standards',
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
            [
                'name' => 'Access Qualification',
                'slug' => 'access_qualifications',
                'permission_type' => 'standardscurriculum'
            ],
            [
                'name' => 'Create Qualification',
                'slug' => 'create_qualifications',
                'permission_type' => 'standardscurriculum'
            ],
            [
                'name' => 'Edit Qualification',
                'slug' => 'edit_qualifications',
                'permission_type' => 'standardscurriculum'
            ],
            [
                'name' => 'Show Qualification',
                'slug' => 'show_qualifications',
                'permission_type' => 'standardscurriculum'
            ],
        ];

        Permission::insert($permissions);
    }
}
