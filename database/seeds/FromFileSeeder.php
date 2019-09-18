<?php

use App\Email;
use App\Spear;
use App\Target;
use App\TargetGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FromFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file('storage/import/real.csv'));

        foreach ($csv as $ind => $email) {
            if ($ind == 0)
                continue;

            $created = new Carbon();
            // dd($created);

            $email = new Email([
                'sender' => $email[0],
                'subject' => $email[1],
                'date' => $created,
                'fake' => false
            ]);

            $email->save();
        }

        $csv = array_map('str_getcsv', file('storage/import/yeet.csv'));

        foreach ($csv as $ind => $email) {
            if ($ind == 0)
                continue;

            $created = new Carbon();
            // dd($created);

            $email = new Email([
                'sender' => $email[0],
                'subject' => $email[1],
                'date' => $created,
                'fake' => true
            ]);

            $email->save();
        }

        $csv = array_map('str_getcsv', file('storage/import/targets.csv'));
        // dd($csv);
        $youthfed = TargetGroup::whereName('Youthfed')->first();
        $targets = [];
        foreach ($csv as $ind => $target) {
            if ($ind == 0)
                continue;
            $target = new Target([
                'first_name' => $target[0],
                'last_name' => $target[1],
                'email' => $target[2],
            ]);
            $targets[] = $target;
        }

        $youthfed->targets()->saveMany($targets);
        $youthfed->refresh();
        foreach ($youthfed->targets as $target) {
            $spear = new Spear([
                'hash' => Str::random(24)
            ]);

            $target->spears()->save($spear);

                $fake = Email::fake();
                $spear->emails()->attach(Email::randomReal($target->email));
                // $emails[] = ;

            for ($i=0; $i < rand(2,5); $i++) {
                $spear->emails()->attach($fake[rand(0, sizeof($fake) - 1)]);
                // $emails[] =
            }
        }
        // dd($targets);
    }
}
