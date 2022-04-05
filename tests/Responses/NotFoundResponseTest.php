<?php

namespace Tests\Responses;

use Xbugs\Account\Responses\NotFoundResponse;
use PHPUnit\Framework\TestCase;

class NotFoundResponseTest extends TestCase
{
    public function testResponseNoBody()
    {
        $response = new NotFoundResponse();
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('', $response->getBody()->getContents());
    }

    public function testResponseBody()
    {
        $response = new NotFoundResponse('Page Not Found');
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('', $response->getBody()->getContents());
    }
}
