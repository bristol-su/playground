<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Connection\Connection;
use BristolSU\Support\Connection\Contracts\ConnectorRepository;
use BristolSU\Support\Connection\RegisteredConnector;
use BristolSU\Support\User\User;

class ServiceConnectionControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_connections_satisfying_the_given_service(){
        $this->be($user = factory(User::class)->create());

        $connection1 = factory(Connection::class)->create(['alias' => 'alias1', 'user_id' => $user->control_id]);
        $connection1_1 = factory(Connection::class)->create(['alias' => 'alias1', 'user_id' => $user->control_id]);
        $connection2 = factory(Connection::class)->create(['alias' => 'alias2', 'user_id' => $user->control_id]);
        $connection2_2 = factory(Connection::class)->create(['alias' => 'alias2', 'user_id' => $user->control_id]);
        $connection3 = factory(Connection::class)->create(['alias' => 'alias3', 'user_id' => $user->control_id]);

        $registeredConnector1 = $this->prophesize(RegisteredConnector::class);
        $registeredConnector2 = $this->prophesize(RegisteredConnector::class);
        $registeredConnector1->getAlias()->willReturn('alias1');
        $registeredConnector1->toArray()->willReturn(['alias' => 'alias1']);
        $registeredConnector2->getAlias()->willReturn('alias2');
        $registeredConnector2->toArray()->willReturn(['alias' => 'alias2']);

        $connectorRepository = $this->prophesize(ConnectorRepository::class);
        $connectorRepository->forService('service1')->shouldBeCalled()->willReturn([$registeredConnector1->reveal(), $registeredConnector2->reveal()]);
        $connectorRepository->get('alias1')->willReturn($registeredConnector1->reveal());
        $connectorRepository->get('alias2')->willReturn($registeredConnector2->reveal());
        $this->instance(ConnectorRepository::class, $connectorRepository->reveal());

        $response = $this->json('get', '/api/service/service1/connection');

        $response->assertStatus(200);
        $response->assertJson([
            $connection1->toArray(),
            $connection1_1->toArray(),
            $connection2->toArray(),
            $connection2_2->toArray(),
        ]);
    }

}
