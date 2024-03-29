<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 130px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            height:350px;
            font-size:20px;
        }

        input[type="text"], select, input[type="submit"] {
            width: 100%;
            padding: 20px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size:20px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>




<?php
include('connect.php');
$iid=$_GET['Id'];
$qu="Select * from members join role_table on members.Role=role_table.Id where members.Id='$iid'";
$rows=mysqli_query($con,$qu);
$data=mysqli_fetch_assoc($rows);
$rolename= $data['Role_Name'];
$names=$data['Name'];
echo $rolename;

?>

<form action="" method="POST">
  First name:<br>
  <input type="text" name="nam" value="<?php echo $names;  ?>">
  <br>
Role:<br>
<?php
$q="select * from role_table";
$rows=mysqli_query($con,$q);
echo "<select name='role'>";
while($data = mysqli_fetch_assoc($rows))
{ 
    
    echo "<option value='$data[Id]' ";
    if($rolename == $data['Role_Name']) {
      echo "selected='selected'";
    }
    echo ">$data[Role_Name]</option>\n";
}
echo "</select>";
?>

<br><br>
  <input type="submit" name="subbtn" value="Submit">
</form> 

<?php
if(isset($_POST['subbtn'])){
$newName=$_POST['nam'];
$newRole=$_POST['role'];
$q="update members set Name='$newName',Role='$newRole' where Id='$iid'";
$res=mysqli_query($con,$q);
if($res){
echo "<script> alert('Done Editing'); window.location.href='read.php';</script>";
}
else
{
echo "<script> alert('error'); </script>";
}
}

?>