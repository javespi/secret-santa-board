<?php

namespace SecretSantaBoard\Infrastructure\Ui\Web;

use SecretSantaBoard\Application\App;
use Silex\Controller;

class MessageController extends Controller
{
    /**
     * @param App $app
     */
    public static function index(App $app)
    {
        return $app->renderView('message.html.twig');
    }

    /**
     * @param App $app
     */
    public static function create(App $app)
    {
        // TODO: POST - Create a Message
        // TODO: Redirect to index
    }
}
