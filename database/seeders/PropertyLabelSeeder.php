<?php

namespace Database\Seeders;

use App\Models\PropertyLabel;
use Illuminate\Database\Seeder;

class PropertyLabelSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $labels = [
            ['en'=>'Luxury', 'ar'=>'فاخرة'],
            ['en'=>'Sea View', 'ar'=>'إطلالة على البحر'],
            ['en'=>'Mountain View', 'ar'=>'إطلالة على الجبل'],
            ['en'=>'Private Pool', 'ar'=>'مسبح خاص'],
            ['en'=>'Pet-Friendly', 'ar'=>'صديق للحيوانات الأليفة'],
            ['en'=>'Family-Friendly', 'ar'=>'مناسب للعائلات'],
            ['en'=>'Romantic', 'ar'=>'رومانسي'],
            ['en'=>'Eco-Friendly', 'ar'=>'صديق للبيئة'],
            ['en'=>'Boutique', 'ar'=>'بوتيك'],
            ['en'=>'Modern Design', 'ar'=>'تصميم حديث'],
            ['en'=>'Historic Area', 'ar'=>'منطقة تاريخية'],
            ['en'=>'City Center', 'ar'=>'مركز المدينة'],
            ['en'=>'Gym Access', 'ar'=>'إمكانية الوصول إلى الصالة الرياضية'],
            ['en'=>'Business-Friendly', 'ar'=>'مناسب للأعمال'],
            ['en'=>'Vacation Rental', 'ar'=>'إيجار لقضاء العطلات'],
            ['en'=>'Short-Term Stay', 'ar'=>'إقامة قصيرة الأجل'],
            ['en'=>'Long-Term Rental', 'ar'=>'إيجار طويل الأجل'],
            ['en'=>'Event Venue', 'ar'=>'موقع الفعالية'],
            ['en'=>'Wedding Friendly', 'ar'=>'مناسب للزفاف'],
            ['en'=>'Corporate Retreat', 'ar'=>'تراجع الشركات']
        ];
        foreach ($labels as $label) {
            PropertyLabel::create([
                'name' => $label,
                'status' => 'active',
            ]);
        }
    }
}

