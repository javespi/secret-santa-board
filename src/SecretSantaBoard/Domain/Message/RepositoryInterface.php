<?php

namespace SecretSantaBoard\Domain\Message;

interface RepositoryInterface
{
    /**
     * @param int $id
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
