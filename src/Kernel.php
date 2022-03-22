<?php

namespace Xbugs\Account;

use Nyholm\Psr7\Response;
use Nyholm\Psr7\ServerRequest;

class Kernel
{
    public function __construct()
    {
        
    }

    public function processRequest(ServerRequest $request) : Response {
        return new Response(200,[],'hello World');
    }
}