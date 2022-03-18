<?php

namespace Database\Factories;

use App\Models\articles;
use App\Models\views;
use Illuminate\Database\Eloquent\Factories\Factory;

class viewsFactory extends Factory
{
    protected $model = views::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'userIP'        => $this->faker->ipv4(),
            'article_id'    => articles::all()->random()->id,
        ];
    }
}
