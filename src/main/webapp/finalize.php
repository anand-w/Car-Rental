<?php
include_once('try.php');
$result = $mysqli -> query("select * from current_cust");
while($rows=$result->fetch_assoc()){
  $custid=$rows['custid'];
}
$result = $mysqli -> query("select * from paymentqueue where custid='$custid'");

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Receipt</title>
    <link rel="stylesheet" href="css/Reciept.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300&family=Inter&family=Luxurious+Roman&family=Merriweather:ital,wght@1,300&family=Montserrat:wght@500&family=Oswald:wght@300&family=Source+Sans+Pro&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
       <div class="container">
         <div class="navigation">
           <div class="logo">
             <i class="icon icon-basket"></i><span class="name">Karrntls</span></div>
           <div class="secure">
             <!-- <i class="icon icon-shield"></i> -->

             <!-- <a style="text-decoration: none" href="#"> -->
             <button type="button" class="sbmt">Download Receipt</button>
               <!-- <span class="dwnld">Download Receipt</span></a> -->

           </div>
         </div>
         <div class="notification">
          <span class="span-class">Complete Your Purchase.</span>
         </div>
       </div>
     </header>
    <?php
    while($rows=$result->fetch_assoc()){
      $vehicleID=$rows['vehicleID'];
      $amt=$rows['amt'];
    }
    // $mysqli -> query("insert into paymentqueue values('$vehicleID','$custid','$amt')");
    ?>
  <?php
    $result3=$mysqli -> query("select * from customer where custid='$custid'");
    while($rows=$result3->fetch_assoc()){
      $name=$rows['name'];
      $dob=$rows['dob'];
      $email=$rows['email'];
      $mob=$rows['mobile'];
    }

    $result4=$mysqli -> query("select * from vehicle_details where vehicleID='$vehicleID'");

    while($rows=$result4->fetch_assoc()){
      $model=$rows['model'];
      $city=$rows['city'];
      $fueltype=$rows['fueltype'];
      $nop=$rows['NOP'];
      $gear=$rows['gear'];
    }

?>

     <section class="content">

       <div class="container">

       </div>
       <div class="details shadow">
         <div class="details__item">

           <div class="item__image">
             <?php
            $temp="images/";
            $x=".png";
            $temp=$temp.$vehicleID;
            $temp=$temp.$x;
              ?>
             <img class="car-img" src=<?php echo $temp ?> alt="car's img">
           </div>
           <div class="item__details">
             <div class="item__title">
               <?php echo $model ?>
             </div>
             <!-- <div class="item__price">
               Rs. 720
             </div> -->
             <div class="item__quantity">
               Rs.<span class="span-price"><b><?php echo $amt ?></b></span>/-
             </div>
             <div class="item__description">
               <ul style="">
                 <!-- <li><span class="span-list1">Model</span>: <span class="span-list2"><b>Alto</b></span></li> -->
                 <li><span class="span-list1">Gear type</span>: <span class="span-list2"><b><?php echo $gear?></b></span></li>
                 <li><span class="span-list1">Fuel type</span>: <span class="span-list2"><b><?php echo $fueltype?></b></span></li>
                 <li><span class="span-list1">Number of Passengers</span>: <span class="span-list2"><b><?php echo $nop?></b></span></li>
                 <li><span class="span-list1">Location</span>: <span class="span-list2"><b><?php echo $city ?></b></span></li>
                 <li><span class="span-list1">Four Wheeler</span></li>
               </ul>

             </div>

           </div>
         </div>

       </div>
       <div class="discount"></div>

       <div class="container">
         <div class="payment">
           <div class="payment__title">
             Payment Method
           </div>
           <div class="payment__types">
             <div class="payment__type payment__type--cc active">
               <i class="icon icon-credit-card"></i>Credit Card</div>
             <div class="payment__type payment__type--paypal">
               <i class="icon icon-paypal"></i>Paypal</div>
             <div class="payment__type payment__type--paypal">
               <i class="icon icon-wallet"></i>SEPA</div>
             <div class="payment__type payment__type--paypal">
               <i class="icon icon-note"></i>Invoice</div>
           </div>

           <div class="payment__info">
             <div class="payment__cc">
               <div class="payment__title">
                 <i class="icon icon-user"></i>Personal Information
               </div>
               <form>
                 <div class="form__cc">
                   <div class="row">
                     <div class="field">
                       <div class="title">Credit Card Number
                       </div>
                       <input type="text" class="input txt text-validated" value="4542 9931 9292 2293" />
                     </div>
                   </div>
                   <div class="row">
                     <div class="field small">
                       <div class="title">Expiry Date
                       </div>
                       <select class="input ddl">
                         <option selected>01</option>
                         <option>02</option>
                         <option>03</option>
                         <option>04</option>
                         <option>05</option>
                         <option>06</option>
                         <option>07</option>
                         <option>08</option>
                         <option>09</option>
                         <option>10</option>
                         <option>11</option>
                         <option>12</option>
                       </select>
                       <select class="input ddl">
                         <option>01</option>
                         <option>02</option>
                         <option>03</option>
                         <option>04</option>
                         <option>05</option>
                         <option>06</option>
                         <option>07</option>
                         <option>08</option>
                         <option>09</option>
                         <option>10</option>
                         <option>11</option>
                         <option>12</option>
                         <option>13</option>
                         <option>14</option>
                         <option>15</option>
                         <option selected>16</option>
                         <option>17</option>
                         <option>18</option>
                         <option>19</option>
                         <option>20</option>
                         <option>21</option>
                         <option>22</option>
                         <option>23</option>
                         <option>24</option>
                         <option>25</option>
                         <option>26</option>
                         <option>27</option>
                         <option>28</option>
                         <option>29</option>
                         <option>30</option>
                         <option>31</option>
                       </select>
                     </div>
                     <div class="field small">
                       <div class="title">CVV Code
                         <span class="numberCircle">?</span>
                       </div>
                       <input type="text" class="input txt" />
                     </div>
                   </div>
                   <div class="row">
                     <div class="field">
                       <div class="title">Name on Card
                       </div>
                       <input type="text" class="input txt" />
                     </div>
                   </div>

                 </div>
               </form>
             </div>
             <div class="payment__shipping">
               <div class="payment__title">
                 <i class="icon icon-plane"></i> Shiping Information
               </div>
               <div class="details__user">
                 <div class="user__name"><?php echo $name?>
                   <br> <?php echo $dob?></div>
                 <div class="user__address"><?php echo $email?>
                   <br><?php echo $mob?></div>
               </div>

             </div>
           </div>
         </div>
       </div>
       <div class="container">
         <div class="actions">

           <a href="http://localhost/CRS_project/CRS_p/src/main/webapp/endJourney.php" class="btn action__submit">Make payment
             <i class="icon icon-arrow-right-circle"></i>
           </a>
           <a href="http://localhost/CRS_project/CRS_p/src/main/webapp/homepage_index.html" class="backBtn">Go Back to Home</a>

         </div>
     </section>
     <div class="Copyright">
      <h4>© Copyright Karrntls. All Rights Reserved</h4>
     </div>
     </div>

<!-- <p><a href='http://localhost/CRS_project/CRS_p/src/main/webapp/endJourney.php'>
<button>Return Car</button>
</a></p> -->
  </body>
</html>
