<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$mw = function($request,$response,$next){
	$response->getBody()->write("Before request");
	$request = $request->withAttribute("foo","bar");
	$response = $next($request,$response);
	$response->getBody()->write("After request");
	return $response;
};
?>