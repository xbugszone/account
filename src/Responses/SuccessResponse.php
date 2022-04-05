<?php

namespace Xbugs\Account\Responses;

use Nyholm\Psr7\Response;

class SuccessResponse extends Response
{
    public function __construct($body = null)
    {
        parent::__construct(200, [], $body, '1.1', null);
    }
}