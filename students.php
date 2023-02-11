<?php
include 'config.php';
$user = $_SESSION['usr']; 

if(isset($_POST['logout']))
{
    session_destroy();
    header('location:index.php');
    
}

if(empty($_SESSION['usr']))
{
    header('location:index.php');
}
?>

<!doctype html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="images/cec_logo.png" type="image/x-icon">
        <title>CSD - Classroom Attendance</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css"/>
            <link rel="stylesheet" href="css/use_styles.css">
    </head>
    <body>
        
        <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar" style="background-color: #373333 !important" class="">
                <div class="p-4 pt-5 sticky-top">
                    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/cec_logo.png);"></a>
                        <p style="margin-top:-20px;text-align:center;">Welcome, <text style="color:red;text-decoration:underline"><?=$user;?></text></p><br>
                            <ul class="list-unstyled components mb-5">
                                <li>
                                    <a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                                </li>
                                <li  class="active">
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-users" aria-hidden="true"></i> Students
                                    </a>
                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                        <li  class="active">
                                            <a href="students.php"><i class="fa fa-user" aria-hidden="true"></i> List of All Students</a>
                                        </li>

                                        <li>
                                            <a href="students-csd.php"><i class="fa fa-user" aria-hidden="true"></i> Computer Studies Department</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#faculty" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-users" aria-hidden="true"></i> Instructor
                                    </a>
                                    <ul class="collapse list-unstyled" id="faculty">
                                        <li>
                                            <a href="instructor_csd.php"><i class="fa fa-user" aria-hidden="true"></i> Computer Studies Department</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Liberal Arts Department</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Maritime Department</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#courses" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-users" aria-hidden="true"></i> Course
                                    </a>
                                    <ul class="collapse list-unstyled" id="courses">
                                        <li>
                                            <a href="course_csd.php"><i class="fa fa-user" aria-hidden="true"></i> Computer Studies Department</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Liberal Arts Department</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Maritime Department</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-flag" aria-hidden="true"></i> Reports</a>
                                </li>
                                <li>
                                    <a href="#settingsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-cogs" aria-hidden="true"></i> Settings
                                    </a>
                                        <ul class="collapse list-unstyled" id="settingsMenu">
                                            <li>
                                                <a href="#">Page 1</a>
                                            </li>
                                            <li>
                                                <a href="#">Page 2</a>
                                            </li>
                                            <li>
                                                <a href="#">Page 3</a>
                                            </li>
                                        </ul>
                                </li>
                                <li>
                                    <a href="" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out" ></i> Logout</a>
                                </li>
                            </ul>
                       <div class="footer text-center" style="margin-top:-30px">
                            <p id='ct6' style="color:#FF9200;text-align: center;"></p>
                            <hr class="my-auto" style="border: 0; border-top: 1px solid #ccc;">
                            <p style="margin-top: 10px;">This system was made by Computer Studies Department</p>
                        </div>
                </div>
            </nav>

        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-8">
        <nav class="navbar navbar-light studentRef">
            <div class="container-fluid">
                <div class="col">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </button> 
                </div> 
                    <a href="students.php" class = "btn btn-info" type='button' style="float: right;margin-top: 0px;" >
                        <i class="fa fa-refresh fa-10x"></i>
                    </a>
            </div>
        </nav>

        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ GRADE 11 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
            <div class="card-content table"><br>
                <center><b><p>LIST OF ALL STUDENTS</p></b></center>

                <div class="container-fluid text">   
                    <button class = "btn btn-info" type='button' data-toggle="modal" data-target="#add_student_grade11" style="float: right;margin-left: 5px;margin-top: 0px;" ><i class="fa fa-user-plus fa-10x"></i>
                    </button>&nbsp;
                    <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>GRADE 11</b></p>
                </div>
                <div class="card-content table-responsive">
                    <table id="grade11" class="table table-hover  flex-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>School ID</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Year</th>
                                <th>Program</th>
                                <th>Department</th>
                                <th>QR Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--<tbody>
                           <?php
                           
                                    
                                    
                                    $sql = mysqli_query($link,"SELECT * FROM students where stud_year = 'G-11' ORDER BY stud_lastname ASC");
                                
                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                        $i_d = $num_rows['stud_id'];
                                        $stud_idd = $num_rows['school_id'];
                                        $stud_fname = $num_rows['stud_firstname'];
                                        $stud_lname = $num_rows['stud_lastname'];
                                        $dept = $num_rows['stud_department'];
                                        $stud_year = $num_rows['stud_year'];
                                        $stud_program = $num_rows['stud_program'];
                                        $stud_status = $num_rows['stud_image'];
                                        $stud_qrcode = $num_rows['stud_qrcode'];



                                        ?>
                                      

                                        <tr>
                                            <td style='display:none;'><?=$i_d;?></td>
                                            <td></td>
                                            <td><?=$stud_idd;?></td>
                                            <td><a href="" style="color:black;"><i class='fa fa-image' style='color:black;'></i></a></td>
                                            <td ><?=$stud_lname;?></td>
                                            <td><?=$stud_fname;?></td>
                                            <td><?=$stud_year;?></td>
                                            <td><?=$stud_program;?></td>
                                            <td><?=$dept;?></td>
                                            <td><?=$stud_qrcode;?></td>
                                            <td>
                                                <button type='button' class='btn-success editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-pencil-square-o' style='color:white'></i>
                                                </button>
                                                <button type='button' class='btn-danger editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-unlock-alt' style='color:white'></i>
                                                </button>
                                            </td>
                                        </tr>
                                  <?php  } ?>
                        </tbody>--->
                    </table>
                </div>
            </div>
            <br> &nbsp;
        </ul> <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  END OF GRADE 11 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  GRADE 12  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
            <div class="card-content table">
                <div class="container-fluid text">   
                    <button class = "btn btn-info" type='button' data-toggle="modal" data-target="#add_student_grade11" style="float: right;margin-left: 5px;margin-top: 0px;" ><i class="fa fa-user-plus fa-10x"></i>
                    </button>&nbsp;
                    <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>GRADE 12</b></p>
                </div>
                <div class="card-content table-responsive">
                    <table id="grade12" class="table table-hover  flex-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>School ID</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Year</th>
                                <th>Program</th>
                                <th>Department</th>
                                <th>QR Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--<tbody>
                           <?php
                           
                                    
                                    
                                    $sql = mysqli_query($link,"SELECT * FROM students where stud_year = 'G-12' ORDER BY stud_lastname ASC");
                                
                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                        $i_d = $num_rows['stud_id'];
                                        $stud_idd = $num_rows['school_id'];
                                        $stud_fname = $num_rows['stud_firstname'];
                                        $stud_lname = $num_rows['stud_lastname'];
                                        $dept = $num_rows['stud_department'];
                                        $stud_year = $num_rows['stud_year'];
                                        $stud_program = $num_rows['stud_program'];
                                        $stud_status = $num_rows['stud_image'];
                                        $stud_qrcode = $num_rows['stud_qrcode'];



                                        ?>
                                      

                                        <tr>
                                            <td style='display:none;'><?=$i_d;?></td>
                                            <td></td>
                                            <td><?=$stud_idd;?></td>
                                            <td><a href="" style="color:black;"><i class='fa fa-image' style='color:black;'></i></a></td>
                                            <td ><?=$stud_lname;?></td>
                                            <td><?=$stud_fname;?></td>
                                            <td><?=$stud_year;?></td>
                                            <td><?=$stud_program;?></td>
                                            <td><?=$dept;?></td>
                                            <td><?=$stud_qrcode;?></td>
                                            <td>
                                                <button type='button' class='btn-success editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-pencil-square-o' style='color:white'></i>
                                                </button>
                                                <button type='button' class='btn-danger editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-unlock-alt' style='color:white'></i>
                                                </button>
                                            </td>
                                        </tr>
                                  <?php  } ?>
                        </tbody>--->
                    </table>
                </div>
            </div>
            <br> &nbsp;
        </ul><!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  END OF GRADE 12 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  1ST YEAR  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
            <div class="card-content table">
                <div class="container-fluid text">   
                    <button class = "btn btn-info" type='button' data-toggle="modal" data-target="#add_student_grade11" style="float: right;margin-left: 5px;margin-top: 0px;" ><i class="fa fa-user-plus fa-10x"></i>
                    </button>&nbsp;
                    <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>1ST YEAR</b></p>
                </div>
                <div class="card-content table-responsive">
                    <table id="1styr" class="table table-hover  flex-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>School ID</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Year</th>
                                <th>Program</th>
                                <th>Department</th>
                                <th>QR Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--<tbody>
                           <?php
                           
                                    
                                    
                                    $sql = mysqli_query($link,"SELECT * FROM students where stud_year = '1ST-YEAR' ORDER BY stud_lastname ASC");
                                
                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                        $i_d = $num_rows['stud_id'];
                                        $stud_idd = $num_rows['school_id'];
                                        $stud_fname = $num_rows['stud_firstname'];
                                        $stud_lname = $num_rows['stud_lastname'];
                                        $dept = $num_rows['stud_department'];
                                        $stud_year = $num_rows['stud_year'];
                                        $stud_program = $num_rows['stud_program'];
                                        $stud_status = $num_rows['stud_image'];
                                        $stud_qrcode = $num_rows['stud_qrcode'];



                                        ?>
                                      

                                        <tr>
                                            <td style='display:none;'><?=$i_d;?></td>
                                            <td></td>
                                            <td><?=$stud_idd;?></td>
                                            <td><a href="" style="color:black;"><i class='fa fa-image' style='color:black;'></i></a></td>
                                            <td ><?=$stud_lname;?></td>
                                            <td><?=$stud_fname;?></td>
                                            <td><?=$stud_year;?></td>
                                            <td><?=$stud_program;?></td>
                                            <td><?=$dept;?></td>
                                            <td><?=$stud_qrcode;?></td>
                                            <td>
                                                <button type='button' class='btn-success editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-pencil-square-o' style='color:white'></i>
                                                </button>
                                                <button type='button' class='btn-danger editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-unlock-alt' style='color:white'></i>
                                                </button>
                                            </td>
                                        </tr>
                                  <?php  } ?>
                        </tbody>--->
                    </table>
                </div>
            </div>
            <br> &nbsp;
        </ul><!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  END OF 1ST YEAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  2ND YEAR  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
            <div class="card-content table">
                <div class="container-fluid text">   
                    <button class = "btn btn-info" type='button' data-toggle="modal" data-target="#add_student_grade11" style="float: right;margin-left: 5px;margin-top: 0px;" ><i class="fa fa-user-plus fa-10x"></i>
                    </button>&nbsp;
                    <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>2ND YEAR</b></p>
                </div>
                <div class="card-content table-responsive">
                    <table id="2ndyr" class="table table-hover  flex-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>School ID</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Year</th>
                                <th>Program</th>
                                <th>Department</th>
                                <th>QR Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--<tbody>
                           <?php
                           
                                    
                                    
                                    $sql = mysqli_query($link,"SELECT * FROM students where stud_year = '2ND-YEAR' ORDER BY stud_lastname ASC");
                                
                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                        $i_d = $num_rows['stud_id'];
                                        $stud_idd = $num_rows['school_id'];
                                        $stud_fname = $num_rows['stud_firstname'];
                                        $stud_lname = $num_rows['stud_lastname'];
                                        $dept = $num_rows['stud_department'];
                                        $stud_year = $num_rows['stud_year'];
                                        $stud_program = $num_rows['stud_program'];
                                        $stud_status = $num_rows['stud_image'];
                                        $stud_qrcode = $num_rows['stud_qrcode'];



                                        ?>
                                      

                                        <tr>
                                            <td style='display:none;'><?=$i_d;?></td>
                                            <td></td>
                                            <td><?=$stud_idd;?></td>
                                            <td><a href="" style="color:black;"><i class='fa fa-image' style='color:black;'></i></a></td>
                                            <td ><?=$stud_lname;?></td>
                                            <td><?=$stud_fname;?></td>
                                            <td><?=$stud_year;?></td>
                                            <td><?=$stud_program;?></td>
                                            <td><?=$dept;?></td>
                                            <td><?=$stud_qrcode;?></td>
                                            <td>
                                                <button type='button' class='btn-success editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-pencil-square-o' style='color:white'></i>
                                                </button>
                                                <button type='button' class='btn-danger editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-unlock-alt' style='color:white'></i>
                                                </button>
                                            </td>
                                        </tr>
                                  <?php  } ?>
                        </tbody>--->
                    </table>
                </div>
            </div>
            <br> &nbsp;
        </ul><!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  END OF 2ND YEAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  3RD YEAR  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
            <div class="card-content table">
                <div class="container-fluid text">   
                    <button class = "btn btn-info" type='button' data-toggle="modal" data-target="#add_student_grade11" style="float: right;margin-left: 5px;margin-top: 0px;" ><i class="fa fa-user-plus fa-10x"></i>
                    </button>&nbsp;
                    <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>3RD YEAR</b></p>
                </div>
                <div class="card-content table-responsive">
                    <table id="3rdyr" class="table table-hover  flex-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>School ID</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Year</th>
                                <th>Program</th>
                                <th>Department</th>
                                <th>QR Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--<tbody>
                           <?php
                           
                                    
                                    
                                    $sql = mysqli_query($link,"SELECT * FROM students where stud_year = '3RD-YEAR' ORDER BY stud_lastname ASC");
                                
                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                        $i_d = $num_rows['stud_id'];
                                        $stud_idd = $num_rows['school_id'];
                                        $stud_fname = $num_rows['stud_firstname'];
                                        $stud_lname = $num_rows['stud_lastname'];
                                        $dept = $num_rows['stud_department'];
                                        $stud_year = $num_rows['stud_year'];
                                        $stud_program = $num_rows['stud_program'];
                                        $stud_status = $num_rows['stud_image'];
                                        $stud_qrcode = $num_rows['stud_qrcode'];



                                        ?>
                                      

                                        <tr>
                                            <td style='display:none;'><?=$i_d;?></td>
                                            <td></td>
                                            <td><?=$stud_idd;?></td>
                                            <td><a href="" style="color:black;"><i class='fa fa-image' style='color:black;'></i></a></td>
                                            <td ><?=$stud_lname;?></td>
                                            <td><?=$stud_fname;?></td>
                                            <td><?=$stud_year;?></td>
                                            <td><?=$stud_program;?></td>
                                            <td><?=$dept;?></td>
                                            <td><?=$stud_qrcode;?></td>
                                            <td>
                                                <button type='button' class='btn-success editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-pencil-square-o' style='color:white'></i>
                                                </button>
                                                <button type='button' class='btn-danger editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-unlock-alt' style='color:white'></i>
                                                </button>
                                            </td>
                                        </tr>
                                  <?php  } ?>
                        </tbody>--->
                    </table>
                </div>
            </div>
            <br> &nbsp;
        </ul><!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  END OF 3RD YEAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


              <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  4TH YEAR  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

        <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
            <div class="card-content table">
                <div class="container-fluid text">   
                    <button class = "btn btn-info" type='button' data-toggle="modal" data-target="#add_student_grade11" style="float: right;margin-left: 5px;margin-top: 0px;" ><i class="fa fa-user-plus fa-10x"></i>
                    </button>&nbsp;
                    <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>4TH YEAR</b></p>
                </div>
                <div class="card-content table-responsive">
                    <table id="4thyr" class="table table-hover  flex-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>School ID</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Year</th>
                                <th>Program</th>
                                <th>Department</th>
                                <th>QR Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!--<tbody>
                           <?php
                           
                                    
                                    
                                    $sql = mysqli_query($link,"SELECT * FROM students where stud_year = '4TH-YEAR' ORDER BY stud_lastname ASC");
                                
                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                        $i_d = $num_rows['stud_id'];
                                        $stud_idd = $num_rows['school_id'];
                                        $stud_fname = $num_rows['stud_firstname'];
                                        $stud_lname = $num_rows['stud_lastname'];
                                        $dept = $num_rows['stud_department'];
                                        $stud_year = $num_rows['stud_year'];
                                        $stud_program = $num_rows['stud_program'];
                                        $stud_status = $num_rows['stud_image'];
                                        $stud_qrcode = $num_rows['stud_qrcode'];



                                        ?>
                                      

                                        <tr>
                                            <td style='display:none;'><?=$i_d;?></td>
                                            <td></td>
                                            <td><?=$stud_idd;?></td>
                                            <td><a href="" style="color:black;"><i class='fa fa-image' style='color:black;'></i></a></td>
                                            <td ><?=$stud_lname;?></td>
                                            <td><?=$stud_fname;?></td>
                                            <td><?=$stud_year;?></td>
                                            <td><?=$stud_program;?></td>
                                            <td><?=$dept;?></td>
                                            <td><?=$stud_qrcode;?></td>
                                            <td>
                                                <button type='button' class='btn-success editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-pencil-square-o' style='color:white'></i>
                                                </button>
                                                <button type='button' class='btn-danger editbtn' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-unlock-alt' style='color:white'></i>
                                                </button>
                                            </td>
                                        </tr>
                                  <?php  } ?>
                        </tbody>--->
                    </table>
                </div>
            </div>
            <br> &nbsp;
        </ul> <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~  END OF 4TH YEAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    </div>
</div>
  
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script src="jquery-3.5.1.js"></script>
    <script src="jquery.dataTables.min.js"></script>
    <script src="dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        /* Formatting function for row details - modify as you need */
        function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        '<img src="'+d.stud_image+'" height="300px" width="300px" />'+
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#grade11').DataTable({
                processing: true,
                ajax: "grade11_studentsAjax.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [1,] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'stud_id' },
                    { data:'school_id' },
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname' },
                    { data:'stud_year' },
                    { data: 'stud_program' },
                    { data: 'stud_department' },
                    { data: 'stud_qrcode' },
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_student_grade11" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp;<a class="" data-toggle="modal" data-target="" style="border-radius:4px"><i class="fa fa-unlock-alt" style="color:red;cursor:pointer"></i></a>'
                            ;

                      }}
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#grade11 tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

         
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });


        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ GRADE 12 ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        /* Formatting function for row details - modify as you need */
        function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        '<img src="'+d.stud_image+'" height="300px" width="300px" />'+
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#grade12').DataTable({
                processing: true,
                ajax: "grade12_studentsAjax.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [1,] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'stud_id' },
                    { data:'school_id' },
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname' },
                    { data:'stud_year' },
                    { data: 'stud_program' },
                    { data: 'stud_department' },
                    { data: 'stud_qrcode' },
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_student_grade11" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp;<a class="" data-toggle="modal" data-target="" style="border-radius:4px"><i class="fa fa-unlock-alt" style="color:red;cursor:pointer"></i></a>'
                            ;

                      }}
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#grade12 tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

         
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });


        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 1ST YEAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        /* Formatting function for row details - modify as you need */
        function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        '<img src="'+d.stud_image+'" height="300px" width="300px" />'+
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#1styr').DataTable({
                processing: true,
                ajax: "1styear_studentsAjax.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [1,] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'stud_id' },
                    { data:'school_id' },
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname' },
                    { data:'stud_year' },
                    { data: 'stud_program' },
                    { data: 'stud_department' },
                    { data: 'stud_qrcode' },
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_student_grade11" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp;<a class="" data-toggle="modal" data-target="" style="border-radius:4px"><i class="fa fa-unlock-alt" style="color:red;cursor:pointer"></i></a>'
                            ;

                      }}
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#1styr tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

         
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });

        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 2ND YEAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        /* Formatting function for row details - modify as you need */
        function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        '<img src="'+d.stud_image+'" height="300px" width="300px" />'+
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#2ndyr').DataTable({
                processing: true,
                ajax: "2ndyear_studentsAjax.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [1,] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'stud_id' },
                    { data:'school_id' },
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname' },
                    { data:'stud_year' },
                    { data: 'stud_program' },
                    { data: 'stud_department' },
                    { data: 'stud_qrcode' },
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_student_grade11" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp;<a class="" data-toggle="modal" data-target="" style="border-radius:4px"><i class="fa fa-unlock-alt" style="color:red;cursor:pointer"></i></a>'
                            ;

                      }}
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#2ndyr tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

         
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 3RD YEAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        /* Formatting function for row details - modify as you need */
        function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        '<img src="'+d.stud_image+'" height="300px" width="300px" />'+
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#3rdyr').DataTable({
                processing: true,
                ajax: "3rdyear_studentsAjax.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [1,] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'stud_id' },
                    { data:'school_id' },
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname' },
                    { data:'stud_year' },
                    { data: 'stud_program' },
                    { data: 'stud_department' },
                    { data: 'stud_qrcode' },
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_student_grade11" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp;<a class="" data-toggle="modal" data-target="" style="border-radius:4px"><i class="fa fa-unlock-alt" style="color:red;cursor:pointer"></i></a>'
                            ;

                      }}
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#3rdyr tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

         
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });

        /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 4TH YEAR ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

        /* Formatting function for row details - modify as you need */
        function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        '<img src="'+d.stud_image+'" height="300px" width="300px" />'+
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#4thyr').DataTable({
                processing: true,
                ajax: "4thyear_studentsAjax.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [1,] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'stud_id' },
                    { data:'school_id' },
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname' },
                    { data:'stud_year' },
                    { data: 'stud_program' },
                    { data: 'stud_department' },
                    { data: 'stud_qrcode' },
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_student_grade11" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp;<a class="" data-toggle="modal" data-target="" style="border-radius:4px"><i class="fa fa-unlock-alt" style="color:red;cursor:pointer"></i></a>'
                            ;

                      }}
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#4thyr tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

         
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });

              
    </script>

    <script language="text/javascript">
        $("#cameraFileInput").on("change", function(e) {
          var _URL = window.URL || window.webkitURL,
              file = this.files[0], 
              image = new Image();                  
          
           $(image).ready(function($) {
            $('#preview').attr('src', _URL.createObjectURL(file));
           // $('#add_student_grade11').modal('show');
          });
          window.URL.revokeObjectURL(image.src);
          $(e.target.id).val('');
        });


    </script>
    


  </body>
</html>

 <!--####################################  START LOG - OUT  #################################################################-->       

        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"      aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <form method="post">
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class = "btn btn-danger" name="logout">Logout</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>



<!---- ###########################################   ADDDDDD STUDENT    ########################################################## -->
                    
<form method="post" enctype="multipart/form-data">
        <div class="modal fade" id="add_student_grade11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Grade - 11 Student</h5>
                        <button class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                    </div>

                     <div class="modal-body">
                        <p class="sub-text"><text class="text-danger">Note: Make sure to review all fields.</text></p>
                         <form class="form-signin" method="POST">
                                <div class="form-label-group"><center>

                                    <img id="preview" width="100" height="100" style="margin-bottom: 10px !important"/>
                  
                                    <input type="file" id="cameraFileInput" accept="image/*" capture="environment" style="display:none;" name="image" required><br>
                                    <label for="cameraFileInput" class="btn btn-large" style="border: 1px solid black;cursor:pointer">Upload Image
                                        </label><br></center>
                                </div>

                                <div class="form-label-group">
                                    
                                      <input type="text" name="add_student_id" class="form-control inp" id="inputPassword" required placeholder="e.g: 2018-10-138" style="outline: none;border-width: 0 0 1px;border-radius:0px">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="stud_lastname" class="form-control" id="inputPassword" required placeholder="e.g: Casabuena">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Lastname</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="stud_firstname" class="form-control" id="inputPassword" required placeholder="e.g: Jhon Ace">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Firstname</label>
                                </div>

                                <div class="form-label-group">
                                        <select class="form-control" id="disabledSelect" name="stud_year" disabled="">
                                            <option value="Grade - 11">GRADE - 11</option>
                                            <option value="Grade - 12">GRADE - 12</option>
                                            <option value="1st Year"></option>
                                            <option value="2nd Year">2ND</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                        </select>
                                    <label for="disabledSelect" style="color: black">Student Year</label>
                                </div>
                                <div class="form-label-group">
                                        <select class="form-control" name="stud_department">
                                            <option value="Grade - 11" selected="">TVL</option>
                                            <option value="1st Year">ICT</option>
                                            <option value="2nd Year">BSIT</option>
                                            <option value="3rd Year">MT</option>
                                            <option value="4th Year">Education</option>
                                            <option value="4th Year">Criminology</option>
                                            <option value="4th Year">HM/TM</option>
                                            <option value="4th Year">Business Administration</option>
                                        </select>   
                                    <label for="disabledSelect" style="color: black">Student Program</label>
                                </div>
                                <div class="form-label-group">
                                        <select class="form-control" name="stud_department" disabled="">
                                            <option value="Grade - 11" selected="">SHS</option>
                                            <option value="1st Year">BSIT</option>
                                            <option value="2nd Year">Mar-E</option>
                                            <option value="3rd Year">MT</option>
                                            <option value="4th Year">Education</option>
                                            <option value="4th Year">Crim</option>
                                            <option value="4th Year">HM/TM</option>
                                            <option value="4th Year">BA</option>
                                        </select>   
                                    <label for="disabledSelect" style="color: black">Student Department</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="stud_voting_code#" class="form-control" required placeholder="e.g: #37rw2">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">QR Code #:</label>
                                </div>

                                <button class="btn btn-success btn-lg btn-block mb-4 mt-4" type="submit" name = "submit-new-student" style="color:white;font-family: 'Fjalla One', cursive;font-size: 20px">Add Student</button>
                            </form>
                     </div>
                        <div class="modal-footer">
                           
                        </div>
                </div>
            </div>
        </div>
    </form>


<!--------------------------------------     UPDATE GRADE 11 - STUDENT    ----------------------------------->              

<form method="post">
        <div class="modal fade" id="update_student_grade11"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true" style="margin-top: -60px">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                        <button class="btn btn-secondary float-right" data-dismiss="modal" style="float: right;margin-top: -30px">Cancel</button>
                    </div>
                     <div class="modal-body">
                    <p class="sub-text" style="margin-top: -20px"><text class="text-danger">Note: Make sure to review all fields.</text></p>
                         <form class="form-signin" method="POST">
                                <div class="form-label-group" style="display: none">
                                    <input type="text" name="idIF" id = "id_id" class="form-control col-sm-10"   required>
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_id" id = "up_stud_id" class="form-control col-sm-10" placeholder="e.g: 2018-06-15">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_lastname" class="form-control" id = "up_stud_lastname" required placeholder="e.g: Casabuena">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Lastname</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_firstname" class="form-control" required 
                                    id = "up_stud_firstname" placeholder="e.g: Jhon Ace">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Firstname</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_middlename" class="form-control" id = "up_stud_middlename" required placeholder="e.g: Vallejos">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Middlename</label>
                                </div>
                                <div class="form-label-group">
                                        <input name="update_stud_department" class="form-control text-danger" id="up_stud_department" readonly>
                                    <label for="disabledSelect" style="color: black">Student Department</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="update_stud_year" id = "up_stud_year" class="form-control text-danger" required readonly>
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Year</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="update_voting_code#" id = "up_stat" class="form-control" required placeholder="e.g: #w7Sxa4">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Voting Code #:</label>
                                </div>

                                <button class="btn btn-success btn-lg btn-block mb-4 mt-4" type="submit" name = "update-student" style="color:white;font-family: 'Fjalla One', cursive;font-size: 20px">Save Changes</button>
                            </form>
                     </div>
                        <div class="modal-footer">
                           
                        </div>
                </div>
            </div>
        </div>
    </form>