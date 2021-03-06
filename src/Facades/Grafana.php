<?php

namespace Saschahemleb\LaravelGrafana\Facades;

use Illuminate\Support\Facades\Facade;
use Saschahemleb\PhpGrafanaApiClient\Api\Admin;
use Saschahemleb\PhpGrafanaApiClient\Api\Datasource;
use Saschahemleb\PhpGrafanaApiClient\Api\Organization;
use Saschahemleb\PhpGrafanaApiClient\Api\Other;
use Saschahemleb\PhpGrafanaApiClient\Api\Team;
use Saschahemleb\PhpGrafanaApiClient\Api\User;

/**
 * @method static mixed inOrganization(int $organizationId, callable $callable)
 * @method static User user()
 * @method static Team team()
 * @method static Other other()
 * @method static Admin admin()
 * @method static Organization organization()
 * @method static Datasource datasource()
 */
class Grafana extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'grafana';
    }
}
