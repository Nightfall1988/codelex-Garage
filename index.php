 <?php
 use App\Controller;
 use App\App;
 require 'vendor/autoload.php';

 $dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
$r->addRoute('POST', '/rent', [Controller::class,'rent']);
$r->addRoute('POST', '/return', [Controller::class,'return']);
$r->addRoute('GET', '/', [Controller::class,'home']);
});
// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $class = new $handler;
        $vars = $routeInfo[2];
        call_user_func(array($class,$method));
    }

$app = new App;
echo $app->run();
?>