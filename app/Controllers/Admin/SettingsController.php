<?php


class SettingsController
{
    private $contacts;

    public function __construct()
    {
      $this->contacts = conf('contacts');
    }

    public function index()
    {
        render('admin/contact/index', [
            "result" => $this->contacts,
           
        ]);
       
    }

    public function update()
    {
      if($_POST){
        $formData = [
            'email' => $_POST['email'],
            'country' => $_POST['country'],
            'address' => $_POST['address'],
            'city' => $_POST['city'],
            'mobile' => $_POST['mobile'],
    
        ];
    
        $json = json_encode($formData);
    
        $url = ROOT."/config/contacts.json";
        if(file_put_contents($url, $json)){
            $redirect = "http://".$_SERVER['HTTP_HOST'].'/admin/settings';
            header("Location: $redirect");
            exit();
        }else{echo "error saved file";}
    }

    }

}





?>

