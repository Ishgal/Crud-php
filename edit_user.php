<?php

include("connection.php");
$con = conection();

$id=$_POST["id"];
$product = $_POST['product'];
$code = $_POST['code'];
$price = $_POST['price'];
$sport = $_POST['sport'];
$namec = $_POST['namec'];

$sql="UPDATE users SET product='$product', code='$code', price='$price', sport='$sport', namec='$namec' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>