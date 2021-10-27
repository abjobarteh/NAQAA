<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            DesignationTableSeeder::class,
            DirectorateTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            EducationFieldsTableSeeder::class,
            CountriesTableSeeder::class,
            AwardingBodyTableSeeder::class,
            QualificationLevelsTableSeeder::class,
            RegionsTableSeeder::class,
            LocalGovermentAreaTableSeeder::class,
            DistrictsTableSeeder::class,
            UnitTableSeeder::class,
            TrainingProviderStaffRankTableSeeder::class,
            TrainingProviderStaffRolesTableSeeder::class,
            TrainingProviderClassificationTableSeeder::class,
            ApplicationStatusSeeder::class,
            TrainerTypesSeeder::class,
            ApplicationTypesTableSeeder::class,
            TrainingProviderChecklistSeeder::class,
            BankTableSeeder::class
        ]);
    }
}
