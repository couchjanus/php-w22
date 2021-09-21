<?php

define('ROOT', dirname(__DIR__));

const CONTROLLERS = ROOT.'/app/Controllers';
const VIEWS = ROOT.'/app/Views';
const APP_ENV = 'dev';
const LOGS = ROOT.'/logs';

function render($view, $params = null){
    ob_start();
    $content = renderView($view, $params);
    require_once VIEWS."/layouts/site.php";
    echo str_replace('{{content}}', $content, ob_get_clean());
}

function renderView($view, $params){
    if($params){
        extract($params);
    }
    ob_start();
    include_once VIEWS."/$view.php";
    return  ob_get_clean();
}


function uri(){
    $uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    return trim($uri, '/') ?? '';
}


function setErrorLogging(){
    if (APP_ENV == 'dev'){
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL | E_WARNING | E_PARSE | E_NOTICE | E_DEPRECATED);
        ini_set('display_erors', 1);
    }elseif(APP_ENV == 'prod'){
        error_reporting(E_ALL);
        ini_set('display_errors', "0");
    }else{
        ini_set('display_startup_errors', "1");
        error_reporting(E_ALL | E_WARNING | E_PARSE);
        ini_set('display_erors', 1);
    }

    ini_set('log_errors', "On");
    // echo ini_get('log_errors');
    ini_set('error_log', LOGS.'/errors.log');
}

function init(){
    date_default_timezone_set('Europe/Kiev');
    ini_set('date.timezone', 'Europe/Kiev');
    setlocale(LC_ALL, 'uk_UA');
    setErrorLogging();

}

init();
// error_log('This is test error');

function conf($mix){
    $url = ROOT."/config/${mix}.json";
    if(file_exists($url)){
        $jf = file_get_contents($url);
        return json_decode($jf, true);
    }else{
        echo "File does not exista";
    }
}

$routes = require_once ROOT.'/config/routes.php';
// var_dump($routes);
$result = false;

foreach($routes as $route => $item){
    if($route == uri()){
        $result = true;
        include_once CONTROLLERS."/${item}";
        break;
    }
}

if(!$result){
    echo "<h1>404: Oops, Page not found!</h1>";
    error_log('404: Oops, Page not found');
}
