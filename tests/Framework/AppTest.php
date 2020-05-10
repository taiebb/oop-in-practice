<?php

namespace Tests\Framework;

use Framework\App;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class AppTest extends TestCase
{
    public function testRedirectTrailingSlash()
    {
        $request = (new Request())::create(
            '/hello-world/',
            'GET',
        );

        $app = new App();
        $response = $app->run($request);

        $this->assertEquals(301, $response->getStatusCode());
        $this->assertEquals('/hello-world', $response->headers->get('Location'));
    }

    public function testBlogPage()
    {
        $request = (new Request())::create(
            '/blog',
            'GET',
        );

        $app = new App();
        $response = $app->run($request);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
