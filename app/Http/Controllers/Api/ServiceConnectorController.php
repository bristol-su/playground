<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Support\Connection\Contracts\Connector;
use BristolSU\Support\Connection\Contracts\ConnectorRepository;
use BristolSU\Support\Connection\RegisteredConnector;

/**
 * Manage all connectors belonging to a specific service
 */
class ServiceConnectorController extends Controller
{

    /**
     * Get all connectors for a service
     *
     * @param string $service Service the connectors should belong to
     * @param ConnectorRepository $connectorRepository Repository to get the connectors from
     * @return \Illuminate\Support\Collection|RegisteredConnector[]
     */
    public function index($service, ConnectorRepository $connectorRepository)
    {
        return collect($connectorRepository->forService($service))->values();
    }

}
