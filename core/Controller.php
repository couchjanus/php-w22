<?php
require_once 'Response.php';
require_once 'View.php';

class Controller
{
    public $response;
    private $layout;
    private View $view;

    public function __construct(string $layout, Response $response=null)
    {
        $this->response = $response ?? new Response();
        $this->layout = $layout;
        $this->view = new View($this->layout);

    }

    public function render($view, $params)
    {
        $rendered = $this->view->render($view, $params);
        $this->response->setContent($rendered);
        $this->response->send();
        // echo $rendered;
    }


}