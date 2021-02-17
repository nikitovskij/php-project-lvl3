<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrlTest extends TestCase
{
    private const VALID_FAKE_URL = 'http://test.test';

    private const INVALID_FAKE_URL = 'test.com';

    private const FAKE_URL_COUNT = 5;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->artisan('db:seed --class=UrlSeeder');
    }

    public function testIndex()
    {
        $response = $this->get(route('index'));
        $response->assertOk();
    }

    public function testUrlsIndex()
    {
        $response = $this->get(route('urls.index'));
        $this->assertDatabaseCount('urls', self::FAKE_URL_COUNT);
        $response->assertOk();
    }

    public function testUrlsStoreSuccess()
    {
        $response = $this->post(route('urls.store'), [
            'url' => [
                'name' => self::VALID_FAKE_URL
            ]
        ]);
        $this->assertDatabaseHas('urls', ['name' => self::VALID_FAKE_URL]);
        $response->assertRedirect(route('urls.show', ['url' => self::FAKE_URL_COUNT + 1]));
    }

    public function testUrlsStoreFail()
    {
        $response = $this->post(route('urls.store'), [
            'url' => [
                'name' => self::INVALID_FAKE_URL
            ]
        ]);
        $response->assertRedirect(route('index'));
        $response->assertSessionHasErrors(['url.name' => 'Invalid URL provided']);
    }

    public function testUrlsShow()
    {
        $response = $this->get(route('urls.show', ['url' => self::FAKE_URL_COUNT]));
        $response->assertOk();

        $response = $this->get(route('urls.show', ['url' => 10]));
        $response->assertNotFound();
    }
}
