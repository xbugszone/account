<?php

namespace Xbugs\Account\Responses;

use Nyholm\Psr7\Response;

class NotFoundResponse extends Response
{
    public function __construct($body = null)
    {
        parent::__construct(404, [], $body, '1.1', null);
    }
}