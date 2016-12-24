<?php

namespace SecretSantaBoard\Application\Provider;

use Lazer\Classes\Database;
use Lazer\Classes\Helpers\Validate;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use SecretSantaBoard\Infrastructure\Persistence\Hydrator\Lazer\MessageHydrator;
use SecretSantaBoard\Infrastructure\Persistence\Repository\Lazer\MessageRepository;

class MessageProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['message.database'] = function () {
            if (false === Validate::table('message')->exists()) {
                Database::create('message', [
                    MessageHydrator::LAZER_SCHEMA,
                ]);
            }

            return Database::table('message');
        };

        $app['message.hydrator'] = function () {
            return new MessageHydrator();
        };

        $app['message.repository'] = function () use ($app) {
            return new MessageRepository(
                $app['message.database'],
                $app['message.hydrator']
            );
        };
    }
}
