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
        factory(App\Target::class, 50)->create()->each(function (App\Target $target) {
            $target->spears()->save(factory(App\Spear::class)->make());
            // $target->posts()->save(factory(App\Post::class)->make());
        });
    }
}
