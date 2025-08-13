<?php

use CodeIgniter\CodeIgniter;

function activate_menu($controller, $function = null)
{
    
    $router = service('router');

    $class = basename($router->controllerName());

    if($function)
    {
        $method = $router->methodName();
        return ($method == $function && $class == $controller) ? 'active' : '';
    }
    
    return ($class == $controller) ? 'active' : '';
}
?>