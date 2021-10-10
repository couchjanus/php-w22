<?php
require_once ROOT.'/core/Controller.php';
require_once MODELS.'/Product.php';
require_once MODELS.'/Category.php';
require_once MODELS.'/Brand.php';

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

    public function getProducts(){
        $sql = "SELECT products.*, categories.name as category, categories.id as categoryId FROM products
        INNER JOIN categories
        ON categories.id = products.category_id
        WHERE products.status = 1
        ";
        $products = (new Product)->run($sql);
        echo json_encode($products);
    }
  

}
