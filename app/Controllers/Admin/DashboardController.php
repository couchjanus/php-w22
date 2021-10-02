<?php
require_once ROOT.'/core/Controller.php';

class DashboardController extends Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct('admin');
    }

    public function index()
    {
        $this->title = 'Dashboard';
        $this->render('admin/index', ['title' => $this->title]);
    }

}
