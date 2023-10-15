<?php
include_once('try.php');
if($_POST['brand'] ==null)
$result = $mysqli -> query("select * from vehicle_details where city ='$_POST[city]' and NOP>='$_POST[nop]' and RPH<='$_POST[price]' and avail='Y'");
else $result = $mysqli -> query("select * from vehicle_details where city ='$_POST[city]' and NOP>='$_POST[nop]' and RPH<='$_POST[price]' and model='$_POST[brand]' and avail='Y'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Car details </title>
	<meta charset="UTF-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300&family=Inter&family=Luxurious+Roman&family=Merriweather:ital,wght@1,300&family=Montserrat:wght@500&family=Oswald:wght@300&display=swap" rel="stylesheet">
	<style media="screen">
  body{
    background-color: #2F2FA2;
    margin-left:0px;
    margin-right:0px;
    margin-bottom: 0px;
  }

  table-div{
    line-height:2;
  }

  h4{
    color: #F64C72;
    margin-left: 20px;
    margin-bottom: 10px;
    font-family: 'Hind Siliguri', sans-serif;
  }

  h3{
     padding-top: 60px;
      margin-bottom:0px;
      font-family: 'Montserrat', sans-serif;
      font-size: 1.5rem;
      margin-left: 60px;
  }

  h1{
    margin-top: 60px;
    margin-left: 60px;
    color: #fefefa;
    font-family: 'Montserrat', sans-serif;
  }

  .para1{
    color: #fffff0;
    font-family: 'Merriweather', serif;
    margin-left:60px;
  }

  .table{
    margin: 50px 0px 50px 0px;

  }

  .tdataimg{

    width: 20%;
    height: 20%;
  }

  td{
    text-align: center;
    padding: 10px;
    font-size: 2rem;
    font-family: 'Oswald', sans-serif;

  }

  .imgcar{
    width: 60%;
    height: 60%;
  }

  .even{
    margin: 20px 0px 20px 0px;
    background-color: #242582;
    color: #fffff0;
  }

  .odd{
    margin: 20px 0px 20px 0px;
    background-color: #553D67;
    color: #fffff0;
  }

  .Journey{
    margin-top: 100px;
    height: 400px;
    background-color: #fefefa;
    text-align: left;
    position: relative;
  }

  hr{
    width: 5%;
    border: 2px solid #2F2FA2;
    margin-bottom: 0px;
    position: absolute;
    left: 120px;
  }

  .journey-div{
margin-top: 70px;
line-height: 2;
margin-left: 60px;
width: 50%;
  }

  .journey-para{
  font-size: 1rem;
  color: #501B1D;
  font-family: 'Inter', sans-serif;
  margin-bottom: 30px;
  }

  .place{
    margin: 10px 3px 10px 0px;
    font-size: 16px;
  }
 /* .sbmt{
   background-color: 	#32CD32;
   color: #fefefa;
   font-size: 20px;
   padding: 10px 24px;
   border-radius: 12px;
 } */

 .Copyright{
   height: 50px;
   margin-top: 20px;
 }

 .sbmt{
 background-color: 	#fefefa;
 /* background-color: #2F2FA2; */
 margin-left:0px;
 margin-top: 20px;
 position: relative;
 left: 10px;
 color: #2F2FA2;
 font-size: 20px;
 /* padding: 10px 24px;
 border-radius: 12px; */
 padding-top: 12px;
 padding-bottom: 12px;
 padding-left: 25px;
 padding-right: 25px;
 border-radius: 20px;
 cursor: pointer;

 border-top: 2px solid #2F2FA2;
 border-left: 2px solid #2F2FA2;
 border-right: 2px solid #2F2FA2;
 border-bottom: 2px solid #2F2FA2;
 }

 .sbmt:hover{
     background-color:#2F2FA2 ;
     color: #fefefa;
     transition: 0.6s;
 }

	</style>

</head>
<body>
  <h4>Karrntls</h4>
  <div class="table-div">
 <h1>Based on your Search.</h1>
 <p class="para1">These are the results we found. </p>
 <div class="table">
  <table>
	<form action="http://localhost/CRS_project/CRS_p/src/main/webapp/carDetails2.php" method="post" >
	<tbody>
	<?php
  $count=2;
  $lol=".png";
  $lol1="images/";
while($rows=$result->fetch_assoc())
	{
	?>
  <?php if($count%2==0){
    $tt=$rows['vehicleID'];
    $temp=$lol1.$tt;
    $temp=$temp.$lol;
   ?>
			<tr class="even">
        <td class="tdataimg"><img class="imgcar" src=<?php echo $temp?> alt="car-img"></td>
				<td><?php echo $rows['model']; ?></td>
				<td><?php echo $rows['fueltype']; ?></td>
				<td><?php echo $rows['NOP']; ?> 👥</td>
				<td><?php echo $rows['gear']; ?></td>
				<td>Rs.<?php echo $rows['rph']; ?>/hr</td>
				<td>Rs.<?php echo $rows['ex_chrg']; ?>/km</td>
				<td><input type="radio" name="radio" value= <?php echo $rows['vehicleID']?> checked></td>
			</tr>
<?php } ?>
<?php if($count%2){
  $tt=$rows['vehicleID'];
  $temp=$lol1.$tt;
  $temp=$temp.$lol;
   ?>
  <tr class="odd">
    <td class="tdataimg"><img class="imgcar" src=<?php echo $temp?> alt="car-img"></td>
    <td><?php echo $rows['model']; ?></td>
    <td><?php echo $rows['fueltype']; ?></td>
    <td><?php echo $rows['NOP']; ?> 👥</td>
    <td><?php echo $rows['gear']; ?></td>
    <td>Rs.<?php echo $rows['rph']; ?>/hr</td>
    <td>Rs.<?php echo $rows['ex_chrg']; ?>/km</td>
    <td><input type="radio" name="radio" value= <?php echo $rows['vehicleID']?> checked></td>
  </tr>
<?php } ?>

		<?php
    $count++;
	}
	?>
			 </tbody>
		 		</table>
      </div>
       </div>

       <div class="Journey">
         <h3>JOURNEY DETAILS</h3>
          <hr>
          <div class="journey-div">
          <p class="journey-para">Please select the car which you find best for you. Please take note of cost per hour of the car and per kilometer charge of the car (on extending the journey beyond 150km).</p>
						 <input class="place"  type="number" name="hours" placeholder="Number of hours " required>
						 <input class="place"  type="number" name="ex_dist" placeholder="Excess distance" required>
					   <input class="sbmt" type="submit" value="submit">
				</form>
      </div>
   </div>
   <div class="Copyright">
    <h4>© Copyright Karrntls. All Rights Reserved</h4>
   </div>
</body>
</html>
