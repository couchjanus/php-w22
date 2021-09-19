<?php

define('ROOT', dirname(__DIR__));

const CONTROLLERS = ROOT.'/app/Controllers';
const VIEWS = ROOT.'/app/Views';


function render($view, $params = null){
    ob_start();
    $content = renderView($view, $params);
    require_once VIEWS."/layouts/site.php";
    echo str_replace('{{content}}', $content, ob_get_clean());
}

function renderView($view, $params){
    ob_start();
    include_once VIEWS."/$view.php";
    return  ob_get_clean();
}


function uri(){
    $uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    return trim($uri, '/') ?? '';
}

switch (uri()) {
    case '':
        require_once CONTROLLERS."/HomeController.php";
        break;
    case 'catalog':
        require_once CONTROLLERS."/CatalogController.php";
        break;
    case 'cart':
        require_once CONTROLLERS."/CartController.php";
        break;    
    default:
        # code...
        break;
}
