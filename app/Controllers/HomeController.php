<?php

class HomeController
{
    private $title;

    // public function __construct($title)
    // {
    //     $this->title = $title;
    //     render('Site/home');
    // }

    public function index()
    {
        // $this->title = $title;
        render('home/index');
    }

}
