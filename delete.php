<?php
$con =mysqli_connect("localhost","root","","testdb");
if(!$con){
    echo "connect nhi hua";
}

$del=$_GET['del'];

$query =mysqli_query($con,"delete from practice where id='$del'");
if($query){
    header("location:insert.php");
}
else{
    echo "nhi hua";
}
?>