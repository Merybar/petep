<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use DB;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $faker = Faker\Factory::create();
    $a=0;
    while ($a <= 20) {
        DB::table('owners')->insert([
            'name' => $faker->name(),
            'email' => $faker->email(),
            'phone' => $faker->numerify('###-###-####'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        $a++;
    }

    }
}
