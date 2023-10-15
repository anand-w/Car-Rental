<?php
include_once('try.php');
$result = $mysqli -> query("select * from current_cust");
while($rows=$result->fetch_assoc()){
  $custid=$rows['custid'];
}
$result=$mysqli -> query("select * from customer where custid='$custid'");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Home</title>
</head>
<body>
  <h3>Welcome, <?php
  while($rows=$result->fetch_assoc()){
    echo $rows['name'];
  }
   ?></h3>
<form action ="http://localhost/CRS_project/CRS_p/src/main/webapp/index.php" method="post">
	<table>
	  <tr>
     <td>City*</td>
     <td><input type="text" name="city" required/></td>
    </tr>
	<tr>
     <td>Number of passengers*</td>
     <td><input type="text" name="nop" required/></td>
    </tr>
    <tr>
     <td>Max Price*</td>
     <td><input type="text" name="price" required/></td>
    </tr>
    <tr>
     <td>Brand</td>
     <td><input type="text" name="brand"/></td>
    </tr>
    </table>
    <input type="submit" >
</form>

</body>
</html>
