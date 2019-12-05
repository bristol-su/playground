<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Connection\Connection;
use BristolSU\Support\Connection\Contracts\Connector;
use BristolSU\Support\Connection\Contracts\ConnectorStore;
use BristolSU\Support\Tests\Connection\DummyConnector_RegisteredConnector;
use BristolSU\Support\User\User;
use FormSchema\Generator\Field;
use FormSchema\Schema\Form;
use Psr\Http\Message\ResponseInterface;

class ConnectionControllerTest extends TestCase
{

    /** @test */
    public function store_creates_a_new_connection()
    {
        $this->be(factory(User::class)->create());
        app(ConnectorStore::class)->register('Name1', 'Description1', 'dummy_1', 'service1', DummyConnector_1::class);

        $response = $this->json('POST', '/api/connection', [
            'name' => 'Name for the connection',
            'description' => 'Description for the connection',
            'alias' => 'dummy_1',
            'settings' => ['result' => false]
        ]);
        $response->assertJson([
            'name' => 'Name for the connection',
            'description' => 'Description for the connection',
            'alias' => 'dummy_1',
        ]);
        $this->assertDatabaseHas('connection_instances', [
            'name' => 'Name for the connection',
            'description' => 'Description for the connection',
            'alias' => 'dummy_1',
            'settings' => json_encode(['result' => false])
        ]);
    }

    /** @test */
    public function test_returns_true_if_connection_is_established()
    {
        $user = $this->newUser();
        $this->be(factory(User::class)->create(['control_id' => $user->id()]));

        app(ConnectorStore::class)->register('Name1', 'Description1', 'dummy_1', 'service1', DummyConnector_1::class);
        $connection = factory(Connection::class)->create(['alias' => 'dummy_1', 'settings' => ['result' => true]]);
        $response = $this->json('GET', '/api/connection/' . $connection->id . '/test');

        $response->assertStatus(200);
        $response->assertJson(['result' => true]);
    }

    /** @test */
    public function test_returns_false_if_connection_is_not_established()
    {
        $user = $this->newUser();
        $this->be(factory(User::class)->create(['control_id' => $user->id()]));

        app(ConnectorStore::class)->register('Name1', 'Description1', 'dummy_1', 'service1', DummyConnector_1::class);
        $connection = factory(Connection::class)->create(['alias' => 'dummy_1', 'settings' => ['result' => false]]);
        $response = $this->json('GET', '/api/connection/' . $connection->id . '/test');

        $response->assertStatus(200);
        $response->assertJson(['result' => false]);
    }

}

class DummyConnector_1 extends Connector {

    /**
     * @inheritDoc
     */
    public function request($method, $uri, array $options = [])
    {
        // TODO: Implement request() method.
    }

    /**
     * @inheritDoc
     */
    public function test(): bool
    {
        return $this->getSetting('result', null);
    }

    /**
     * @inheritDoc
     */
    static public function settingsSchema(): Form
    {
        return \FormSchema\Generator\Form::make()->withField(
            Field::checkBox('result')->default('true')
        )->getSchema();
    }
}
