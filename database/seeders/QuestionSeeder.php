<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::truncate();
        $csv = fopen(base_path("database/data/joops_question_master.csv"), "r");
        $firstLine = true;
        while(($data = fgetcsv($csv, 2000, ",")) != FALSE) {
            if(!$firstLine) {
                Question::create(
                    [
                        "content" => $data['0'],
                        "attribute_id" => $data['1'],
                        "dimension_id" => $data['2'],
                        "is_positive" => $data['3']
                    ]
                );
                
            }
            $firstLine = false;
        }
    }
}
