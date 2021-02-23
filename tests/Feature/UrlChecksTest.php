<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UrlChecksTest extends TestCase
{
    private const FAKE_URL = 'https://test.com';

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->artisan('db:seed --class=UrlChecksSeeder');
    }

    public function testStore()
    {
        $url = DB::table('urls')->where('name', '=', self::FAKE_URL)->first();
        Http::fake([
            self::FAKE_URL => Http::response(null, 200),
        ]);

        $response = $this->post(route('url_checks.store', ['id' => $url->id]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('url_checks', [
            'url_id'   => $url->id,
            'status_code' => 200
        ]);
    }
}
