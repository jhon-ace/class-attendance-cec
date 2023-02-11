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

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Attendance Portal</title>
		<script type="text/javascript" src="camera/adapter.min.js"></script>
    <script type="text/javascript" src="camera/vue.min.js"></script>
    <script type="text/javascript" src="camera/instascan.min.js"></script>
</head>
<body>
	<main>
		<div class="container">
			<div class="row my-5">
				<div class="col-sm-10 mx-auto">
					<div class="card mx-auto" >
                        <div class="card-body">
                            <figcaption class="figure-caption text-center mb-4" style="color:black;font-size:30px;font-family: Rockwell;margin-bottom:30px !important">Classroom Attendance</figcaption>
                         	<form action="insert_qr_attendance.php" method="POST"class="form-horizontal">
	                            <center><video id="preview" width="600px" height="400px"></p><br>
	                            	//<img src="images/user.png" width="100px" height="100px">
	                            </center>
	                            <br><br>
	                            <input type="text" name="text" id="text" readonly="" width="100%" placeholder="Place your QR to Webcam" class="form-control" hidden>
	                            <div class="form-label-group mx-auto">
	                            
	                           	<h1></h1>
	                            <p class="" style="font-size:20px;text-align: center;color:black;">Class Name: <b style="color:red"><?php echo $_SESSION['rsq2'];?><br></p>
	                        </form>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script>
	           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
	           Instascan.Camera.getCameras().then(function(cameras){
	               if(cameras.length > 0 ){
	                   scanner.start(cameras[0]);
	               } else{
	                   alert('No cameras found');
	               }

	           }).catch(function(e) {
	               console.error(e);
	           });

	           scanner.addListener('scan',function(c){
	               document.getElementById('text').value=c;
	               document.forms[0].submit();
	           });

	</script>

</body>
</html>

