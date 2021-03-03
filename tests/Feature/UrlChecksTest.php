<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UrlChecksTest extends TestCase
{
    private const FAKE_URL = 'https://test.com';

    private string $html;

    private object $urls;

    public function setUp(): void
    {
        parent::setUp();
        $this->html = (string) file_get_contents(
            implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'Fixtures', 'index.html'])
        );
        $this->artisan('migrate');
        $this->artisan('db:seed --class=UrlChecksSeeder');
        $this->urls = DB::table('urls')->where('name', '=', self::FAKE_URL)->get();
    }

    public function testStore(): void
    {
        Http::fake([
            self::FAKE_URL => Http::response($this->html, 200),
        ]);

        $url = $this->urls->first();
        $response = $this->post(route('url_checks.store', ['id' => $url->id]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('url_checks', [
            'url_id' => $url->id,
            'status_code' => 200,
            'h1' => 'Test successful!',
            'keywords' => 'one,two,three',
            'description' => 'test website',
        ]);
    }
}
