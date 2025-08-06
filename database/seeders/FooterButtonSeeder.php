<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterButtonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('footer_buttons')->insert([
            [
                'id' => 1,
                'title' => null,
                'button_one' => null,
                'button_two' => null,
                'button_three' => null,
                'button_four' => null,
                'button_five' => null,
                'button_one_url' => null,
                'button_two_url' => null,
                'button_three_url' => null,
                'button_four_url' => null,
                'button_five_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ]
        ]);
    }
}
