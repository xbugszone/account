<?php

namespace Xbugs\Account\Responses;

use Nyholm\Psr7\Response;

class ErrorResponse extends Response
{
    public function __construct($body = null)
    {
        parent::__construct(500, [], $body, '1.1', null);
    }
}