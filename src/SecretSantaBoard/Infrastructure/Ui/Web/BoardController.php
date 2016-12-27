<?php

namespace SecretSantaBoard\Infrastructure\Ui\Web;

use SecretSantaBoard\Application\App;
use Symfony\Component\HttpFoundation\Request;

class BoardController
{
    /**
     * @param App $app
     */
    public static function index(App $app)
    {
        $messages = $app['message.repository']->findAll();

        return $app->renderView('board.index.html.twig', [
            'messages' => $messages,
        ]);
    }

    /**
     * @param App     $app
     * @param Request $request
     */
    public static function show(App $app, Request $request)
    {
        $messages = $app['message.repository']->findAllByTo(
            $request->get('to')
        );

        return $app->renderView('board.index.html.twig', [
            'messages' => $messages,
        ]);
    }
}
