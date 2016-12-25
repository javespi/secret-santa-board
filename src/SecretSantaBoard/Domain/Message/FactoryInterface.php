<?php

namespace SecretSantaBoard\Domain\Message;

interface FactoryInterface
{
    /**
     * @param string $to
     * @param string $content
     *
     * @return Message
     */
    public function forCreate($to, $content);
}
