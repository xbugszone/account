<?php

namespace Xbugs\Account\Responses;

use Nyholm\Psr7\Response;

class NotCreatedResponse extends Response
{
    public function __construct($body = null)
    {
        parent::__construct(204, [], $body, '1.1', null);
    }
}