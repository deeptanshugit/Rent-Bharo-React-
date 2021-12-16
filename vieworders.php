<?php

$jsondata = file_get_contents("order.json");
$json = json_decode($jsondata,true);
$output = "<ul>";
foreach($json['order'] as $order){
    $output .= "<h4>".$order['Product']."</h4>";
    $output .= "<li>".$order['Payment Mode']."</li>";
    $output .= "<li>".$order['Delivery Date']."</li>";
    $output .= "<li>".$order['Order Id']."</li>";
}
$output .= "</ul>";
echo $output;
?>