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
        //\App\Models\User::factory(10)->create();
	$this->call(EducationSeeder::class);
        $this->call(JobSeeder::class);
         $this->call(DimensionSeeder::class);
        $this->call(AttributeSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);

    }
}
