<?php

function conf(?string $key):mixed
{
    return (require_once ROOT."/config/app.php")[$key];
}