<?php

use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Target::class, 50)->create()->each(function ($target) {
            // $target->posts()->save(factory(App\Post::class)->make());
        });
    }
}
