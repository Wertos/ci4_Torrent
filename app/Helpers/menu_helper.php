<?php

use CodeIgniter\CodeIgniter;

function activate_menu($controller, $function = null)
{
    
    $router = service('router');

    $class = basename($router->controllerName());

    if($function)
    {
        $method = $router->methodName();
        return ($method == $function && $class == $controller) ? 'active fw-semibold' : '';
    }
    
    return ($class == $controller) ? 'active fw-semibold' : '';
}

function setActive($uriCheck)
{
	 $request = service('request');
   $uri = service('uri');//$request->getUri();
        
//   $uriSegment = $uri->getSegment( $uri->getTotalSegments() );
   $uriSegment = $uri->getPath();
//   var_dump($uriSegment);die('fff');
   if ( $uriCheck == $uriSegment ) {

        return "active fw-semibold";

   }
}

?>