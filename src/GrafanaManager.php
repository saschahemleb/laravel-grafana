<?php

declare(strict_types=1);

namespace Saschahemleb\LaravelGrafana;

use GuzzleHttp\Psr7\Uri;
use Illuminate\Contracts\Config\Repository;
use Saschahemleb\PhpGrafanaApiClient\Authentication;
use Saschahemleb\PhpGrafanaApiClient\Client;

class GrafanaManager
{
    /** @var array<string, Client> */
    private array $connections;

    public function __construct(private Repository $config)
    {
    }

    public function connection(string $name = null): Client
    {
        $name = $name ?? $this->getDefaultConfigName();

        $config = $this->getConnectionConfig($name);

        return $this->connections[$name] = $this->createConnection($config);
    }

    private function getDefaultConfigName(): string
    {
        return $this->config->get('grafana.default');
    }

    private function getConnectionConfig(string $name): array
    {
        return $this->config->get('grafana.connections')[$name];
    }

    protected function createConnection(array $config): Client
    {
        return Client::create(
            new Uri($config['url']),
            Authentication::basicAuth($config['username'], $config['password'])
        );
    }
}
