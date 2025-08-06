<?php

namespace Database\Seeders;

use App\Models\DynamicPage;
use Illuminate\Database\Seeder;

class DynamicPageSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dynamicPages = DynamicPage::all()->pluck('page_slug')->toArray();

        if (!in_array('privacy-policy', $dynamicPages)) {
            DynamicPage::create([
                'page_title'            => [
                    'en' => 'Privacy and Policy',
                    'ar' => 'من نحن'
                ],
                'page_slug'             => 'privacy-policy',
                'page_content'          => [
                    'en' => '<p>This is a sample Privacy and Policy page.</p>',
                    'ar' => '<p>هذا هو نموذج عن صفحة من نحن.</p>'
                ],
                'status'                => 'active',
            ]);
        }

        if (!in_array('terms-and-conditions', $dynamicPages)) {
            DynamicPage::create([
                'page_title'            => [
                    'en' => 'Terms and Conditions',
                    'ar' => 'من نحن'
                ],
                'page_slug'             => 'terms-and-conditions',
                'page_content'          => [
                    'en' => '<p>This is a sample Terms and Conditions page.</p>',
                    'ar' => '<p>هذا هو نموذج عن صفحة من نحن.</p>'
                ],
                'status'                => 'active',
            ]);
        }
    }
}
