<?php

namespace SecretSantaBoard\Application\Provider;

use Ddd\Application\Service\TransactionalApplicationService;
use Ddd\Infrastructure\Application\Service\DummySession;
use Lazer\Classes\Database;
use Lazer\Classes\Helpers\Validate;
use Lazer\Classes\LazerException;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use SecretSantaBoard\Application\Factory\MessageFactory;
use SecretSantaBoard\Application\Service\Message\CreateMessageService;
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
            try {
                Validate::table('message')->exists();
            } catch (LazerException $le) {
                Database::create('message', MessageHydrator::LAZER_SCHEMA);
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

        $app['message.factory'] = function () use ($app) {
            return new MessageFactory(
                $app['message.repository']
            );
        };

        $app['message.create'] = function () use ($app) {
            return new TransactionalApplicationService(
                new CreateMessageService(
                    $app['message.repository'],
                    $app['message.factory']
                ),
                new DummySession()
            );
        };
    }
}
