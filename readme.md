# Laravel Grafana

Laravel Grafana is a [PhpGrafanaApiClient](https://github.com/saschahemleb/php-grafana-api-client) bridge for Laravel.

## Installation

Via Composer

``` bash
$ composer require saschahemleb/laravel-grafana
```

## Configuration

First, publish the config from this package, which results in the creation of a new file `config/grafana.php`.
```bash
php artisan vendor:publish --provider "Saschahemleb\\LaravelGrafana\\GrafanaServiceProvider"
```
