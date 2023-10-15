<?php
include_once('try.php');
$result = $mysqli -> query("select * from current_cust");
while($rows=$result->fetch_assoc()){
  $custid=$rows['custid'];
}
$result=$mysqli -> query("select * from customer where custid='$custid'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vehicle Search </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login200">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/im.jpeg" alt="IMG">
				</div>

				<form action="http://localhost/CRS_project/CRS_p/src/main/webapp/index4.php" method="post" class="login100-form validate-form">
					Welcome, <?php
				  while($rows=$result->fetch_assoc()){
				    echo $rows['name'];
				  }
				   ?>
					<span class="login200-form-title">
						Vehicle Search Page
					</span>

          <div class="wrap-input100 validate-input" >
            <input class="input100" type="text" name="city" placeholder="City" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="nop" placeholder="Number of Passengers" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" >
            <input class="input100" type="text" name="price" placeholder="Price" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="brand" placeholder="Brand(Optional)">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <input class="container-login100-form-btn login100-form-btn" type="submit"  value="Search">
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<!-- <script src="vendor/bootstrap/js/popper.js"></script> -->
	<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!===============================================================================================-->
	<!-- <script src="vendor/select2/select2.min.js"></script> -->
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script> -->

</body>
</html>
