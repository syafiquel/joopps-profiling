<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dimension;

class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Dimension::factory()->count(5)->create();
        //Dimension::truncate();
        $csv = fopen(base_path("database/data/joops_dimension_master.csv"), "r");
        $firstLine = true;
        while(($data = fgetcsv($csv, 2000, ",")) != FALSE) {
            if(!$firstLine) {
                Dimension::create(
                    [
                        "name" => $data['0']
                        
                    ]
                );
                
            }
            $firstLine = false;
        }
    }
}
