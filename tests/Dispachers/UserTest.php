<?php

namespace Tests\Dispachers;

use Nyholm\Psr7\ServerRequest;
use Xbugs\Account\Dispachers\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testCreateNoData()
    {
        $request = new ServerRequest('POST','/regist', [], null);
        $userDispacher = new User();
        $response  = $userDispacher->create($request);
        $this->assertNull($response);
    }

    public function testCreateData()
    {
        $request = new ServerRequest('POST','/regist', ['name' => 'xx', 'password' => 'yy'], null);
        $userDispacher = new User();
        $response  = $userDispacher->create($request);
        $this->assertNull($response);
    }
}
