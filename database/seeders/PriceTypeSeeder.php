<?php

namespace Database\Seeders;

use App\Models\DynamicPage;
use App\Models\PriceType;
use Illuminate\Database\Seeder;

class PriceTypeSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priceTypes = [
            ['en' => 'The price for the night at the end of the week', 'ar' => 'سعر اليلة اخر الاسبوع'],
            ['en' => 'The price for the night in the middle of the week', 'ar' => 'سعر اليلة نصف الاسبوع'],
            ['en' => 'The price for half a day during the day', 'ar' => 'سعر نص يوم في النهار'],
            ['en' => 'The price for half a day in the evening', 'ar' => 'سعر نص يوم في المسا']
        ];

        foreach ($priceTypes as $key => $priceType) {
            if (!PriceType::where('id', $key + 1)->exists()) {
                PriceType::create([
                    'id'     => $key + 1,
                    'name'   => $priceType,
                    'status' => 'active',
                ]);
            }
        }
    }
}
