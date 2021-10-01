<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/conf/Db.php';
require __DIR__ . '/../src/utils/DBUtils.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->setBasePath("/mproject");


require __DIR__ . '/../src/app/routing.php';

$app->run();