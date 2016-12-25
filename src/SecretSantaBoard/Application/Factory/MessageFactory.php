<?php

namespace SecretSantaBoard\Application\Factory;

use SecretSantaBoard\Domain\Message\FactoryInterface;
use SecretSantaBoard\Domain\Message\Message;
use SecretSantaBoard\Domain\Message\RepositoryInterface;

class MessageFactory implements FactoryInterface
{
    /** @var RepositoryInterface */
    private $repository;

    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $to
     * @param string $content
     *
     * @return Message
     */
    public function forCreate($to, $content)
    {
        return new Message(
            $this->nextId(),
            $to,
            $content,
            new \DateTimeImmutable('now')
        );
    }

    /**
     * @return int
     */
    private function nextId()
    {
        return $this->repository->lastId() + 1;
    }
}
