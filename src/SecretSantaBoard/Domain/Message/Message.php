<?php

namespace SecretSantaBoard\Domain\Message;

class Message
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTimeImmutable
     */
    private $createdAd;

    /**
     * @param int                $id
     * @param string             $to
     * @param strin              $content
     * @param \DateTimeImmutable $createdAt
     */
    public function __construct(
        $id,
        $to,
        $content,
        \DateTimeImmutable $createdAt
    ) {
        $this->id = $id;
        $this->to = $to;
        $this->content = $content;
        $this->createdAd = $createdAt;
    }
}
