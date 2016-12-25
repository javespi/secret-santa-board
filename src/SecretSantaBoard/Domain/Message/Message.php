<?php

namespace SecretSantaBoard\Domain\Message;

use Assert\Assertion;

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
        $this->setId($id);
        $this->setTo($to);
        $this->setContent($content);
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

    /**
     * @param $content
     */
    private function setContent($content)
    {
        Assertion::string($content);
        Assertion::notEmpty($content);
        $this->content = $content;
    }

    /**
     * @param $id
     */
    private function setId($id)
    {
        Assertion::integer($id);
        $this->id = $id;
    }

    /**
     * @param $to
     */
    private function setTo($to)
    {
        Assertion::notEmpty($to);
        $this->to = $to;
    }
}
