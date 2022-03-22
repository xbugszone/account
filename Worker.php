<?php

use Nyholm\Psr7\Response;
use Spiral\RoadRunner;
use Nyholm\Psr7;
use Xbugs\Account\Kernel;

include "vendor/autoload.php";

$worker = RoadRunner\Worker::create();
$psrFactory = new Psr7\Factory\Psr17Factory();

$worker = new RoadRunner\Http\PSR7Worker($worker, $psrFactory, $psrFactory, $psrFactory);

$kernel = new Kernel();

while ($req = $worker->waitRequest()) {
    try {
        $req->getParsedBody();
        $worker->respond($kernel->processRequest($req));
    } catch (\Throwable $e) {
        $worker->getWorker()->error((string)$e);
    }
}