<?php

namespace SecretSantaBoard\Infrastructure\Ui\Web;

use SecretSantaBoard\Application\App;
use SecretSantaBoard\Application\Service\Message\CreateMessageRequest;
use Silex\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
     * @param App     $app
     * @param Request $request
     */
    public static function create(App $app, Request $request)
    {
        try {
            $app['message.create']->execute(
                new CreateMessageRequest(
                    $request->get('to'),
                    $request->get('content')
                )
            );
        } catch (\Exception $e) {
            return $app->json([
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => $e->getMessage(),
            ]);
        }

        return $app->json([
            'status' => Response::HTTP_OK,
            'message' => 'Message created correctly!',
        ]);
    }
}
