<?php

namespace Xbugs\Account\Responses;

use Nyholm\Psr7\Response;

class CreatedResponse extends Response
{
    public function __construct($body = null)
    {
        parent::__construct(201, [], $body, '1.1',  null);
    }
}