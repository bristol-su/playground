<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Support\Connection\Connection;
use BristolSU\Support\Connection\Contracts\ConnectionRepository;

/**
 * Manage connections belonging to specific services
 */
class ServiceConnectionController extends Controller
{

    /**
     * Get all connections belonging to a service
     *
     * @param string $service Service the connections should belong to
     * @param ConnectionRepository $connectionRepository Repository to get connections from
     *
     * @return \Illuminate\Support\Collection|Connection[]
     */
    public function index(string $service, ConnectionRepository $connectionRepository)
    {
        return collect($connectionRepository->getAllForService($service))->values();
    }

}
