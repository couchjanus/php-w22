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

];