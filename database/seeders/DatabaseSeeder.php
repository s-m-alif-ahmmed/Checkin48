<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\Securities\Price;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Disable foreign key checks to prevent issues with deletions
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear existing data
        DB::table('users')->truncate(); // Clear users last
        DB::table('dynamic_pages')->truncate(); // Clear dynamic_pages last
        DB::table('cms')->truncate(); // Clear cms last
        DB::table('amenities')->truncate(); // Clear amenities last
        DB::table('system_settings')->truncate(); // Clear system_settings last

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Call seeders
        $this->call([
            UserSeeder::class,
            SystemSettingSeeder::class,
            CountryManagementSeeder::class,
            CmsSeeder::class,
            OurMissionSeeder::class,
            BenefitSeeder::class,
            BlogSeeder::class,
            PropertyLabelSeeder::class,
            AmenitiesSeeder::class,
            TaxSeeder::class,
            DynamicPageSeeder::class,
            PriceTypeSeeder::class,
            FooterButtonSeeder::class,
        ]);
    }
}
