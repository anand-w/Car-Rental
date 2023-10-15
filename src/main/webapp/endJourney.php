<?php
include_once('try.php');
$result = $mysqli -> query("select * from current_cust");
while($rows=$result->fetch_assoc()){
  $custid=$rows['custid'];
}
$result2 = $mysqli -> query("select * from paymentqueue where custid='$custid'");

while($rows=$result2->fetch_assoc()){
  $vehicleID=$rows['vehicleID'];
}
$mysqli -> query("update vehicle_details set avail='Y' where vehicleID='$vehicleID'");
$mysqli -> query("delete from paymentqueue where custid='$custid'");
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
      .img{
        padding: 60px 0px 60px 0px;
        position: relative;
        right: 3px;
      }

      h4{
        color: #F64C72;
        margin-left: 20px;
        margin-bottom: 10px;
        font-family: 'Hind Siliguri', sans-serif;
      }

    .tdatadiv{
      width: 92%;
      line-height: 1.5;
    }

      .para1{
        margin-top: 30px;
        margin-left: 60px;
        margin-bottom: 50px;
        color: #fefefa;
        font-size: 3rem;
        font-family: 'Montserrat', sans-serif;
      }

      .para2{
        color: #fff0f5;
        margin-top: 30px;
        margin-left: 60px;
        margin-bottom: 50px;
        font-size: 1.5rem;
        font-family: 'Merriweather', serif;
      }

      .para3{
        text-align: left;
      }

      .sbmt{
        /* background-color: 	#32CD32; */
        background-color: #2F2FA2;
        /* border: 90px; */
        border-top: 2px solid #f0f8ff;
        border-left: 2px solid #f0f8ff;
        border-right: 2px solid #f0f8ff;
        border-bottom: 2px solid #f0f8ff;
        margin-left:60px;
        margin-top: 20px;
        color: #fefefa;
        font-size: 20px;
        /* padding: 10px 24px; */
        padding-top: 12px;
        padding-bottom: 12px;
        padding-left: 25px;
        padding-right: 25px;
        border-radius: 20px;
        cursor: pointer;
      }

      .sbmt:hover{
          background-color:#fefefa ;
          color: #2F2FA2;
          transition: 0.6s;
      }


    </style>
  </head>
  <body>
    <h4>Karrntls</h4>
    <table>
      <tr>
        <td class="tdataimg"><img class="img" src="images/handshake.png" alt=""></td>
        <td><div class="tdatadiv">
          <p class="para1">Thank you for choosing your ride for the journey from us.</p>
          <p class="para2">For Further details, visit our website.</p>
          <p class="para3"><a href='http://localhost/CRS_project/CRS_p/src/main/webapp/homepage_index.html'>
            <button class="sbmt">Book a ride</button>
            </a></p>
        </div>
        </td>
      </tr>
    </table>

  </body>
</html>
