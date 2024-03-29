<?php
include('connect.php');
$idd=$_GET['id'];
$qq="delete from members where Id='$idd'";
$res=mysqli_query($con,$qq);
if($res){
    echo "<script>alert('Record Delete'); window.location.href='read.php'; </script>";
}
else{
    echo "<script>alert('error');</script>";
}
?>