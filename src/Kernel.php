<?php

namespace Xbugs\Account;

use Xbugs\Account\Responses\NotFoundResponse;
use Nyholm\Psr7\ServerRequest;

class Kernel
{
    public function __construct()
    {
        
    }

    public function processRequest(ServerRequest $request) : NotFoundResponse {
        return new NotFoundResponse();
    }
}