<?php

class ContactController
{
    private $title;

    public function index()
    {
        // $this->title = $title;
        $result = conf('contacts');
        $con = mysqli_connect('localhost', 'root', '', 'pecule');

        $sql = "SELECT * FROM guestbook";
        $res = mysqli_query($con, $sql);

        $items = mysqli_fetch_all($res, MYSQLI_ASSOC);

        mysqli_close($con);

        render('contact/index', [
            "result" => $result,
            'items' => $items
        ]);
       
    }

}
