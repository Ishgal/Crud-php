<?php 
include('connection.php');
$con = conection();

$id=null;
$name=$_POST['product'];
$lastname=$_POST['code'];
$username=$_POST['price'];
$password=$_POST['sport'];
$email=$_POST['namec'];

$sql="INSERT INTO users VALUES('$id','$name','$lastname','$username','$password','$email')";
$query=mysqli_query($con, $sql);
if($query){
    Header("Location: index.php");
}else{

}
?>