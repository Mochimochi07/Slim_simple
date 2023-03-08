<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();


$app->addErrorMiddleware(true, true, true);


$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('<a href="/hello/world">Try /hello/world</a>');
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->get('/show/{a}', function (Request $request, Response $response, $args) {
    $a = $args['a'];
    
   
    $response->getBody()->write("Hello this is your number, $a");
    return $response;
});

$app->get('/add/{a}/{b}', function (Request $request, Response $response, $args) {
    $a = $args['a'];
    $b = $args['b'];
    $result = $a + $b;
   
    $response->getBody()->write("Hello this is your number, $result");
    return $response;
});

$app->run();
