<?php

namespace SecretSantaBoard\Domain\Message;

interface RepositoryInterface
{
    /**
     * @return int
     */
    public function lastId();

    /**
     * @param int $id
     *
     * @return Message
     */
    public function findById($id);

    /**
     * @return Message[]
     */
    public function findAll();

    /**
     * @param Message $message
     */
    public function persist(Message $message);
}
