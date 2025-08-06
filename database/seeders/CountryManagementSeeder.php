<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Disable Foreign Key Constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear States, Cities, and Countries Data
        DB::table('states')->delete();
        DB::table('cities')->delete();
        DB::table('countries')->delete();

        // Re-enable Foreign Key Constraints
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert Data
        DB::table('countries')->insert([
            [
                'id'                    => 1,
                'name'                  => 'Palestine',
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ]
        ]);

        $cities = [
            'Jericho',
            'Jenin',
            'Nablus'
        ];

        $cityData = [];
        foreach ($cities as $index => $city) {
            $cityData[] = [
                'id'         => $index + 1,
                'country_id' => 1,
                'name'       => $city,
                'status'     => 'active',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ];
        }

        DB::table('cities')->insert($cityData);

        DB::table('states')->insert([
            [
                'id'                    => 1,
                'country_id'            => 1,
                'city_id'               => 1,
                'name'                  => 'Beit Shemesh',
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ]
        ]);
    }
}
