<?php

define('ROOT', realpath(__DIR__.'/../'));

require_once 'Connection.php';

$conn = new Connection();

// $sql = " 
//     DROP TABLE IF EXISTS catagories;
//     CREATE TABLE categories(
//         id int(11) unsigned NOT NULL AUTO_INCREMENT,
//         name varchar(30) NOT NULL,
//         status tinyint(1) unsigned NOT NULL DEFAULT 1,
//         PRIMARY KEY(id) 
//     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
// ";

// $sql = " 
//     DROP TABLE IF EXISTS brands;
//     CREATE TABLE brands(
//         id int(11) unsigned NOT NULL AUTO_INCREMENT,
//         name varchar(30) NOT NULL,
//         status tinyint(1) unsigned NOT NULL DEFAULT 1,
//         PRIMARY KEY(id) 
//     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
// ";



// $sql = " 
//     DROP TABLE IF EXISTS products;
//     CREATE TABLE products(
//         id int(11) unsigned NOT NULL AUTO_INCREMENT,
//         name varchar(50) NOT NULL,
//         status tinyint(1) unsigned NOT NULL DEFAULT 1,
//         category_id int(11) unsigned, 
//         brand_id int(11) unsigned,
//         price float unsigned,
//         description text,
//         image varchar(255),
//         PRIMARY KEY(id) 
//     ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
// ";


// $conn->pdo->exec($sql);

$data = ['name'=>'Boom', 'status'=>1];
$sql = 'INSERT INTO categories(name, status) VALUES(:name, :status)';
$stmt = $conn->pdo->prepare($sql);

$stmt->execute($data);

// var_dump($conn);
echo "row created successfully";