<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Education;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Job::factory()->count(3)->create();
        //Job::truncate();
        $csv = fopen(base_path("database/data/joops_job_master.csv"), "r");
        $firstLine = true;
        while(($data = fgetcsv($csv, 2000, ",")) != FALSE) {

            if(!$firstLine) {
                $education = Education::where('name', $data['3'])->first();
                Job::create(
                    [
                        "name" => $data['1'],
                        "total_attributes" => $data['2'],
                        "education_id" => $education->id,
                        "experience" => $data['4'],
                        "affiliation" => $data['5'],
                        "need_certification" => $data['6'] == '' ? 0 : $data['6'],                    ]
                );
            }
            $firstLine = false;
        }
    }
}
