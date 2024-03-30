<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <=5; $i++) {
            DB::table('roles')->insert([
                'name' => array_rand(['Supper Admin', 'Admin Content',
                    'Admin Product', 'Admin Bill', 'User'])
            ]);
        }
    }
}
