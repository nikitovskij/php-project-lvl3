<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrlChecksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_at = $update_at = Carbon::now();
        DB::table('urls')->insertGetId([
            'name' => 'https://test.com',
            'created_at' => $created_at,
            'updated_at' => $update_at,
        ]);
    }
}
