<?php

namespace SecretSantaBoard\Infrastructure\Ui\Web;

use Silex\Application;
use Silex\Controller;

class MessageController extends Controller
{
    /**
     * @param Application $app
     */
    public function index(Application $app)
    {
        // TODO: GET - List of Messages
        // TODO: Return data to view
    }

    /**
     * @param Application $app
     */
    public function create(Application $app)
    {
        // TODO: POST - Create a Message
        // TODO: Redirect to index
    }
}
