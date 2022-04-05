<?php

namespace Tests\Responses;

use Xbugs\Account\Responses\CreatedResponse;
use PHPUnit\Framework\TestCase;

class CreatedResponseTest extends TestCase
{
    public function testResponseNoBody()
    {
        $response = new CreatedResponse();
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('', $response->getBody()->getContents());
    }

    public function testResponseBody()
    {
        $response = new CreatedResponse('Page Not Found');
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('', $response->getBody()->getContents());
    }
}
