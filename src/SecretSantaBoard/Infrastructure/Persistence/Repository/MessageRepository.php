<?php

namespace SecretSantaBoard\Infrastructure\Persistence\Repository;

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
}
