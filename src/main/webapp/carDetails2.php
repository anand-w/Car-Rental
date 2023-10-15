<?php
include_once('try.php');
$result = $mysqli -> query("select * from vehicle_details where vehicleID ='$_POST[radio]' ");
$result2 =$mysqli -> query("select * from current_cust");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Payment</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300&family=Inter&family=Luxurious+Roman&family=Merriweather:ital,wght@1,300&family=Montserrat:wght@500&family=Oswald:wght@300&family=Source+Sans+Pro&display=swap" rel="stylesheet">

<style media="screen">
body{
  background-color: #2F2FA2;
  margin-left:0px;
  margin-right:0px;
  margin-bottom: 0px;
}

h1{
  margin-top: 30px;
  margin-left: 60px;
  margin-bottom: 50px;
  color: #fefefa;
  font-family: 'Montserrat', sans-serif;
}

h4{
  color: #F64C72;
  margin-left: 20px;
  margin-bottom: 10px;
  font-family: 'Hind Siliguri', sans-serif;
}

.car-detail{
  background-color: #fefefa;
  height: 1040px;
  padding: 70px;
}

td{
  /* background-color: blue; */
  padding-right: 30px;
  padding-left: 30px;
  padding-top: 10px;
}

.tdata-div{
  width: 750px;
  text-align: left;
 line-height: 1.5;
}

.hr1{
  margin-top: 70px;
  margin-bottom: 90px;
  border-top: 10px dotted #2F2FA2;
  border-bottom-style: none;
  border-left-style: none;
  border-right-style: none;
  width: 6%;
  height: 0px;
}

.hr2{
  width: 7%;
  border: 2px solid #2F2FA2;
  position: absolute;
  left: 155px;
}

.car-div{
  margin-top: 15px;
}

.para{
  font-size: 1.4rem;
  color: #501B1D;
  font-family: 'Source Sans Pro', sans-serif;
  margin-bottom: 30px;
}

.img-car{
  width: 500px;
  height: 250px;
}

.carname{
font-size: 1.6rem;
}

.Journey{
/* margin-top: 40px; */
/* height: 400px; */
/* background-color: blue; */
height: 550px;
text-align: left;
position: relative;
}

li{
margin-top: 40px;
margin-bottom: 0px;
margin-left: 40px;
font-size: 1.2rem;
color: #501B1D;
font-family: 'Source Sans Pro', sans-serif;
}

h3{
 padding-top: 0px;
  margin-bottom:0px;
  font-family: 'Montserrat', sans-serif;
  font-size: 1.5rem;
  margin-left: 60px;
}

.sbmt{
background-color: 	#fefefa;
/* background-color: #2F2FA2; */
margin-left:60px;
margin-top: 20px;
position: relative;
left: 1300px;
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

.Copyright{
height: 50px;
margin-top: 20px;
padding-top: 20px;
padding-bottom: 10px;
}
</style>
</head>
<body>

<?php
while($rows=$result2->fetch_assoc()){
  $custid=$rows['custid'];
}

while($rows=$result->fetch_assoc()){
  $carname=$rows['model'];
  $ext= $rows['ex_chrg'];
  $rate= $rows['rph'];
}
$result2 =$mysqli -> query("select * from customer where custid='$custid'");
$amt=$_POST['hours']*$rate+$_POST['ex_dist']*$ext;
$mysqli -> query("insert into rental_details(vehicleID,custid,amt,hrs) values('$_POST[radio]','$custid','$amt','$_POST[hours]')");
$mysqli -> query("insert into paymentqueue values('$_POST[radio]','$custid','$amt')");


$mysqli -> query("UPDATE vehicle_details SET avail='N' WHERE vehicleID='$_POST[radio]'");
$lol=".png";
$lol1="images/";
$temp=$lol1.$_POST['radio'];
$temp=$temp.$lol;
?>

<h4>Karrntls</h4>
<h1>Your Ride is Booked!</h1>
<div class="car-detail">
  <div class="car-div">
    <table>
      <tr>
        <td><img class="img-car" src=<?php echo $temp?> alt="car-img"></td>
        <td> <div class="tdata-div">
          <p class="para">Your grand total is Rs.<span class="carname"><b><?php echo $amt?></b></span>/-.</p>
          <p class="para">
      <?php

          while($rows=$result2->fetch_assoc()){
          echo $rows['name'];
          }
           ?>, <span class="carname"><b><?php echo $carname?></b></span> will be ready nearest to your location. Thank you for choosing your ride with us. We will ensure the safety of your ride.
          Your are required to give proper valid id to our driver and should send proper video to our email id email@gmail.com for maintainence check.
          </p>
          <p class="para"> For further information kindly check your email.</p>
        </div>
          </td>
       </tr>
       </table>
       </div>
       <hr class="hr1">
       <div class="Journey">
       <h3>TERMS AND CONDITIONS</h3>
       <hr class="hr2">
       <ul>
       <li>The car must be operated and driven with great care. The renter shall be liable for all damage to the car and injury sustained by passengers caused by collision or accident, which is not paid by the insurance company of the vehicle.</li>
       <li>Damages caused when the driver is intoxicated, under the influence of drugs, or by any other cause which renders him unfit to safely drive a vehicle.</li>
       <li>In case of a collision or accident, the renter must report it instantly to law enforcement authorities and to the lessor, and must not leave the scene of the accident or collision until such action has been taken and after the police has arrived on the scene.</li>
       <li>Renter shall return the vehicle to the office of the lessor which has been agreed upon at the beginning of the rental period, along with all tires, tools, accessories and equipment in same condition as it was when received, though ordinary wear and tear is accepted. Lessor may repossess the vehicle without notice at any time if it is illegally parked, used in violation of law, against the terms of this agreement or is apparently abandoned.</li>
       <li>Smoking, consumption of alcoholic drinks and other narcotic substances in the Vehicle is prohibited.</li>
       </ul>
       <p><a href='http://localhost/CRS_project/CRS_p/src/main/webapp/finalize.php'>
       <button class="sbmt">I agree</button>
       </a></p>
       </div>

       <div class="Copyright">
       <h4>© Copyright Karrntls. All Rights Reserved</h4>
       </div>
   </div>
</body>
</html>
