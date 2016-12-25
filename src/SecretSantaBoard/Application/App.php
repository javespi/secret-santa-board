<?php

namespace SecretSantaBoard\Application;

use SecretSantaBoard\Application\Provider\MessageProvider;
use SecretSantaBoard\Application\Provider\TwigServiceProvider;
use SecretSantaBoard\Infrastructure\Ui\Web\MessageController;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

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

        $this->loadDefines();
        $this->registerAllProviders();
        $this->loadControllers();
    }

    private function registerAllProviders()
    {
        $this->register(new TwigServiceProvider());
        $this->register(new MessageProvider());
    }

    private function loadControllers()
    {
        $app = $this;
        $this->get('/', function () use ($app) {
            return MessageController::index($app);
        });

        $this->post('/create', function (Request $request) use ($app) {
            return MessageController::create($app, $request);
        });
    }

    private function loadDefines()
    {
        define('LAZER_DATA_PATH', ROOT_PATH . '/databases/');
    }
}
