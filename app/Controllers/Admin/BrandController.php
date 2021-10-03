<?php
require_once ROOT. '/core/Controller.php';
require_once MODELS.'/Brand.php';

class BrandController extends Controller
{
    public function __construct()
    {
        parent::__construct('admin');
    }

    public function index()
    {
        $brands = (new Brand())->all();
        $this->render('admin/brands/index', compact('brands'));
    }
}