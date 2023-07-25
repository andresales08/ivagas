<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Candidate;
use App\Models\Vacancy;

class VacancyCandidateFactory extends Factory
{
    public function definition(): array
    {
        $this->faker->locale('pt_BR');

        return [
            'candidate_id' => Candidate::inRandomOrder()->first()->id,
            'vacancy_id' => Vacancy::inRandomOrder()->first()->id,
            'active' => $this->faker->boolean(98), 
        ];
    }
}
