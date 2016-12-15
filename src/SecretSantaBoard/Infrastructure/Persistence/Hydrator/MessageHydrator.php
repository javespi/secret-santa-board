<?php

namespace SecretSantaBoard\Infrastructure\Persistence\Hydrator;

use SecretSantaBoard\Domain\Message\Message;
use Zend\Hydrator\HydratorInterface;

class MessageHydrator implements HydratorInterface
{
    /**
     * @param Message $object
     *
     * @return array
     */
    public function extract($object)
    {
        return [
            'id' => $object->id(),
            'to' => $object->to(),
            'content' => $object->content(),
            'created_at' => $object->createdAt()->getTimestamp(),
        ];
    }

    /**
     * @param array   $data
     * @param Message $object
     */
    public function hydrate(array $data, $object)
    {
        $closure = function (array $data) {
            $this->id = $data['id'];
            $this->to = $data['to'];
            $this->content = $data['content'];
            $this->createdAt = new \DateTimeImmutable($data['created_at']);
        };

        $closure = $closure->bindTo($object, Message::class);
        $closure($data);
    }
}
