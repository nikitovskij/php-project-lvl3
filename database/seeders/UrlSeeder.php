<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrlSeeder extends Seeder
{
    public const FAKE_URLS_COUNTER = 5;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < self::FAKE_URLS_COUNTER; $i++) {
            $this->generateFakeTestingData();
        }
    }

    private function generateFakeTestingData()
    {
        $fakeUrl = implode('://', [
            Faker::create()->randomElement(['http', 'https', 'ftp']),
            Faker::create()->unique()->domainName
        ]);
        $createdAt = $updatedAt = Carbon::now();
        DB::table('urls')
            ->insert([
                'name' => $fakeUrl,
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ]);
    }
}
