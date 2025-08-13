<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionId = DB::table('navbar_sections')->insertGetId([
            'title' => 'PELINDO MUSEUM',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan beberapa link
        DB::table('navbar_links')->insert([
            [
                'navbar_section_id' => $sectionId,
                'navigation' => 'Home',
                'href' => '/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'navbar_section_id' => $sectionId,
                'navigation' => 'About',
                'href' => '/about',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'navbar_section_id' => $sectionId,
                'navigation' => 'Contact',
                'href' => '/contact',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
