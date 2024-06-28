<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller
        $controllerName = ucfirst($url[0] ?? '') ?: $this->controller; 
        $controllerFile = '../app/controllers/' . $controllerName . '.php';
        if(file_exists($controllerFile)) {
            require_once $controllerFile;
            if(class_exists($controllerName)) {
                $this->controller = new $controllerName;
                unset($url[0]);
            }
        }

        // method
        if(isset($url[1])) {
            $methodName = $url[1];
            if(method_exists($this->controller, $methodName)) {
                $this->method = $methodName;
                unset($url[1]);
            }
        }

        // params
        $this->params = $url ? array_values($url) : [];


        // call method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return [];
    }
}
