<?php

namespace Database\Seeders;

use App\Models\AwardBody;
use Illuminate\Database\Seeder;

class AwardingBodyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bodies = [
            [
                'name' => 'AAT_Associate of Accounting Technicians'
            ],
            [
                'name' => 'ABE_Associate of Business Executives'
            ],
            [
                'name' => 'ACCA_Associate of Chartered Certified Accountants'
            ],
            [
                'name' => 'CAT_Certified Accounting Technician'
            ],
            [
                'name' => 'CIE_Cambridge international Examination'
            ],
            [
                'name' => 'CIPS_Chartered institute of Purchasing and Supplies'
            ],
            [
                'name' => 'CNC_Centre Nottingham College'
            ],
            [
                'name' => 'ICM_Institute of Commercial Management'
            ],
            [
                'name' => 'IMIS_Institute for the Management of Information Systems'
            ],
            [
                'name' => 'IPFM_Institute of Prefessional Financial Managers '
            ],
            [
                'name' => 'LCM_London Centre for Marketing'
            ],
            [
                'name' => 'MOS_Microsoft Office Specialist'
            ],
            [
                'name' => 'OCR_Oxford Cambridge & Royal Soceity of Arts'
            ],
            [
                'name' => 'QNUK_Qualification Network UK'
            ],
            [
                'name' => 'Qualify_Qualifi Awarding Body'
            ],
            [
                'name' => 'SCM_Stratford College of Management'
            ],
            [
                'name' => 'Not applicable'
            ],
            [
                'name' => 'Others'
            ],
        ];

        AwardBody::insert($bodies);
    }
}
