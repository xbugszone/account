<?php

namespace Xbugs\Account\Dispachers;

use Xbugs\Account\Kernel;

class Dispacher
{
    public $entityManager;

    public function __construct()
    {
        $kernel = new Kernel();
        $kernel->loadConfigs();
        $kernel->loadORM();

        $this->entityManager = $kernel->getEntityManager();
    }
}