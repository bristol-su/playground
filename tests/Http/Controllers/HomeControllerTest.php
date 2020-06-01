<?php

namespace BristolSU\Playground\Tests\Http\Controllers;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\User\User;

class HomeControllerTest extends TestCase
{

    /** @test */
    public function the_homepage_can_be_loaded(){
        $this->be(factory(User::class)->create());
        $response = $this->get('/');
        $response->assertViewIs('pages.module.index');
    }

}
