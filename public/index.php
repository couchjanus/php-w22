<?php

// http://shop.my/

// ip 127.0.0.4 server http response

// ip 127.0.0.1 clent request http://shop.my/
 
// `ip``0.0.0.0 inet

// var_dump($_SERVER);

// var_dump($_SERVER['REQUEST_URI']);

$uri = $_SERVER['REQUEST_URI'];

// /

// about

// contact
// >= <= != ==

function view($y, $x=NULL)
{
    // operator fubction 
    echo "<h1>$y</h1>";
    var_dump($_SERVER['REQUEST_URI']);
    echo '<hr>';
}

// if($uri == '/'){
//     $content = "Home page";
//     view($content, $uri);
// }elseif($uri == '/about'){
//     $content = "About page";
//     view($content, $uri);
// }elseif($uri == '/contact'){
//     $content = "Contact page";
//     view($content, $uri); 
// }else{
//     $content = "<h1>Error page</h1><h1>404</h1><hr>";
//     view($content); 
// }

?>

<?php if($uri == '/'): view("Home page"); ?>
    <h2>Alt sintacsys</h2>
    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima debitis fugiat sunt voluptatibus facilis esse omnis eveniet dolores hic tempora molestias, veritatis consequatur provident dolore optio pariatur accusamus corporis consectetur?</div>
<?php elseif($uri == '/about'): view("About page"); ?>
    <h2>Alt sintacsys</h2>
    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima debitis fugiat sunt voluptatibus facilis esse omnis eveniet dolores hic tempora molestias, veritatis consequatur provident dolore optio pariatur accusamus corporis consectetur?</div>
<?php elseif($uri == '/contact'): view("Contact page"); ?>
    <h2>Alt sintacsys</h2>
    <div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima debitis fugiat sunt voluptatibus facilis esse omnis eveniet dolores hic tempora molestias, veritatis consequatur provident dolore optio pariatur accusamus corporis consectetur?</div>
<?php else: view("<h1>Error page</h1><h1>404</h1><hr>")?>
<?php endif?>
