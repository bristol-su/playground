<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Support\Connection\Connection;
use BristolSU\Support\Connection\Contracts\ConnectionRepository;
use BristolSU\Support\Connection\Contracts\ConnectorFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * Routes around managing connections.
 */
class ConnectionController extends Controller
{

    /**
     * Create a new connection
     *
     * Parameters given should be
     * [
     *      'name' => 'Name for the connection',
     *      'description' => 'Description for the connection',
     *      'alias' => 'Alias of the connector to use',
     *      'settings' => [] // Array of settings to use in the connector
     * ]
     *
     * @param Request $request Request object
     * @param ConnectionRepository $connectionRepository Repository with which to create the connection
     *
     * @return Connection New connection
     */
    public function store(Request $request, ConnectionRepository $connectionRepository)
    {
        return $connectionRepository->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'alias' => $request->input('alias'),
            'settings' => $request->input('settings', [])
        ]);
    }

    /**
     * Test a connection
     *
     * @param Connection $connection Connection to test
     * @param ConnectorFactory $connectorFactory Factory to retrieve and build a connector
     *
     * @return \Illuminate\Http\JsonResponse ['result' => true/false]
     */
    public function test(Connection $connection, ConnectorFactory $connectorFactory)
    {
        $connector = $connectorFactory->createFromConnection($connection);
        if($connector->test()) {
            return Response::json(['result' => true], 200);
        }
        return Response::json(['result' => false], 200);
    }
}
