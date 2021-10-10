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
        if(array_key_exists(uri(), $this->routes)){
            return $this->init(...$this->getController($this->routes[uri()]));
        } else {
            foreach ($this->routes as $key => $value) {
                $pattern = "@^".preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key)."$@";
                preg_match($pattern, uri(), $matches);
                array_shift($matches);
                if ($matches) {
                    $params = $this->getController($value);
                    $params[] = $matches;
                    return $this->init(...$params);
                }
            }
            return '<h1>404 Not Found</h1>';
        }
    }

    private function getController(string $item):array
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

    private function init($path, $controller, $action, $params=[]){
        $path = CONTROLLERS . $path .'/'. $controller . '.php';
        include_once $path;
        $controller = new $controller();
        return $controller->$action($params);
    }
}