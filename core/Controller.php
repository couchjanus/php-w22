<?php
require_once 'Response.php';
require_once 'View.php';
require_once 'Request.php';

class Controller
{
    public $response;
    public $request;
    private $layout;
    private View $view;

    public function __construct(string $layout, Request $request=null, Response $response=null)
    {
        $this->request = $request ?? new Request();
        $this->response = $response ?? new Response();
        $this->layout = $layout;
        $this->view = new View($this->layout);

    }

    public function render($view, $params)
    {
        $rendered = $this->view->render($view, $params);
        $this->response->setContent($rendered);
        $this->response->send();
       
    }

    public function redirect($location='')
    {
        header('Location: http://'.$_SERVER['HTTP_HOST'].$location);
        exit();
    }
}