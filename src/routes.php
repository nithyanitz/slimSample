<?php
/*
use Slim\Http\Request;
use Slim\Http\Response;
*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Routes

/*$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
   

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
*/
require_once "../sub-domain/products.php";

$app->get("/products",function($request,$response,$args){
	$products = new Products($this->dbConnection);
	/*if($this->has('dbConnection')){
		return $response->write('has container');
	}*/
	//$this->get('logger')->info('hello');
	$response->withHeader("Content-type","application/json");
	$response = $response->write(json_encode($products->fetchProducts($args)));
	/*
	$status = $response->getStatusCode();
	$method = $request->getMethod();
	 $this->logger->info("into welcome");
	 $foo = $request->getAttribute("foo");
	 $this->logger->info($foo);
	// $response = $response->getBody()->write($foo);
	 //$response = $response->getBody()->write($status);
	//$response = $response->getBody()->write("body".$method);
	*/
	//if(isset($this->dbConnection)){
	if($this->get('dbConnection')){
		$response->getBody()->write(" connecting");
			}else{
		 $response->getBody()->write("not connecting");
	}
	return $response;
})->add($mw);

