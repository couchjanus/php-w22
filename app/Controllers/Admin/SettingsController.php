<?php

$result = conf('contacts');

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
        $redirect = "http://".$_SERVER['HTTP_HOST'].'/contact';
        header("Location: $redirect");
        exit();
    }else{echo "error saved file";}
}


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<div class="container">
<form method="POST">
<div class="card border-success mb-3 mx-auto">
  <div class="card-header bg-transparent border-success">Edit</div>
  <div class="card-body text-success">
    <h5 class="card-title">Change contact info</h5>
    <p class="card-text">
     
 
    <div class="row mb-3">
  <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
  <div class="col-sm-10">
    <input type="email" name="email" class="form-control form-control-sm" id="colFormLabelSm" value="<?=$result['email']?>">
  </div>
</div>
<div class="row mb-3">
  <label for="colFormLabel" class="col-sm-2 col-form-label">Country</label>
  <div class="col-sm-10">
    <input type="text" name="country" class="form-control" id="colFormLabel" value="<?=$result['country']?>">
  </div>
</div>
<div class="row">
  <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Address</label>
  <div class="col-sm-10">
    <input type="text" name="address" class="form-control form-control-lg" id="colFormLabelLg" value="<?=$result['address']?>">
  </div>
</div>
<div class="row">
  <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">City</label>
  <div class="col-sm-10">
    <input type="text" name="city" class="form-control form-control-lg" id="colFormLabelLg" value="<?=$result['city']?>">
  </div>
</div>
<div class="row">
  <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Mobile</label>
  <div class="col-sm-10">
    <input type="text" name="mobile" class="form-control form-control-lg" id="colFormLabelLg" value="<?=$result['mobile']?>">
  </div>
</div>
    </p>
  </div>
  <div class="card-footer bg-transparent border-success"><button class="btn btn-primary" type="submit">Save change</button></div>
</div>
</form>
</div>

