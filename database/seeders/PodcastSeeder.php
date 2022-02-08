<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('podcasts')->insert([
            'title' => Str::random(10),
            'image' => Str::random(10),
            'description' => Str::random(10),
        ]);
    }
}
