<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
$settings =  require '../src/settings.php';
$app = new \Slim\App($settings);
require '../src/middleware.php';
require '../src/routes.php';


$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name ");
    $response->getBody()->write(implode(" ",$request->getQueryParams()));

    return $response;
});


$app->run();