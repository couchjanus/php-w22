<?php
require_once ROOT.'/core/Controller.php';

require_once MODELS.'/User.php';

class ProfileController extends Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct('site');
    }

    public function index()
    {     
        $this->render('profile/index', []);
    }


}
