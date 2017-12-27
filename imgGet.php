<?php

session_start();
require('dbconnect.php');


$output2=sprintf("SELECT file_name, file_content FROM  Bboard3 ");
$posts=$mysqli->query($output2);
foreach($posts as $post){
}

header("Content-Type: image/$post[0]");


echo $post[1];
?>