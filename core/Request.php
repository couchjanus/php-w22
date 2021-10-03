<?php

class Request
{
    public $data = [];
    public function __construct()
    {
        $this->data = $this->prepareData($_REQUEST, $_FILES);

    }

    private function prepareData(array $post, array $files)
    {
        $post = $this->cleanInput($post);
        return array_merge($files, $post);
    }

    private function cleanInput($data)
    {
        if (is_array($data)){
            $cleaned = [];
            foreach($data as $key => $value){
                $cleaned[$key] = $this->cleanInput($value);
            }
            return $cleaned;
        }
        return trim(htmlspecialchars($data, ENT_QUOTES));
    }
}