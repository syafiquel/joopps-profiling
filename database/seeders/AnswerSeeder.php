<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = fopen(base_path("database/data/joops_answer_master.csv"), "r");
        $firstLine = true;
        while(($data = fgetcsv($csv, 3000, ",")) != FALSE) {
            if(!$firstLine) {
                Answer::create(
                    [
                        "job_id" => $data['0'],
                        "attribute_id" => $data['1'],
                        "expected_answer" => $data['2']                    
                    ]
                );
            }
            $firstLine = false;
        }
    }
}
