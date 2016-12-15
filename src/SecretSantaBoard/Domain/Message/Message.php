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
     * @param string             $content
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

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function to()
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function createdAt()
    {
        return $this->createdAt;
    }
}
