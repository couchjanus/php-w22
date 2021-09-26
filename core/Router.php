<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = ROUTER;
    }

    public function run()
    {
        foreach($this->routes as $route => $item)
        {
            if($route == uri()){
                list($prefix, $controller, $method) = $this->getController($item);

                include_once CONTROLLERS."${prefix}/${controller}.php";
                $inst = new $controller();
                $inst->$method();
                break;
            }
        }

    }

    private function getController($item):array
    {
        list($segments, $method) = explode('@', $item);

        $segments = explode('\\', $segments);
        $controller = array_pop($segments);
        $prefix = '';
        if(count($segments)>0){
            $prefix = array_pop($segments);
            $prefix = '/'. $prefix;
        }
        return [$prefix, $controller, $method];
    }
}