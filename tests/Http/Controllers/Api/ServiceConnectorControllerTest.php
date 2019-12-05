<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Connection\Connection;
use BristolSU\Support\Connection\Contracts\ConnectorRepository;
use BristolSU\Support\Connection\RegisteredConnector;
use BristolSU\Support\User\User;

class ServiceConnectorControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_connectors_that_satisfy_the_given_service(){
        $this->be($user = factory(User::class)->create());

        $registeredConnector1 = $this->prophesize(RegisteredConnector::class);
        $registeredConnector2 = $this->prophesize(RegisteredConnector::class);
        $registeredConnector1->getAlias()->willReturn('alias1');
        $registeredConnector1->toJson()->willReturn(json_encode(['alias' => 'alias1']));
        $registeredConnector2->getAlias()->willReturn('alias2');
        $registeredConnector2->toJson()->willReturn(json_encode(['alias' => 'alias2']));

        $connectorRepository = $this->prophesize(ConnectorRepository::class);
        $connectorRepository->forService('service1')->shouldBeCalled()->willReturn([$registeredConnector1->reveal(), $registeredConnector2->reveal()]);
        $this->instance(ConnectorRepository::class, $connectorRepository->reveal());

        $response = $this->json('get', '/api/service/service1/connector');

        $response->assertStatus(200);
        $response->assertJson([
            ['alias' => 'alias1'],
            ['alias' => 'alias2'],
        ]);
    }

}
