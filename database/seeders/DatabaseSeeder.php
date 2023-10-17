<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $path = 'public/storage/images/ladaya-main.jpg';
        $url = Storage::url($path);
    
        DB::table('contents')->insert([
            'title' => 'Wahana Tenggarong Ladaya',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quaerat iusto ea eius impedit reprehenderit asperiores eaque, temporibus dolorum illo!',
            'image' => $url,
        ]);
    }
}
