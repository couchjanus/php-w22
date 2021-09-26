<h2>Contact Us</h2>

<?php
if (isset($result)){
    echo "<p>Email: " . $result["email"]."</p>";
    echo "<p>Country: " . $result["country"]."</p>";
    echo "<p>Address: " . $result["address"]."</p>";
    echo "<p>City: " . $result["city"]."</p>";
    echo "<p>Mobile: " . $result["mobile"]."</p>";
}
echo "<h2>All messages</h2>";
foreach($items as $item){
   
    echo "<li>User " . $item['name'] . " sad: " . $item['message'] . "</li>";
}
