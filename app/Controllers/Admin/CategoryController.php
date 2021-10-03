<?php
require_once ROOT. '/core/Controller.php';
require_once MODELS.'/Category.php';

class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct('admin');
    }

    public function index()
    {
        $categories = (new Category())->all();
        $this->render('admin/categories/index', compact('categories'));
    }

    public function create()
    {
        $this->render('admin/categories/create', []);
    }

    public function store()
    {
        $status = $this->request->data['status']?1:0;
        (new Category())->save([
            'name' => $this->request->data['name'],
            'status' => $status
        ]);

        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/categories';
        header("Location:$redirect");
        
    }

}