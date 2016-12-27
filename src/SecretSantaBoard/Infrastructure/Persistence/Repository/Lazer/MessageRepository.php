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
    public function findAllByTo($to)
    {
        $result = $this->database
            ->where('to', '=', $to)
            ->orderBy('created_at', 'DESC')
            ->findAll()
            ->asArray();

        return $this->hydrateCollection($result);
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        $result = $this->database
            ->orderBy('created_at', 'DESC')
            ->findAll()
            ->asArray();

        return $this->hydrateCollection($result);
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

    /**
     * @param array $result
     *
     * @return Message[]
     */
    private function hydrateCollection(array $result)
    {
        $messages = [];
        foreach ($result as $row) {
            $messages[] = $this->hydrator->hydrate(
                $row,
                $this->prototype()
            );
        }

        return $messages;
    }

    /**
     * @return Message
     */
    private function prototype()
    {
        return (new \ReflectionClass(Message::class))->newInstanceWithoutConstructor();
    }
}
