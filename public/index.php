<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
session_start();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Job;
use Aura\Router\RouterContainer;
use Zend\Diactoros\Response\RedirectResponse;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$routerContainer = new RouterContainer();
$baseUrl='';
$map = $routerContainer->getMap();
$map->get('index', $baseUrl.'/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexActions'
]);
$map->get('addJobs', $baseUrl.'/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction',
    'auth'=> true
]);
$map->post('saveJobs', $baseUrl.'/jobs/add', [
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction',
    'auth'=> true
]);
$map->get('addUser', $baseUrl.'/user/add',[
    'controller' => 'App\Controllers\UserController',
    'action' =>'getAddUserAction',
    'auth'=> true
]);
$map->post('saveUser', $baseUrl.'/user/add',[
    'controller' => 'App\Controllers\UserController',
    'action' =>'getAddUserAction',
    'auth'=> true
]);
$map->get('logginForm', $baseUrl.'/login',[
    'controller' => 'App\Controllers\AuthController',
    'action' =>'getLogin'
]);
$map->post('auth', $baseUrl.'/auth',[
    'controller' => 'App\Controllers\AuthController',
    'action' =>'postLogin'
]);
$map->get('admin', $baseUrl.'/admin',[
    'controller' => 'App\Controllers\AdminController',
    'action' =>'getIndex',
    'auth'=> true
]);
$map->get('logout', $baseUrl.'/logout',[
    'controller' => 'App\Controllers\AuthController',
    'action' =>'getLogout'
]);
$map->get('denied', $baseUrl.'/denied',[
    'controller' => 'App\Controllers\AuthController',
    'action' =>'accesDenied'
]);
$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
function printElement($job) {
    //   if($job->visible==false){
    //     return;
    //   }
      echo '<li class="work-position">';
      echo'<h5>'.$job->title.'</h5>';
      echo'<p>'. $job->description .'</p>';
      echo '<p>'.$job->getDurationAsString().'</p>';
      echo'<strong>Achievements:</strong>';
      echo'<ul>';
      echo'<li>prueba ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo'<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo'<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
      echo'</ul>';
      echo'</li>';            
    }
    



if(!$route){
    echo 'no route';
}else{
    $handlerData=$route->handler;
    $controllerName=$handlerData['controller'];
    $actionName=$handlerData['action'];
    $needsAuth=$handlerData['auth']??false;

    $sessionUserId=$_SESSION['userId']??null;
    if($needsAuth && !$sessionUserId){
        echo 'Protected route';
        
        // new RedirectResponse('/curso-introduccion-php/denied');
        die;
    }

    $controller= new $controllerName;
    $response = $controller->$actionName($request);


    foreach ($response->getHeaders() as $name => $values) {
        foreach($values as $value){
            header(sprintf('%s: %s', $name, $value),false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();

}

