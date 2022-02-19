<?php

namespace Database\Factories;

use App\Models\Todolist;//使いたいモデル
use Illuminate\Database\Eloquent\Factories\Factory;

class TodolistFactory extends Factory//
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Todolist::class;//モデル名をパスから指定

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [//追加したいデータを中に記述
            'title' => $this->faker->word,//titleというカラムにword型のデータを入れる
            'content' => $this->faker->realText//contentにrealText型のデータを入れる
        ];
    }
}