<?php

namespace SecretSantaBoard\Application\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;

class RoutingServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app->register(new \Silex\Provider\RoutingServiceProvider());

        $app['routes'] = $app->extend('routes',
            function (RouteCollection $routes) {
                $loader = new YamlFileLoader(
                    new FileLocator([
                        APP_PATH . '/Infrastructure/Configuration/Web',
                    ])
                );
                $collection = $loader->load('routing.yml');
                $routes->addCollection($collection);

                return $routes;
            }
        );
    }
}
