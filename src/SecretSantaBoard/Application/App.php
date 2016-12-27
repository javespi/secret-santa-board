<?php

namespace SecretSantaBoard\Application;

use SecretSantaBoard\Application\Provider\MessageProvider;
use SecretSantaBoard\Application\Provider\RoutingServiceProvider;
use SecretSantaBoard\Application\Provider\TwigServiceProvider;
use Silex\Application;

class App extends Application
{
    use Application\TwigTrait;

    /**
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        $values['debug'] = true;
        parent::__construct($values);

        $this->registerAllProviders();
    }

    private function registerAllProviders()
    {
        $this->register(new RoutingServiceProvider());
        $this->register(new TwigServiceProvider());
        $this->register(new MessageProvider());
    }
}
