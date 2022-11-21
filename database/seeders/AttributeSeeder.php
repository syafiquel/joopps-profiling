<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Attribute::factory()->count(18)->create();
        //Attribute::truncate();
        $csv = fopen(base_path("database/data/joops_attribute_master.csv"), "r");
        $firstLine = true;
        while(($data = fgetcsv($csv, 2000, ",")) != FALSE) {
            if(!$firstLine) {
                Attribute::create(
                    [
                        "name" => $data['0'],
                        "is_displayed" =>$data['1']                   
                    ]
                );
            }
            $firstLine = false;
        }
    }
}
