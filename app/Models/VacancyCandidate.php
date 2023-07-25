<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyCandidate extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'candidate_id',
        'vacancy_id',
        'active',
    ];

}
