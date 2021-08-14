<?php

namespace BristolSU\Playground\Tests;

use BristolSU\Support\Testing\AssertsEloquentModels;
use BristolSU\Support\Testing\HandlesAuthentication;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Prophecy\PhpUnit\ProphecyTrait;

abstract class TestCase extends \BristolSU\Support\Testing\TestCase
{
    use CreatesApplication, DatabaseTransactions, HandlesAuthentication, AssertsEloquentModels, ProphecyTrait;

}
