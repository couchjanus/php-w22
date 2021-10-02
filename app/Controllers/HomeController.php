<?php
require_once ROOT.'/core/Controller.php';

class HomeController extends Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct('site');
    }

    public function index()
    {
        $this->title = 'Home Page';
        $this->render('home/index', ['title' => $this->title]);
    }

}
