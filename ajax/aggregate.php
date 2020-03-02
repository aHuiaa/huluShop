<?php
//get the q parameter from URL
$num=$_GET["num"];
$price=$_GET['price'];

$hint=$num*$price;

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
{
    $response="no suggestion";
}
else
{
    $response=$hint;
}

//output the response
echo $response;
?>
