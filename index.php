<?php include 'config.php';?>
<?php

function set_site_notice( $message, $code = 'success' ) {
    global $notices;
    
    if( ! empty( $message ) ) {
        $notices[] = array(
            'message' => $message,
            'code' => $code
        );
    }
}
function show_site_notice() {
    global $notices;
    
    if( is_array( $notices ) && count( $notices ) > 0 ) {
        echo '<div id="notice-group">';
        foreach( $notices as $notice ) {
            echo '<div class="site-notice ' . $notice['code'] . '">';
            echo '<p>' . $notice['message'] . '</p>';
            echo '</div>';            
        }
        echo '</div>';
    }
}

    
    if(isset($_POST['login']))
    {
        $user= $_POST['email_address'];
        $pass = md5($_POST['user_password']);

        $username = strip_tags(mysqli_real_escape_string($link,trim($user)));
		$password = strip_tags(mysqli_real_escape_string($link,trim($pass)));

        $sql_admin = "SELECT * FROM user where user_school_id = '".$username."' and user_login_password = '".$password."' and user_type = 'Administrator'" ;
        $result_admin = mysqli_query($link,$sql_admin) or die (mysqli_error());
        $fetch_admin = mysqli_fetch_array($result_admin);


        $sql_dean = "SELECT * FROM user where user_school_id  = '".$username."' and user_login_password = '".$password."' and user_type = 'Dean'" ;
        $result_dean = mysqli_query($link,$sql_dean) or die (mysqli_error());
        $fetch_dean = mysqli_fetch_array($result_dean);

        $sql_instructor = "SELECT * FROM user where user_school_id  = '".$username."' and user_login_password = '".$password."' and user_type = 'Instructor'" ;
        $result_instructor = mysqli_query($link,$sql_instructor) or die (mysqli_error());
        $fetch_instructor = mysqli_fetch_array($result_instructor);


        $sql_guidance = "SELECT * FROM user where user_school_id  = '".$username."' and user_login_password = '".$password."' and user_type = 'Guidance'" ;
        $result_guidance = mysqli_query($link,$sql_guidance) or die (mysqli_error());
        $fetch_guidance = mysqli_fetch_array($result_guidance);



                    if (is_array($fetch_admin)) 
                    {
                        $_SESSION['userID'] = $fetch_admin['user_school_id'];

                       
                            echo '<script type="text/javascript">';
                            echo 'alert("Successful Login \n\n  Redirecting to Admin Dashboard  ");';
                            echo 'window.location.href="dashboard.php"';
                            echo '</script>';

                    }

                    else if(is_array($fetch_dean))
                    {
                        $_SESSION['userID'] = $fetch_dean['user_school_id'];

                       
                            echo '<script type="text/javascript">';
                            echo 'alert("Successful Login \n\n  Redirecting to Deans Dashboard  ");';
                            echo 'window.location.href="dashboard.php"';
                            echo '</script>';
                    }

                    else if(is_array($fetch_instructor))
                    {
                        $_SESSION['userID'] = $fetch_instructor['user_school_id'];

                       
                            echo '<script type="text/javascript">';
                            echo 'alert("Successful Login \n\n Redirecting to Instructors Dashboard");';
                            echo 'window.location.href="dashboard.php"';
                            echo '</script>';
                    }

                    else if(is_array($fetch_guidance))
                    {
                        $_SESSION['userID'] = $fetch_guidance['user_school_id'];

                       
                            echo '<script type="text/javascript">';
                            echo 'alert("Successful Login \n\n Redirecting to Guidance Counselors Dashboard");';
                            echo 'window.location.href="dashboard.php"';
                            echo '</script>';
                    }


                    else {
                             //$message = "Invalid Credentials";
                            //  echo "<script type='text/javascript'>alert('$message');
                              //  window.location.assign('index.php')</script>"; 

                                set_site_notice('Username and/or password is incorrect.');
                        }
                    
                
        }
       
?>



<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CSD - QR Code Attendance System</title>
    <link rel="shortcut icon" href="images/csd_logo.png" type="image/x-icon">
    <link rel="icon" href="images/csdogo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/use_styles.css">
<style type="text/css">
    #notice-group {
    margin: 0 ;
    width: 100%;
    padding: 0 15px;
}
#notice-group .site-notice:not(:last-child) {
    margin-bottom: 10px;
}
.site-notice {
    padding: 10px;
    border-left: 4px solid;
    margin-left: -4%;
    margin-right: -4%;
}
.site-notice p {
    margin: 0;
}
.site-notice.success {
    color: #3c763d;
    background: #dff0d8;
    border-left-color: #3c763d;
}
.site-notice.warning {
    color: #8a6d3b;
    background: #fcf8e3;
    border-color: #8a6d3b;
}
.site-notice.error, .site-notice.danger {
    color: #a94442;
    background: #f2dede;
    border-color: #a94442;
}
.site-notice.info {
    color: #31708f;
    background: #d9edf7;
    border-color: #31708f;
}
</style>
    
    <script src="js/jquery.min.js"></script>

</head>
<body>
<main>
		<div class="container">
			<div class="row my-4">
				<div class="col-sm-12 col-md-7 col-lg-5 mx-auto" style="margin-top: 30px">
					<div class="card my-4 card-signin ace" >
						<div class="card-body"  style="margin-top:-20px;">
                                <img src="images/csd_logo.png" width="100px" height="100px" class="mx-auto d-block mt-4" alt="Ce-C Palaro 2019"><br>
                                <figcaption class="figure-caption text-center mb-4" style="color:black;font-size:18px;font-family: Rockwell;margin-bottom:30px !important">CSD - QR Code Attendance System</figcaption>
                                <?php show_site_notice(); ?><br>
                                <form method="POST">
                                    <div class="form-group">
                                        
                                        <label for="exampleInputEmail1">
                                            <input type="text" class="form-control a" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_address" style="margin-bottom: 20px;" autofocus placeholder=" " size="100">
                                            <span style="font-family:Bahnschrift">Username</span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">
                                            <input type="password" class="form-control a" id="exampleInputPassword1" name="user_password" placeholder=" " size="100">
                                            <span style="font-family:Bahnschrift">Password</span>
                                        </label>
                                        
                                    </div>
                                    <br>
                                    <center>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary btn-lg btn-block mb-4 mt-4 " onclick="removeday()" type="submit" name = "login" style="color:white;font-family: 'Rockwell'">Sign In</button>
                                        </div>
                                    </center>
                  				<hr class="my-1">
                                </form> 
						</div>
						<footer class="text-muted">
							<div class="container text-center">
                                <small id="emailHelp" class="form-text text-muted" style="font-family: Rockwell;">Computer Studies Department, 2022</small>
							</div>
                        </footer>
                                <br>
					</div>
				</div>
			</div>
		</div>
	</main>
        <div class="lds-hourglass"></div>

    <script src="js/loading.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
   <script src="js/jquery.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
        <div class="modal fade " id="modal_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                    <div class="modal-header center">
                        <h5 class="modal-title text-success " id="exampleModalLabel">Success!</h5>
                        <!--<button class="close" type="button" data-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body">Welcome, <?=$nt;?></div>
                        <div class="modal-footer">
                            <!--<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>-->
                        <!--<form method="POST">
                            <button class = "btn btn-success" type="submit" name="proceed">Okay</button>
                        </form>-->
                        </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_confirm_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"      aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header center">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Error</h5>
                        <!--<button class="close" type="button" data-dismiss="modal" aria-label="Close"></button>-->
                    </div>
                    <div class="modal-body">Invalid Credentials, Try Again!</div>
                        <div class="modal-footer">
                            <!--<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class = "btn btn-success" name="proceed">Ok</button>-->
                        </div>
                </div>
            </div>
        </div>
</html>
<?php ob_end_flush(); ?>