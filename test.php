<?php

$con = mysqli_connect('localhost', 'root', '', 'pecule');

// $sql = <<<EOT

//     CREATE TABLE guestbook(
//         id int NOT NULL AUTO_INCREMENT,
//         name varchar(25) NOT NULL,
//         email varchar(30) NOT NULL,
//         message text NOT NULL,
//         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//         PRIMARY KEY(id)
//     );

// EOT;

// $sql = <<<EOT

//     INSERT INTO guestbook(name, email, message) 
//     VALUES ('Funny Cat', 'cat@my.gog', 'Hello Cats');

// EOT; 

$sql = "SELECT * FROM guestbook";
$result = mysqli_query($con, $sql);
if($result){
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    var_dump($items);
}else{
   echo mysqli_error();
}

mysqli_close($con);