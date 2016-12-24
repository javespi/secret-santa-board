<?php

namespace SecretSantaBoard\Application\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TwigServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app->register(new \Silex\Provider\TwigServiceProvider(), [
            'twig.path' => APP_PATH . '/Infrastructure/Ui/Twig',
            'twig.options' => [
                'cache' => ROOT_PATH . '/cache/twig/',
            ],
        ]);
    }
}
