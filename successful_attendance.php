<?php include 'session_select.php'; ?>
<?php include 'logout_session.php'; ?>
<?php include 'session_destroyer.php'; ?>
<?php include 'header_links.php';?>

<?php
			

            $faculty_school_id = $_SESSION['session_id'];
            $faculty_school_year = $_SESSION['session_school_year'];
            $faculty_semester = $_SESSION['session_semester'];
            $fullcourse_name = $_SESSION['rsq2'];
            $sched_in = $_SESSION['in_s'];
            $sched_out = $_SESSION['out_s'];

            $id_in_school = $_SESSION['idext'];


	$sql_query1 = "SELECT * FROM attendance_report where faculty_school_id = '".$_SESSION['session_id']."' and school_id = '".$id_in_school."'";
           	$result = mysqli_query($link, $sql_query1);
           	for($i = 0; $i < $num_rows=mysqli_fetch_array($result); $i++){

           			$school_id_2 = $num_rows['school_id'];
           	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Success Attendance</title>
</head>
<body>
	<main>
		<div class="container">
			<div class="row my-5">
				<div class="col-sm-10 mx-auto">
					<div class="card mx-auto" >
                        <div class="card-body">
                         	<form action="" method="POST"class="form-horizontal">
                         		<center>
	                            	<img src="images/user.png" width="350px" height="350px">
	                            </center>
	                            <br><br>
	                            <input type="text" name="text" id="text" readonly="" width="100%" placeholder="Place your QR to Webcam" class="form-control" hidden>
	                            <div class="form-label-group mx-auto">
	                            
	                            <h1 style="margin-left: 83px;">Student ID: <text style="color:red"><?php echo $id_in_school; ?></text></h1>
	                            </div>
	                            <h1 class="" >Student Name: <text style="color:red">Casabuena, Jhon Ace</text></h1>
	                            <!--<p class="" style="font-size:20px;text-align: center;color:black;">Class Name: <b style="color:red"><?php echo $_SESSION['rsq2'];?></b></p>-->
	                            <br><br>
	                        </form>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>

