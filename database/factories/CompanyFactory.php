<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CompanyFactory extends Factory
{
    public function definition()
    {
        $this->faker->locale('pt_BR');

        return [
            'name' => $this->faker->company,
            'cnpj' => $this->faker->unique()->numerify('##############'),
            'createdBy' => User::inRandomOrder()->first()->id, // Escolhe um usuário existente aleatoriamente
        ];
    }
}
