<?php

namespace SecretSantaBoard\Infrastructure\Persistence\Hydrator\Lazer;

use SecretSantaBoard\Domain\Message\Message;
use Zend\Hydrator\HydratorInterface;

class MessageHydrator implements HydratorInterface
{
    const LAZER_SCHEMA = [
        'id' => 'integer',
        'to' => 'string',
        'content' => 'string',
        'created_at' => 'integer',
    ];

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
     *
     * @return Message
     */
    public function hydrate(array $data, $object)
    {
        $closure = function (array $data) {
            $this->id = $data['id'];
            $this->to = $data['to'];
            $this->content = $data['content'];
            $this->createdAt = date_create_immutable($data['created_at']);
        };

        $closure = $closure->bindTo($object, Message::class);
        $closure($data);

        return $object;
    }
}
