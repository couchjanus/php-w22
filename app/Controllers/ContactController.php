<?php
$result = conf('contacts');

render('Site/contact/index', [
    "result" => $result[0]
]);