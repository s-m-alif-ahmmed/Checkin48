<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('benefits_of_joinings')->insert([

            ['title' => null, 'sub_title' => null, 'image' => null, 'title_two' => null, 'title_three' => null, 'title_four' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

        ]);

    }
}
