<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()
                            ->randomElement(
                                [
                                    'Authentic Leadership', 
                                    'Having Strong Judgement', 
                                    'Being Agile and Adaptable', 
                                    'Working under Pressure', 
                                    'Emotionally Connected as a Leader',
                                    'Being Ethical',
                                    'Results Oriented',
                                    'Being Purposefully Driven',
                                    'Having an Entrepreneurial Spirit',
                                    'Being an Active Listener',
                                    'Being a Creative Thinker',
                                    'Being a Problem Solver',
                                    'Being a Data Interpreter',
                                    'Being Digitally Literate',
                                    'Being a Team Player',
                                    'Being Human Centric',
                                    'Being an Impactful Communicator',
                                    'Life-long Learner'
                                ])
        ];
    }
}
