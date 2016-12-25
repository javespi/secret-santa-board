<?php

namespace SecretSantaBoard\Application\Service\Message;

class CreateMessageRequest
{
    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $content;

    /**
     * @param $to
     * @param $content
     */
    public function __construct(
        $to,
        $content
    ) {
        $this->to = $to;
        $this->content = $content;
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
}
