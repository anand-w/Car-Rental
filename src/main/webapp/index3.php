<?php
include_once('try.php');
// $result = $mysqli -> query("select * from vehicle_details");
if($_POST['brand'] ==null)

$result = $mysqli -> query("select * from vehicle_details where city ='$_POST[city]' and NOP>='$_POST[nop]' and RPH<='$_POST[price]' and avail='Y'");
      // $result = $mysqli -> query("select * from vehicle_details where city ='$_POST[city]' and NOP>='$_POST[nop]' and RPH<='$_POST[price]' ");
else $result = $mysqli -> query("select * from vehicle_details where city ='$_POST[city]' and NOP>='$_POST[nop]' and RPH<='$_POST[price]' and model='$_POST[brand]' and avail='Y'");
// $result = $mysqli -> query("select * from vehicle_details where city ='$_POST[city]'and NOP='$_POST[nop]' and RPH<='$_POST[price]'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/index2.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Saira+Condensed:wght@500&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="css/util.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
	<style media="screen">
		.content-table{
			border-collapse: collapse;
			margin: 25px 0;
			font-size: 0.9em;
			min-width: 400px;
		}

		.content-table thead tr{
			background: linear-gradient(-135deg, #c850c0, #4158d0);
			color: #ffffff;
		 text-align: left;
		 font-weight: bold;

		}

		.content-table th,
		.content-table td{
			padding: 12px 15px;


		}

		.content-table tbody tr{
			border-bottom: 1px solid #dddddd;

		}
		.container-login100-form-btn {
		  display: flex;
		  flex-wrap: wrap;
		  justify-content: center;
		  padding-top: 20px;
		}

		.login100-form-btn {
		  font-family: Montserrat-Bold;
		  font-size: 15px;
		  line-height: 1.5;
		  color: #fff;
			margin-left:280px;
		  text-transform: uppercase;
		  width: 30%;
			text-align: center;
		  height: 50px;
		  border-radius: 25px;
		  background: #57b846;
		  align-items: center;
		  padding: 0 25px;
		}
    .even{
      background-color:#FFF5E1 ;
      color: #781C68;
      font-family: 'Saira Condensed', sans-serif;
      font-size: 18px;

    }
    .odd{
      	background-color:#FFD39A;
        color:  #9A0680;
        font-family: 'Saira Condensed', sans-serif;
        font-size: 18px;
    }
    .searchres{
      font-family: 'PT Serif', serif;
      color: #000957;
      font-size: 2.1rem;
    }

    .tablehead{
      
    }

	</style>

</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login200">
<h3 class="searchres">Based on your search result:</h3>
<table class="content-table">
		<thead class="tablehead">
			<tr>
				<th>Vehicle ID</th>
				<th>Model</th>
				<th>fuel type</th>
				<th>NOP</th>
				<th>Avail</th>
				<th>gear</th>
				<th>RPH</th>
				<th>eC</th>
				<th>input</th>
			</tr>
		</thead>
	<form action="http://localhost/CRS_project/CRS_p/src/main/webapp/carDetails.php" method="post" >
	<tbody>
	<?php
  $count=2  ;
while($rows=$result->fetch_assoc())
	{
	?>
  <?php if($count%2==0){
   ?>
			<tr class="even">
				<td ><?php echo $rows['vehicleID']; ?></td>
				<td><?php echo $rows['model']; ?></td>
				<td><?php echo $rows['fueltype']; ?></td>

				<td><?php echo $rows['NOP']; ?></td>

				<td><?php echo $rows['avail']; ?></td>

				<td><?php echo $rows['gear']; ?></td>
				<td><?php echo $rows['rph']; ?></td>
				<td><?php echo $rows['ex_chrg']; ?></td>
				<td><input type="radio" name="radio" value= <?php echo $rows['vehicleID']?> checked></td>
			</tr>
<?php } ?>
<?php if($count%2){ ?>
  <tr class="odd">
    <td ><?php echo $rows['vehicleID']; ?></td>
    <td><?php echo $rows['model']; ?></td>
    <td><?php echo $rows['fueltype']; ?></td>

    <td><?php echo $rows['NOP']; ?></td>

    <td><?php echo $rows['avail']; ?></td>

    <td><?php echo $rows['gear']; ?></td>
    <td><?php echo $rows['rph']; ?></td>
    <td><?php echo $rows['ex_chrg']; ?></td>
    <td><input type="radio" name="radio" value= <?php echo $rows['vehicleID']?> checked></td>
  </tr>
<?php } ?>

		<?php
    $count++;
	}
	?>
			 </tbody>
		 		</table>

					<div class="wrap-input100 validate-input">
						 <input type="number" name="hours" placeholder="Number of hours " required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input type="number" name="ex_dist" placeholder="Excess distance" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
						</span>
					</div>
					<input class="container-login100-form-btn login100-form-btn" type="submit" value="submit">
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
