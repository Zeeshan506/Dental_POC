<?php

namespace Tests\Feature;

use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class UrlSchemeTest extends TestCase
{
    protected function tearDown(): void
    {
        URL::forceScheme(null);

        parent::tearDown();
    }

    public function test_production_environment_generates_https_urls(): void
    {
        $this->app->detectEnvironment(fn (): string => 'production');

        (new AppServiceProvider($this->app))->boot();

        $this->assertSame('https', parse_url(URL::to('/consultation'), PHP_URL_SCHEME));
    }

    public function test_non_production_environment_generates_http_urls(): void
    {
        $this->app->detectEnvironment(fn (): string => 'local');

        (new AppServiceProvider($this->app))->boot();

        $this->assertSame('http', parse_url(URL::to('/consultation'), PHP_URL_SCHEME));
    }
}
