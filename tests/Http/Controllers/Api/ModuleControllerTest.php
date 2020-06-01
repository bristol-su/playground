<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Module\Contracts\ModuleRepository;
use BristolSU\Support\Module\Contracts\Module;
use BristolSU\Support\User\User;

class ModuleControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_modules(){
        $this->be(factory(User::class)->create());
        $module1 = $this->prophesize(Module::class);
        $module2 = $this->prophesize(Module::class);
        $module3 = $this->prophesize(Module::class);

        $module1->toArray()->shouldBeCalled()->willReturn(['alias' => 'module1']);
        $module2->toArray()->shouldBeCalled()->willReturn(['alias' => 'module2']);
        $module3->toArray()->shouldBeCalled()->willReturn(['alias' => 'module3']);
        $moduleRepository = $this->prophesize(ModuleRepository::class);
        $moduleRepository->all()->shouldBeCalled()->willReturn([$module1->reveal(), $module2->reveal(), $module3->reveal()]);
        $this->instance(ModuleRepository::class, $moduleRepository->reveal());

        $response = $this->json('GET', '/api/module');

        $response->assertStatus(200);
        $response->assertJson([
            ['alias' => 'module1'],
            ['alias' => 'module2'],
            ['alias' => 'module3'],
        ]);
    }

    /** @test */
    public function show_returns_a_module(){
        $this->be(factory(User::class)->create());
        $module1 = $this->prophesize(Module::class);
        $module1->toJson(0)->shouldBeCalled()->willReturn(json_encode(['alias' => 'module1']));

        $moduleRepository = $this->prophesize(ModuleRepository::class);
        $moduleRepository->findByAlias('module1')->shouldBeCalled()->willReturn($module1->reveal());
        $this->instance(ModuleRepository::class, $moduleRepository->reveal());

        $response = $this->json('GET', '/api/module/module1');

        $response->assertStatus(200);
        $response->assertJson(['alias' => 'module1']);
    }

}
