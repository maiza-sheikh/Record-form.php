<?php
include('connect.php');
if(isset($_POST["subbtn"]))
{
$n=$_POST["name"];
$r=$_POST["role"];
$q="insert into members(Name,Role) values ('$n','$r')";
$result=mysqli_query($con,$q);
if($result)
{
echo "<script> alert('done'); window.location.href='read.php';</script>";
}
else
{
echo "retry";
}


}
?>