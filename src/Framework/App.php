<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class App
{
    public function run(Request $request): Response
    {
        $uri = $request->getRequestUri();
        if (!empty($uri) && $uri[-1] === '/') {
            $response = new Response();
            $response->setContent('With Trailing slash');
            $response->headers->set('Location', substr($uri, 0, -1));
            $response->setStatusCode(Response::HTTP_MOVED_PERMANENTLY);

            return $response;
        }

        if (!empty($uri) && $uri === '/blog') {
            $response = new Response();
            $response->setContent('Blog page');
            $response->setStatusCode(Response::HTTP_OK);

            return $response;
        }

        $response = new Response();
        $response->setContent('Without trailing slash');
        $response->send();

        return $response;
    }
}
