<?php
$json = ROOT."/config/contacts.json";

$rjson = file_get_contents($json);

var_dump($rjson);