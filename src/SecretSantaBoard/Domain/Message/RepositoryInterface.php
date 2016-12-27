<?php

namespace SecretSantaBoard\Domain\Message;

interface RepositoryInterface
{
    /**
     * Returns last message id
     *
     * @return int
     */
    public function lastId();

    /**
     * Returns all messages to someone
     *
     * @param string $to
     *
     * @return Message[]
     */
    public function findAllByTo($to);

    /**
     * Returns last ten messages of all collection
     *
     * @return Message[]
     */
    public function findAll();

    /**
     * Persis a message
     *
     * @param Message $message
     */
    public function persist(Message $message);
}
