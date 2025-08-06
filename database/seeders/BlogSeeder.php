<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $tags = [
            json_encode([
                 'ar' => 'فيلا ',
                    'en' => 'Villa',
            ]),

            json_encode([
                'ar' => 'السياحية',
                 'en' =>'Tourist',
                ]),
            json_encode([ 
                'ar' =>'كتاب',
                'en' =>'Book',
            ]),
            json_encode([ 
                'ar' =>'موقع إلكتروني',
                'en' =>'Website',
            ]),
            json_encode([ 
                 'ar' =>'تأجير فيلا',
                 'en' =>'Villa Rental',
                ]),
            json_encode([
                 'ar' =>'حجز الفيلا',
                 'en' =>'Villa Booking',
                ]),
            json_encode([
                 'ar' =>'تأجير عطلة',
                 'en' =>'Vacation Rental',
            ]),
            json_encode([
                 'ar' =>'تأجير عطلة',
                 'en' =>'Holiday Rental',
        ]),
            json_encode([
                'ar' =>'يسافر',
                'en' =>'Travel',
            ]),
            json_encode([
                'ar' =>'السياحة',
                'en' =>'Tourism',
            ]),
            json_encode([
                'ar' =>'إقامة', 
                'en' =>'Accommodation',
        ]),
            json_encode([
                'ar' =>'فيلا فاخرة', 
                'en' =>'Luxury Villa',
            ]),
            json_encode([
                 'ar' =>'فيلا الشاطئ',
                 'en' =>'Beach Villa',
            ]),
            json_encode([
                 'ar' =>'فيلا الجبل',
                 'en' =>'Mountain Villa',
            ]),
            json_encode([
                 'ar' =>'فيلا المدينة',
                 'en' =>'City Villa',
                ]),
            json_encode([
                'ar' =>'الفندق',
                'en' =>'Hotel',
                ]),
            json_encode([
                'ar' =>   'بيت العطلات',
                'en' =>   'Holiday Home',
             ]),
            json_encode([  
                'ar' =>  'كوخ',
                'en' =>   'Holiday Home',
            ]),
            json_encode([
            'ar' => ' شقة',
            'en' => ' Apartment',
        ]),
            json_encode([
            'ar' => 'شقة',
            'en' => ' Condo',
            
        ]),
            json_encode([
                 'ar' =>'منزل',
                 'en' =>'House',
                ]),
            json_encode([
                 'ar' =>'بنغل',
                 'en' =>'Bungalow',
                ]),
            json_encode([ 
                'ar' =>'شاليه',
                'en' =>'Chalet',
        ]),
            json_encode([
                'ar' =>'لودج',
                 'en' =>'Lodge']),
            ];
        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

