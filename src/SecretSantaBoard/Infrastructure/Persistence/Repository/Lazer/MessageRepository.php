<?php

namespace SecretSantaBoard\Infrastructure\Persistence\Repository\Lazer;

use Lazer\Classes\Database;
use SecretSantaBoard\Domain\Message\Message;
use SecretSantaBoard\Domain\Message\RepositoryInterface;
use SecretSantaBoard\Infrastructure\Persistence\Hydrator\Lazer\MessageHydrator;

class MessageRepository implements RepositoryInterface
{
    /** @var Database */
    private $database;

    /** @var MessageHydrator */
    private $hydrator;

    /**
     * @param Database        $database
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
     * @return int
     */
    public function lastId()
    {
        return (int) $this->database->lastId();
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
        $fields = $this->hydrator->extract($message);
        foreach ($fields as $key => $value) {
            $this->database->$key = $value;
        }
        $this->database->save();
    }
}
