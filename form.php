<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-image: url('https://img.freepik.com/free-vector/blue-curved-border-simple-background_53876-115364.jpg');
      color: black; /* Font color */
      font-family: Arial, sans-serif; /* Font family */
      background-size: cover;
    background-position: center;
    font-family: Arial, sans-serif;
    padding:0px;
    margin:100px;
    justify-content:center;
    text-align:center;
    font-size:25px;
    }
    form {
      margin: 20px; /* Add some margin for better spacing */
    }
    input[type="text"], select {
      width: 40%;
      padding: 12px 20px;
      margin: 9px 0;
      box-sizing: border-box;
      border: 4px solid #ccc;
      border-radius: 9px;
    }
    input[type="submit"] {
      background-color: #4CAF50; /* Green submit button */
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 9px;
      cursor: pointer;
      width: 40%;
      font-size:20px;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
    select {
      width: 40%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      background-color: white; /* Background color for select */
    }
  </style>
</head>
<body>

<h2>Record Store Form</h2>

<form action="create.php" method="POST">
  First Name:<br>
  <input type="text" name="name">
  <br>
  Role:<br>
  <?php
  include ('connect.php');
  $q="select * from role_table";
  $rows=mysqli_query($con,$q);
  echo "<select name='role'>";
  echo "<option value='' disabled selected>Select an option</option>";
  while($data = mysqli_fetch_assoc($rows)){ 
    echo "<option value='$data[Id]'>$data[Role_Name]</option>\n";
  }
  echo "</select>";
  ?>

  <br><br>
  <input type="submit" name="subbtn" value="Submit">
</form> 

</body>
</html>
