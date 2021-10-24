<?php

namespace Database\Factories;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DeveloperFactory extends Factory
{
    protected $model = Developer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'sex' => 'M',
            'age' => $this->faker->randomNumber(2),
            'hobby' => Str::random(10),
            'birthDate' => '1990-10-20',
        ];
    }
}
