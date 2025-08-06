<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitiesSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('amenities')->insert([
            [
                'id'                    => 1,
                'name'                  => json_encode([
                'ar' => 'خدمة الواي فاي المجانية', // Arabic text
                'en' => 'Free WiFi'   // English text
                ]),
                'image'                 => null,
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ],
            [
                'id'                    => 2,
                'name'                  => json_encode([
                    'ar' =>'مواقف مجانية للسيارات',
                    'en' =>'Free parking'
                ]),
                'image'                 => null,
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ],
            [
                'id'                    => 3,
                'name'                  => json_encode([
                   'ar' => "غرف لغير المدخنين",
                   'en' =>'Non-smoking rooms'
                ]),
                'image'                 => null,
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ],
            [
                'id'                    => 4,
                'name'                  => json_encode([
                    'ar' => "مرافق للضيوف ذوي الاحتياجات الخاصة",
                    'en' =>"Facilities for disabled guests"
                ]),
                'image'                 => null,
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ],
            [
                'id'                    => 5,
                'name'                  => json_encode([
                    'ar' => 'مكتب استقبال مفتوح 24 ساعة',
                    'en' => '24-hour front desk'
                ]),
                'image'                 => null,
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ],
            [
                'id'                    => 6,
                'name'                  => json_encode([
                    'ar' => 'تراس',
                    'en' =>'Terrace']),
                'image'                 => null,
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ],
            [
                'id'                    => 7,
                'name'                  => json_encode([
                    'ar' => 'مصعد',
                    'en' =>'Lift']),
                'image'                 => null,
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ],
            [
                'id'                    => 8,
                'name'                  => json_encode([
                    'ar' =>'حديقة',
                    'en' => 'Garden']),
                'image'                 => null,
                'status'                => 'active',
                'created_at'            => '2024-09-05 04:06:22',
                'updated_at'            => '2024-09-05 10:07:59',
                'deleted_at'            => null,
            ],
        ]);

    }
}



