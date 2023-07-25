<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\VacancyStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(3)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Senha padrão 'password' (você pode alterar se desejar)
            'remember_token' => Str::random(10)
        ]);

        VacancyStatus::create([
            'name' => 'Aberta',
            'description' => 'Vaga está aberta para candidaturas.'
        ]);

        VacancyStatus::create([
            'name' => 'Encerrada',
            'description' => 'Vaga foi encerrada e não aceita mais candidaturas.'
        ]);

        VacancyStatus::create([
            'name' => 'Pausada',
            'description' => 'Vaga está temporariamente pausada e não aceita candidaturas no momento.'
        ]);

        \App\Models\Company::factory(27)->create();

        \App\Models\Candidate::factory()->count(235)->create();

        \App\Models\Vacancy::factory()->count(12)->create();

        \App\Models\VacancyCandidate::factory()->count(764)->create();
    }
}
