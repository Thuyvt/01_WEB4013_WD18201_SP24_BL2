<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <10 ; $i++) {
            DB::table('customers')->insert(
                [
                    'name' => Str::random(10),
                    'identify_id' => Str::random(9),
                    'gender' => random_int(1,2),
                    'date_of_birth' => now(),
                    'phone' => Str::random(9),
                    'address' => Str::random(20),
                    'status' => random_int(0,1),
                    'created_at' => now(),
                ]
            );
        }
    }
}
