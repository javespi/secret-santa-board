<?php

namespace SecretSantaBoard\Infrastructure\Persistence\Repository\Lazer;

use Lazer\Classes\Database;
use SecretSantaBoard\Domain\Message\Message;
use SecretSantaBoard\Domain\Message\RepositoryInterface;
use SecretSantaBoard\Infrastructure\Persistence\Hydrator\Lazer\MessageHydrator;

class MessageRepository implements RepositoryInterface
{
    /**
     * @var MessageHydrator
     */
    private $hydrator;

    /**
     * @param MessageHydrator $hydrator
     */
    public function __construct(
        Database $database,
        MessageHydrator $hydrator
    ) {
        $this->database = $database;
        $this->hydrator = $hydrator;
    }

    /**
     * {@inheritdoc}
     */
    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * {@inheritdoc}
     */
    public function persist(Message $message)
    {
        $dataToPersist = $this->hydrator->extract($message);
        // TODO: Implement persist() method.
    }
}
