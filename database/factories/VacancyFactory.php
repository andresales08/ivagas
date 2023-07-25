<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
use App\Models\VacancyStatus;
use App\Models\User;

class VacancyFactory extends Factory
{
    public function definition(): array
    {
        $this->faker->locale('pt_BR');

        return [

            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'company_id' => Company::inRandomOrder()->first()->id,
            'status_id' => VacancyStatus::inRandomOrder()->first()->id,
            'createdBy' => User::inRandomOrder()->first()->id, // Escolhe um usuário existente aleatoriamente
        ];
    }
}
