<?php
return 
[
    '' => 'HomeController@index' ,
    'catalog' => 'CatalogController@index' ,
    'cart' => 'CartController@index' ,
    'about' => 'AboutController@index' ,
    'admin' => 'Admin\DashboardController@index' ,
    'admin/settings' => 'Admin\SettingsController@index' ,
    'admin/settings/update' =>  'Admin\SettingsController@update',
    'contact' => 'ContactController@index' ,

    'admin/brands' => 'Admin\BrandController@index' ,


    'admin/categories' => 'Admin\CategoryController@index' ,
    'admin/categories/create' => 'Admin\CategoryController@create' ,
    'admin/categories/store' => 'Admin\CategoryController@store' ,

    'admin/categories/edit/{id}' => 'Admin\CategoryController@edit' ,
    'admin/categories/update' => 'Admin\CategoryController@update' ,
    'admin/categories/delete/{id}' => 'Admin\CategoryController@delete' ,

    
    'admin/products' => 'Admin\ProductController@index' ,
    'admin/products/create' => 'Admin\ProductController@create' ,
    'admin/products/store' => 'Admin\ProductController@store' ,

    'admin/products/edit/{id}' => 'Admin\ProductController@edit' ,
    'admin/products/update' => 'Admin\ProductController@update' ,
    'admin/products/delete/{id}' => 'Admin\ProductController@delete' ,

    'api/products' => 'HomeController@getProducts',


    'register' => 'RegisterController@index',
    'sign-on' => 'RegisterController@signOn',

    'login' => 'LoginController@index',
    'sign-in' => 'LoginController@signIn',
    'sign-out' => 'LoginController@signOut',
    'profile' => 'ProfileController@index',
];

