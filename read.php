
     <style>
        body {
            font-family: Arial, sans-serif;
            justify-content:center;
            text-align:center;
            padding: 20px;
            font-size:30px;
           
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        input[type="text"], input[type="submit"] {
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
            width: 15%;
            height:40px;
            font-size:20px;
        }


        input[type="submit"] {
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a.button {
            text-decoration: none;
            background-color: #008CBA;
            color: white;
            padding: 8px 10px;
            border-radius: 3px;
        }

        a.button:hover {
            background-color: #005f7e;
        }
    </style>



<?php
include('connect.php');
$query="Select members.Id,members.Name,role_table.Role_Name from members  join role_table on members.Role=role_table.Id";
if(isset($_GET['searchbtn']))
{
$searchtext=$_GET['search'];
$query="Select members.Id,members.Name,role_table.Role_Name from members join role_table on members.Role=role_table.Id where members.Name='$searchtext' or role_table.Role_Name='$searchtext'";

}

$rows=mysqli_query($con,$query);


 
?>
<h4>Check Your records</h4>
<form action="" method="GET">
<input type="text" name="search">
<input type="submit" name="searchbtn" Value="Search">
<a href="read.php"><input type="submit" name="reset" Value="Reset"></a>
<br>

</form>
<a href="Form.php"><input type="submit" Value="Add new Record"></a>

<br>

<hr>
<table border=1>
<tr>
<th> id </th>
<th> Name </th>
<th> Role</th>
<th> Edit </th>
<th> Delete </th>
</tr>
<?php
while($data=mysqli_fetch_assoc($rows)){
echo "
<tr>
<td>".$data['Id']."</td>
<td>".$data['Name']."</td>
 <td>".$data['Role_Name']."</td>
<td><a href='Update.php?Id=$data[Id]'>Edit</a></td>
<td><a href='Delete.php?id=$data[Id]'>Delete</a></td>
</tr>";
}
?>
</table>