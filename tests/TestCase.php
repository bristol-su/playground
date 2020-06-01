<?php

namespace BristolSU\Playground\Tests;

use BristolSU\Support\ActivityInstance\Contracts\ActivityInstanceResolver;
use BristolSU\Support\Authentication\Contracts\Authentication;
use BristolSU\Support\Testing\ActivityInstance\LaravelAuthActivityInstanceResolver;
use BristolSU\Support\Testing\AssertsEloquentModels;
use BristolSU\Support\Testing\Authentication\SessionAuthentication;
use BristolSU\Support\Testing\CreatesSdkEnvironment;
use BristolSU\Support\Testing\HandlesAuthentication;
use Illuminate\Database\Eloquent\Factory as ModelFactory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    use CreatesApplication, DatabaseTransactions, HandlesAuthentication, AssertsEloquentModels, CreatesSdkEnvironment;

    public function setUp(): void
    {
        parent::setUp();
        $this->app['config']->set('database.default', 'testing');
        $this->app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        $this->app['config']->set('app.key', 'base64:UTyp33UhGolgzCK5CJmT+hNHcA+dJyp3+oINtX+VoPI=');
        $this->artisan('migrate', ['--database' => 'testing']);
        $this->createSdkEnvironment($this->app);
        $this->app->make(ModelFactory::class)->load(__DIR__ . '/../vendor/bristol-su/support/database/factories');
        $this->app->bind(Authentication::class, SessionAuthentication::class);
        $this->app->bind(ActivityInstanceResolver::class, LaravelAuthActivityInstanceResolver::class);
    }

}
