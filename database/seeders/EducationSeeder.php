<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = fopen(base_path("database/data/joops_education_master.csv"), "r");
        $firstLine = true;
        while(($data = fgetcsv($csv, 500, ",")) != FALSE) {
            if(!$firstLine) {
                Education::create(
                    [
                        "name" => $data['0'],
                        "certification_code" => isset($data['1']) ? $data['1'] : null
                    ]
                );
            }
            $firstLine = false;
        }
    }
}
