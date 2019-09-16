<?php

use App\Email;
use App\Target;
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

        foreach ($csv as $ind => $target) {
            if ($ind == 0)
                continue;
            $target = new Target([
                'first_name' => $target[0],
                'last_name' => $target[1],
                'email' => $target[2],
            ]);
            $target->save();
        }
        // dd($targets);
    }
}
