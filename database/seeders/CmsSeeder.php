<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
//        DB::table('cms')->truncate();

        DB::table('cms')->insert([
            // Home Banner
            ['id' => 1, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //About us banner
            ['id' => 2, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //villa banner
            ['id' => 3, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //loyalty banner
            ['id' => 4, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //blog banner
            ['id' => 5, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //contact us banner
            ['id' => 6, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //villa detail banner
            ['id' => 7, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //blog detail banner
            ['id' => 8, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //all vila banner
            ['id' => 9, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //checkout banner
            ['id' => 10, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],

            //villa search banner
            ['id' => 11, 'banner_title' => null, 'sub_title' => null, 'banner_image' => null, 'banner_image_mobile' => null, 'page_title' => null, 'page_description' => null, 'button_title' => null, 'button_url' => null, 'title' => null, 'image' => null, 'status' => null, 'created_at' => now(), 'updated_at' => now()],


        ]);

    }
}

