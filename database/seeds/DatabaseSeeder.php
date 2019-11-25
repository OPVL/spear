<?php

use App\TargetGroup;
use App\User;
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
            'name' => 'Gleeson Recruitment Ltd'
        ]);
        $group->save();

        // $this->call(UsersTableSeeder::class);
        $this->call(FromFileSeeder::class);
        // $this->call(TargetSeeder::class);

        $user = new User([
            'name' => 'Admin',
            'email' => 'team@evaporate.tech',
            'password' => bcrypt('bludgeon-mouse-crack')
        ]);

        $user->save();
    }
}
