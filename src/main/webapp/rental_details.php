<?php
include_once('try.php');
$result = $mysqli -> query("select * from rental_details");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rental Details</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Merriweather+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300&family=Inter&family=Luxurious+Roman&family=Merriweather:ital,wght@1,300&family=Montserrat:wght@500&family=Oswald:wght@300&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <style media="screen">
      body{
        background-color: #f0f4f7;
        margin-left: 0px;
        margin-right: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        /* position: relative; */
      }

      .first{
        height: 20px;
        background-color:	#2F4F4F;
        margin-top: 0px;
        padding: 0px 0px 35px 0px;
        position: relative;
      }

      .myh4{
        color: #f0f4f7;
        margin-left: 15px;
        margin-right: 800px;
        margin-top: 10px;
        display: inline-block;
        font-family: 'Hind Siliguri', sans-serif;
      }

      .anchor{
        position: absolute;
        right: 28px;
        top: 10px;
        color: #f0f4f7;
        font-size: 1.2rem;
        font-family: 'Montserrat', sans-serif;
      }

      table{
        margin: 100px auto 80px auto;
      }

      th{
        height: 50px;
        width: 12%;
        font-size: 1.5rem;
        font-family: 'Montserrat', sans-serif;
        padding-top: 20px;
        padding-bottom: 25px;
      }

      td{
        height: 30px;
        /* width: 15%; */
        text-align: center;
        font-size: 1.3rem;
        font-family: 'Merriweather', serif;
        padding-top: 15px;
        padding-bottom: 15px;
        color:#2F4F4F;
        font-weight: bold;
      }

      table, th, td {
      border: 1px solid white;
      border-collapse: collapse;
    }
    th, td {
      background-color: 	#96D4D4;
    }

    p{
      font-size: 1.3rem;
    font-family: 'Merriweather', serif;
    letter-spacing: 1.7px;
     display: inline;
    margin-left: 690px;
    }
    span{
      font-size: 1.7rem;
      font-family: 'Montserrat', sans-serif;
      font-weight: bold;

    }

    .Copyright{
      height: 50px;
      margin-top: 267px;
      margin-bottom: 0px;
      background-color: #2F4F4F;
      position: relative;
    }

    .newh4{
      margin-bottom: 0px;
      color: #f0f4f7;
      margin-left: 15px;
      position: absolute;
      top: -10px;
      font-family: 'Hind Siliguri', sans-serif;
      /* top: 0px; */
    }

    .sbmt1{
      height: 55.3px;
      width: 12%;
      margin-top: 0px;
      background-color:#2F4F4F;
      margin-left: 12px;
      margin-right: 12px;
      border: none;
      font-size: 1.1rem;
      color:#f0f4f7;
      cursor: pointer;
      font-family: 'Montserrat', sans-serif;
    }

    .sbmt1:hover{
        background-color:#f0f4f7;
        color: #2F4F4F;
        transition: 0.2s;
    }

    .sbmt{
      display: inline;
    background-color:#f0f4f7;
    margin-left:118px;
    margin-top: 10px;
    margin-bottom: 40px;
    color: #2F4F4F;
    font-size: 20px;
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 25px;
    padding-right: 25px;
    border-radius: 20px;
    cursor: pointer;
    border-top: 2px solid #2F4F4F;
    border-left: 2px solid #2F4F4F;
    border-right: 2px solid #2F4F4F;
    border-bottom: 2px solid #2F4F4F;
    font-family: 'Montserrat', sans-serif;
    }

    .sbmt:hover{
        background-color:#2F4F4F;
        color: #f0f4f7;
        transition: 0.6s;
    }

    </style>
  </head>
  <body>
    <div class="first">
      <h4 class="myh4">Karrntls</h4>
      <a href="http://localhost/CRS_project/CRS_p/src/main/webapp/rental_details.php"><button type="button" class="sbmt1" name="button">Rental Details</button></a>
      <a href="http://localhost/CRS_project/CRS_p/src/main/webapp/vehicle_details.php"><button type="button" class="sbmt1" name="button">Vehicle Details</button></a>
      <a href="http://localhost/CRS_project/CRS_p/src/main/webapp/homepage_index.html"><button type="button" class="sbmt1" name="button">Logout</button></a>
    </div>
    <table>
         <thead>
           <th>Sno.</th>
           <th>Vehicle ID</th>
           <th>Customer Id</th>
           <th>Amount</th>
           <th>Hours</th>

         </thead>

      <tbody>
        <?php
        $count=0;
        while($rows=$result->fetch_assoc()){
          $sno=$rows['sno'];
          $vehicleID=$rows['vehicleID'];
          $custid=$rows['custid'];
          $amt=$rows['amt'];
          $hrs=$rows['hrs'];
          $count+=$amt;
         ?>
         <tr>
           <td><?php echo $sno ?></td>
           <td><?php echo $vehicleID ?></td>
           <td><?php echo $custid ?></td>
           <td><?php echo $amt ?></td>
           <td><?php echo $hrs ?></td>

         </tr>


         <?php } ?>
      </tbody>



    </table>

    <a href='http://localhost/CRS_project/CRS_p/src/main/webapp/addcar.html' style="text-decoration: none">
    <button class="sbmt">+ Add car</button>
    </a>

    <p>Total income generated: Rs.<span><?php echo $count ?></span>/-</p>

    <div class="Copyright">
     <h4 class="newh4">© Copyright Karrntls. All Rights Reserved</h4>
    </div>


  </body>
</html>
