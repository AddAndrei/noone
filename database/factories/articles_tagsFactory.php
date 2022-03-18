<?php

namespace Database\Factories;

use App\Models\articles;
use App\Models\articles_tags;
use App\Models\ArticleTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class articles_tagsFactory extends Factory
{
    protected $model = articles_tags::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => articles::all()->random()->id,//только в рамках тестового задания
            'tag_id'     => ArticleTag::all()->random()->id,
        ];
    }
}
