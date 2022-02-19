<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;//seederクラスを引き継いでいる
use App\Models\Todolist;


class TodolistsTableSeeder extends Seeder//seederから継承してBlogsTableSeederを作る
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()//データベースに追加する処理をこの中に書く
    {
        \App\Models\Todolist::factory()->count(15)->create();
      //   　モデル名　　　　　　　     作成したい数

    }
}