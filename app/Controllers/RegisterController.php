<?php
require_once ROOT.'/core/Controller.php';

require_once MODELS.'/User.php';

class RegisterController extends Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct('site');
    }

    public function index()
    {     
        $this->render('auth/register', []);
    }

    public function signOn()
    {
        $password = $this->request->data['password'];
        $confirmpassword = $this->request->data['confirmpassword']; 

        if($this->is_valid($password, $confirmpassword)){

            list($name, $dom) = explode('@',  $this->request->data['email']);
            $hash = password_hash($password, PASSWORD_BCRYPT);
            (new User)->save(['name'=>$name, "email"=>$this->request->data['email'], 'password'=>$hash]);
            $this->redirect('/login');

        }else{
            $this->redirect('/register');

        }
    }

    private function is_valid($p, $c){
        if($p != $c){
            return false;
        }
        return true;
    }
   
  

}
