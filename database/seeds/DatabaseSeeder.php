<?php

use App\TargetGroup;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $group = new TargetGroup([
            'name' => 'Youthfed'
        ]);
        $group->save();

        // $this->call(UsersTableSeeder::class);
        $this->call(FromFileSeeder::class);
        // $this->call(TargetSeeder::class);
    }
}
