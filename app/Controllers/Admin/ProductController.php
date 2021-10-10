<?php
require_once ROOT. '/core/Controller.php';
require_once MODELS.'/Product.php';
require_once MODELS.'/Brand.php';
require_once MODELS.'/Category.php';

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct('admin');
    }

    public function index()
    {
        $products = (new Product())->all();
        $this->render('admin/products/index', compact('products'));
    }

    public function create()
    {
        $brands = (new Brand())->all();
        $categories = (new Category())->all();
        $this->render('admin/products/create', compact('brands', 'categories'));
    }

    public function store()
    {
        $productImage = $this->uploadImage();

        $status = $this->request->data['status']?1:0;
        (new Product())->save([
            'name' => $this->request->data['name'],
            'description' => $this->request->data['description'],
            'price' => $this->request->data['price'],
            'category_id' => $this->request->data['category_id'],
            'brand_id' => $this->request->data['brand_id'],
            'image' => $productImage,
            'status' => $status
        ]);

        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
        header("Location:$redirect");
        
    }

    private function fileName($name)
    {
        return sha1(mt_rand(1, 9999).$name.uniqid()).time();
    }

    private function uploadImage(){
        if(!empty($this->request->data['image'])){
            $fileName = $this->fileName($this->request->data['image']['name']);
            if(move_uploaded_file($this->request->data['image']['tmp_name'], STORAGE.'/'.$fileName)){
                return "http://".$_SERVER['HTTP_HOST']."/storage/uploads/".$fileName;
            }
        }
        return false;
    }

    public function edit($params = []){
        extract($params);
       
        $product = (new Product())->get($id);
        $this->render('admin/products/edit', compact('product'));
    }

    public function update(){
        $status = $this->request->data['status']?1:0;
        (new Product())->update($this->request->data['id'],
        [
            'name' => $this->request->data['name'],
            'status' => $status
        ]);
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/products';
        header("Location:$redirect");
    }

    public function delete($params){

    }

}