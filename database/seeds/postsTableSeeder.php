<?php

use Illuminate\Database\Seeder;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id'=>rand(0,255),
            'title' => str_random(10),
            'body' => str_random(200),
            'slug' => str_random(10),
        ]);
    }
}
