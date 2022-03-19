<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\articles;
use Illuminate\Support\Str;
class ArticlesFactory extends Factory
{

    protected $model = articles::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(1,3), true);
        return [
            'title'     => $title,
            'slug'      => Str::of($title)->slug('-'),
            'text'      => $this->faker->text(rand(500, 1100)),
            'anonce'    => $this->faker->text(100),
            'preview'   => "https://via.placeholder.com/250",
            'image'       => "https://via.placeholder.com/250",
        ];
    }
}
