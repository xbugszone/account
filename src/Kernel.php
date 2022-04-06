<?php

namespace Xbugs\Account;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Nyholm\Psr7\ServerRequest;
use Symfony\Component\Dotenv\Dotenv;
use Nyholm\Psr7\Response;
use Xbugs\Account\Routes\Router;
use Xbugs\Account\Responses\CreatedResponse;


class Kernel
{
    public EntityManager $entityManager;

    public function loadConfigs()
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../.env');
    }

    public function loadORM()
    {
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/Models"), true, null, null, false);
        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/Databases/db.sqlite',
        );
        $this->entityManager = EntityManager::create($conn, $config);
    }

    public function getEntityManager() : EntityManager
    {
        return $this->entityManager;
    }

    public function processRequest(ServerRequest $request) : Response
    {
        $path =strtoupper(str_replace($_ENV['APP_URL'],'', $_SERVER['REQUEST_URI']));
        $method = strtoupper($_SERVER['REQUEST_METHOD']);

        $route = $method."_".$path;

        $router = new Router($route);
        $router->dispatch($request);
        return new CreatedResponse("");
    }
}