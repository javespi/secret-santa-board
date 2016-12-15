<?php

namespace SecretSantaBoard\Infrastructure\Persistence\Repository;

use SecretSantaBoard\Domain\Message\Message;
use SecretSantaBoard\Domain\Message\RepositoryInterface;
use SecretSantaBoard\Infrastructure\Persistence\Hydrator\MessageHydrator;

class MessageRepository implements RepositoryInterface
{
    /**
     * @var MessageHydrator
     */
    private $hydrator;

    /**
     * @param MessageHydrator $hydrator
     */
    public function __construct(MessageHydrator $hydrator)
    {
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
