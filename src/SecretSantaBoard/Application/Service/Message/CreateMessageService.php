<?php

namespace SecretSantaBoard\Application\Service\Message;

use Ddd\Application\Service\ApplicationService;
use SecretSantaBoard\Domain\Message\FactoryInterface;
use SecretSantaBoard\Domain\Message\RepositoryInterface;

class CreateMessageService implements ApplicationService
{
    /** @var RepositoryInterface */
    private $repository;

    /** @var FactoryInterface */
    private $factory;

    /**
     * @param RepositoryInterface $repository
     * @param FactoryInterface    $factory
     */
    public function __construct(
        RepositoryInterface $repository,
        FactoryInterface $factory
    ) {
        $this->repository = $repository;
        $this->factory = $factory;
    }

    /**
     * @param CreateMessageRequest|null $request
     */
    public function execute($request = null)
    {
        $this->repository->persist(
            $this->factory->forCreate(
                $request->to(),
                $request->content()
            )
        );
    }
}
