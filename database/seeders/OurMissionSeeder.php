<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurMissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('our_missions')->insert([

            ['title' => null, 'sub_title' => null, 'media' => null, 'heading_one_title' => null, 'heading_one_description' => null, 'heading_two_title' => null, 'heading_two_description' => null, 'heading_three_title' => null, 'heading_three_description' => null, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],


        ]);

    }
}

