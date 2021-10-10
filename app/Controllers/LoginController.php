<?php
require_once ROOT.'/core/Controller.php';

require_once MODELS.'/User.php';

class LoginController extends Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct('site');
    }

    public function index()
    {     
        $this->render('auth/login', []);
    }

    private function checkUser($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $user = (new User)->getBy($sql);
        if($user){
            if(password_verify($password, $user->password)){
                return $user->id;
            }
        }
        return false;
    }

    public function signIn()
    {
        if(Session::get('Logged')){
            $this->redirect('/profile');
        }
        $userId = $this->checkUser($this->request->data['email'], $this->request->data['password']);

        if(!$userId){
            $this->redirect('/login');
        }
        $user = (new User)->get($userId);
        Session::set('userId', $user->id);
        Session::set('Logged', true);
        $this->redirect('/profile');
    }

    public function signOut()
    {
        if(Session::get('Logged')){
            Session::destroy();
            $this->redirect('/');
        }
       
    }


}
