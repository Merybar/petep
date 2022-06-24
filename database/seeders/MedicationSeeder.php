<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use DB;

class MedicationSeeder extends Seeder
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
    while ($a <= 40) {
        DB::table('medications')->insert([
            'name' => $faker->name(),
            'price' => $faker->numberBetween(10,40),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        $a++;
    }

    }
}
