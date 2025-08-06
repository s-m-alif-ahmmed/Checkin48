<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
        DB::table('system_settings')->insert([
            'id'             => 1,
            'title'          => json_encode([
             'ar' => 'ليونة',
             'en' => 'Softvence',
        ]),
            'email'          => null,
            'system_name'    => json_encode([
                'ar' => 'ليونة',
                'en' => 'Softvence',
            ]),
            'copyright_text' => json_encode([
                'ar' => '©البرمجيات',
                'en' => '©Softvence',
            ]),
            'logo'           => 'frontend/eVento_logo.png',
            'favicon'        => 'frontend/eVento_Favicon.png',
            'description'    => null,
            'created_at'     => Carbon::parse('2024-09-29 23:17:03'),
            'updated_at'     => Carbon::parse('2024-09-29 23:25:01'),
            'deleted_at'     => null,
        ]);
    }
}
