<?php include 'session_select.php'; ?>
<?php include 'logout_session.php'; ?>
<?php include 'session_destroyer.php'; ?>
<?php include "header_links.php";?>
<head>
    <title>Faculty Load</title>
</head>
    <body style="font-family:Franklin Gothic Book">
        <div class="wrapper d-flex align-items-stretch">
            <?php
                if($user_Type=='Administrator')
                {

                    include 'admin_sidebar.php'; 

                }
                else if($user_Type=="Dean")
                {
                    include 'dean_sidebar_faculty_load.php'; 
                }
                else if($user_Type=="Instructor")
                {
                    include 'instructor_sidebar_load.php';
                }
            ?>


            <div id="content" class="p-4 p-md-8">
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <div class="col" style="margin-left:-16px;margin-right:-10px">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> 
                        </div>
                            <a href="faculty_load.php" class = "btn btn-info" type='button' style="float: right;margin-top: 0px;" ><i class="fa fa-refresh"></i></a>
                    </div>
                </nav>

                <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
                    <div class="card-content table"><br>
                        <center><p><img src="images/csd_logo.png" height="20px" width="20px" style="margin-top:-4px;" /><b> COMPUTER STUDIES DEPARTMENT</b></p></center>
                        <div class="container-fluid text">
                            
                            <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>Faculty Load</b></p>
                        </div>
                <?php
                if($user_Type=="Dean")
                {
                ?>
                        <form method="POST">
                                    <?php 

                                        $sql = mysqli_query($link,"SELECT  * FROM schoolyear");
                                            echo "<label for='sel1' >Select:&nbsp;</label>";
                                            echo "<select  name='schoolyearDisplay' class='form-control-sm' id='sel1'required>";
                                            echo "<option value=''>School Year</option>";
                                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                                        {
                                                          $school_yr = $num_rows['school_year'];
                                                          echo "<option>$school_yr</option>";
                                                        }
                                            echo "</select>";

                                             echo "&nbsp;<select name='semesterDisplay' class='form-control-sm ' id='sel1' required>";

                                            echo "<option value=''>Semester</option>";
                                            $sql = mysqli_query($link,"SELECT  * FROM semester");
                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                                {
                                                  $sems_id = $num_rows['semester_id'];
                                                  $semester_type = $num_rows['semester_type'];

                                                  $_SESSION['session_semtype'] = $semester_type;
                                                //  echo "ID NUMBER:".." ";

                                                  echo "

                                                        <option>$semester_type</option>
                                                  ";

                                                }
                                                
                                            echo "</select>";
                                            echo "&nbsp<button class='btn btn-success btn-sm' name='show'>Display</button>";
                                    ?>
                                </form>
                                <div class="card-content table-responsive">
                                    <?php
                                            
                                            if(isset($_POST['show']))
                                            {

                                                $fetchschoolYear = $_POST['schoolyearDisplay'];
                                                $_SESSION['g_session'] = $fetchschoolYear;
                                                $fetchsem = $_POST['semesterDisplay'];
                                                $_SESSION['g_session2'] = $fetchsem;  
                                    ?>
                                                <p>School Year: <b style="color:red;text-transform:uppercase;"><?php echo $fetchschoolYear;?></b>&nbsp;Semester: <b style="color:red;text-transform:uppercase;"><?php echo $fetchsem;?></b></p>
                                                <form method="POST">
                                                    <?php 

                                                        
                                                        $sql ="SELECT  * FROM user where user_department = 'CSD' and user_type = 'Instructor' and user_schoolyear ='".$_SESSION['g_session']."' and semester = '".$_SESSION['g_session2']."'";
                                                        $result = mysqli_query($link, $sql);

                                                        if(mysqli_num_rows($result) != 0) 
                                                        {
                                                            echo "<label for='sel1' >Select:&nbsp;</label>";
                                                            echo "&nbsp;<select name='facultyDisplay' class='form-control-sm ' id='sel1' required>";
                                                            echo "<option value='' required>Faculty ID</option>";
                                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
                                                            {

                                                                $school_id = $num_rows['user_school_id'];
                                                                $_SESSION['aces'] = $school_id;

                                                                echo "<option>$school_id</option>";

                                                            }

                                                            echo "</select>";
                                                        echo "&nbsp<button class='btn btn-success btn-sm' name='facultyShow' required>Display</button>";
                                                        }
                                                        else
                                                        {

                                                            echo "<h5 style='text-align:center'>No data available</h5>";

                                                             
                                                        
                                                        }


                                                        
                                                    ?>
                                                </form>

                                    <?php   
                                            }
                                    ?>

                                             <form method="POST">

                                    <?php 


                                            if(isset($_POST['facultyShow']))
                                            {    
                                    ?>
                                            <p>School Year: <b style="color:red;text-transform: uppercase;"><?php echo $aces = $_SESSION['g_session'];?></b>&nbsp;Semester: <b style="color:red;text-transform: uppercase;"><?php echo $aces2 = $_SESSION['g_session2'];?></b></p>
                                    <?php
                                            $sql ="SELECT  * FROM user where user_department = 'CSD' and user_type = 'Instructor' and user_schoolyear ='".$_SESSION['g_session']."' and semester = '".$_SESSION['g_session2']."'";
                                                        $result = mysqli_query($link, $sql);
                                                        
                                                        //echo "<option value='' required>Select Course</option>";
                                                        if(mysqli_num_rows($result) != 0) 
                                                        {
                                                            echo "<label for='sel1' >Select:&nbsp;</label>";
                                                            echo "&nbsp;<select name='facultyDisplay' class='form-control-sm ' id='sel1' required>";
                                                            echo "<option value='' required>Faculty ID</option>";
                                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
                                                            {

                                                                $school_id = $num_rows['user_school_id'];
                                                                $userlname = $num_rows['user_lastname'];
                                                                $userfname =$num_rows['user_firstname'];

                                                                $_SESSION['session_schoolid'] = $school_id;

                                                                echo "<option>$school_id</option>";

                                                            }

                                                            echo "</select>";

                                                           
                                                        }

                                                        else
                                                        {
                                                            echo "<option>No faculty</option>";


                                                        } 
                                                         echo "&nbsp<button class='btn btn-success btn-sm' name='facultyShow' required>Display</button>";

                                                         if(isset($_POST['facultyShow']))
                                                         {
                                                            $fetchfaculty = $_POST['facultyDisplay'];
                                                            $_SESSION['faculty'] = $fetchfaculty;

                                                            $sql ="SELECT  * FROM user where user_department = 'CSD' and user_type = 'Instructor' and user_schoolyear ='".$_SESSION['g_session']."' and semester = '".$_SESSION['g_session2']."' and user_school_id ='".$fetchfaculty."'";
                                                            $result = mysqli_query($link, $sql);
                                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
                                                            {

                                                                $school_id = $num_rows['user_school_id'];
                                                                $userlname = $num_rows['user_lastname'];
                                                                $userfname =$num_rows['user_firstname'];
                                                                $user_image = $num_rows['user_image'];

                                                                $_SESSION['school_id'] = $school_id;

                                                            }

                                                         }

                                                            $sql2 = mysqli_query($link, "SELECT SUM(faculty_course_unit) AS 'TOTAL' FROM faculty_load where faculty_school_id = '".$fetchfaculty."'");
                                                            $res2 = mysqli_fetch_array($sql2);
                                                            $alllogs = $res2['TOTAL'];

                                                            //echo $alllogs;

                                    ?>                  <br>
                                                        <img src="<?php echo $user_image;?>" width="150" height="150" style="margin-left: 60px;" alt="<?php echo $userlname;?>"/><br>
                                                            <button class = "btn btn-info" type='button' data-toggle="modal" data-target="#add_student_grade11" style="float: right;margin-right: 50px;margin-top: 0px;" ><i class="fa fa-pencil-square-o fa-10x" title='ja;lsj'></i>
                                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Faculty ID: <b style="color:red;text-transform: uppercase;">
                                                            <?php echo $school_id;?></b><br>
                                                            Faculty Name: <b style="color:red;text-transform: uppercase;"><?php echo $userlname.', '.$userfname;?></b><br>
                                                    <?php 
                                                        if($alllogs == '')
                                                        {
                                                    ?>
                                                            
                                                            <text style="margin-left:18px">Total Units:</text>
                                                            <text style="color:red"><b>(empty)</b></text> 
                                                                                       
                                    <?php
                                                        }
                                                        else
                                                        {
                                    ?>                      <text style="margin-left:12px">Total Units:</text>
                                                            <text style="color:red"><b><?php echo $alllogs;?></b></text> 
                                                          
                                    <?php               }
                                                

                                                        echo '<table id="csd_faculty_load" class="table table-hover  flex-nowrap" style="width:100%">';
                                                        echo '<thead>';
                                                            echo '<tr>
                                                                <th>Course Code</th>
                                                                <th>Course Name</th>
                                                                <th>Course Section</th>
                                                                <th>Course Unit</th>
                                                                <th>Course Schedule</th>
                                                                <th>Room</th>
                                                                <th>Action</th>
                                                            </tr>
                                                         </thead>';
                                                 $sql4 = "SELECT * FROM faculty_load where faculty_school_id = '".$fetchfaculty."' ORDER BY faculty_course_name ASC";
                                                $result = mysqli_query($link, $sql4);

                                                 for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
                                                {
                                                    $fcourse_code = $num_rows['faculty_course_code'];
                                                    $fcourse_name = $num_rows['faculty_course_name'];
                                                    $fcourse_section = $num_rows['faculty_course_section'];
                                                    $fcourse_unit = $num_rows['faculty_course_unit'];
                                                    $fcourse_course_schedule_in = $num_rows['faculty_course_schedule_in'];
                                                    $fcourse_course_schedule_out = $num_rows['faculty_course_schedule_out'];
                                                    $fcourse_course_schedule_date = $num_rows['faculty_course_schedule_date'];
                                                    $fcourse_course_schedule_dateType_in = $num_rows['faculty_course_schedule_dateType_in'];
                                                    $fcourse_course_schedule_dateType_out = $num_rows['faculty_course_schedule_dateType_out'];
                                                    $fcourse_assigned_room = $num_rows['faculty_course_assigned_room'];
                                                    
                                                

                                                if(mysqli_num_rows($result) != 0) 
                                                {
                                                    

                                                         echo "<tr class='table table-striped'> 
                                                            <td >$fcourse_code</td>
                                                            <td>$fcourse_name</td>
                                                            <td >$fcourse_section</td>
                                                            <td>$fcourse_unit</td>
                                                            <td>$fcourse_course_schedule_date $fcourse_course_schedule_in $fcourse_course_schedule_dateType_in - $fcourse_course_schedule_out $fcourse_course_schedule_dateType_out</td>
                                                            <td>$fcourse_assigned_room</td>
                                                            <td> <a class='editbtn' data-toggle='modal' data-target='#update_student_grade11' style='border-radius:4px;color:green'><i class='fa fa-pencil-square-o' style='cursor:pointer;color:green'></i></a>&nbsp;&nbsp;&nbsp;<a class='' data-toggle='modal' data-target='' style='border-radius:4px'><i class='fa fa-unlock-alt' style='color:red;cursor:pointer'></i></a>
                                                            </td>
                                                        </tr>";

                                                   

                                                }
                                                else
                                                {
                                                    echo '<table id="instructor_csd_class_lo" class="table table-hover  flex-nowrap" style="width:100%">';
                                                        echo '<thead>';
                                                            echo '<tr>
                                                                <th>Course Code</th>
                                                                <th>Course Name</th>
                                                                <th>Course Unit</th>
                                                                <th>Course Schedule</th>
                                                                <th>Room</th>
                                                                <th>Action</th>
                                                            </tr>
                                                         </thead>';
                                                    echo "</table>"; 
                                                    echo "<p style='text-align:center'><b style='color:red'>No Data Available</b></p>";
                                                }
                                                 
                                            }
                                            echo "</table>"; 
                                            }

                                    ?>
    
                                </div> 
                                 </form>
                    </div>
                    <br>
                </ul>
        <?php   }
                else if ($user_Type == 'Instructor')                      ///////////////////////////   INSTRUCTOOR FACULTY LOAD PAGE
                {
        ?>

                    <form method="POST">
                        <?php 

                            $sql = mysqli_query($link,"SELECT  * FROM schoolyear");
                            echo "<label for='sel1' >Select:&nbsp;</label>";
                            echo "<select  name='schoolyearDisplay' class='form-control-sm' id='sel1'required>";
                                echo "<option value=''>School Year</option>";
                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                        $school_yr = $num_rows['school_year'];
                                        echo "<option>$school_yr</option>";
                                    }
                            echo "</select>";

                            echo "&nbsp;<select name='semesterDisplay' class='form-control-sm ' id='sel1' required>";
                                    echo "<option value=''>Semester</option>";
                                        $sql = mysqli_query($link,"SELECT  * FROM semester");
                                        for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                        {
                                            $sems_id = $num_rows['semester_id'];
                                            $semester_type = $num_rows['semester_type'];

                                            $_SESSION['session_semtype'] = $semester_type;

                                            echo "
                                                    <option>$semester_type</option>
                                                 ";

                                        }
                                                
                            echo "</select>";
                            echo "&nbsp<button class='btn btn-success btn-sm' name='show'>Display</button>";
                        ?>
                    </form>
                    <div class="card-content table-responsive">
                        <?php
                                            
                            if(isset($_POST['show']))
                            {

                                $fetchschoolYear = $_POST['schoolyearDisplay'];
                                $_SESSION['g_session'] = $fetchschoolYear;
                                $fetchsem = $_POST['semesterDisplay'];
                                $_SESSION['g_session2'] = $fetchsem; 

                        ?>
                                    School Year: 
                                    <b style="color:red;text-transform:uppercase;">
                                    <?php echo $fetchschoolYear;?></b>&nbsp;
                                    Semester: 
                                    <b style="color:red;text-transform:uppercase;">
                                    <?php echo $fetchsem;?></b><br>

                        <?php

                                $sql ="SELECT  * FROM user where user_department = 'CSD' and user_type = 'Instructor' and user_schoolyear ='".$_SESSION['g_session']."' and semester = '".$_SESSION['g_session2']."' and user_school_id = '".$_SESSION['session_id']."'";
                                $result = mysqli_query($link, $sql);
                                if(mysqli_num_rows($result) != 0) 
                                {

                                    $sql2 = mysqli_query($link, "SELECT SUM(faculty_course_unit) AS 'TOTAL' FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."'");
                                    $res2 = mysqli_fetch_array($sql2);
                                    $alllogs = $res2['TOTAL'];
                        ?>              <text style="margin-left:7px">Total Units:</text>
                                        <text style="color:red"><b><?php echo $alllogs;?></b></text> 
                        <?php 

                                               echo '<table id="csd_faculty_load_instructorView" class="table table-hover  flex-nowrap" style="width:100%">';
                                                        echo '<thead>';
                                                            echo '<tr>
                                                                <th>Course Code</th>
                                                                <th>Course Name</th>
                                                                <th>Course Section</th>
                                                                <th>Course Unit</th>
                                                                <th>Course Schedule</th>
                                                                <th>Room</th>
                                                            </tr>
                                                         </thead>';

                                                 $sql5 = "SELECT  * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."' and faculty_load_school_year = '".$fetchschoolYear."' and faculty_load_semester = '".$fetchsem."' ORDER BY faculty_course_schedule_date ASC";
                                                $result5 = mysqli_query($link, $sql5);

                                                 for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result5) ; $a++ )
                                                {
                                                    $fcourse_code = $num_rows['faculty_course_code'];
                                                    $fcourse_name = $num_rows['faculty_course_name'];
                                                    $fcourse_section = $num_rows['faculty_course_section'];
                                                    $fcourse_unit = $num_rows['faculty_course_unit'];
                                                    $fcourse_course_schedule_in = $num_rows['faculty_course_schedule_in'];
                                                    $fcourse_course_schedule_out = $num_rows['faculty_course_schedule_out'];
                                                    $fcourse_course_schedule_date = $num_rows['faculty_course_schedule_date'];
                                                    $fcourse_course_schedule_dateType_in = $num_rows['faculty_course_schedule_dateType_in'];
                                                    $fcourse_course_schedule_dateType_out = $num_rows['faculty_course_schedule_dateType_out'];
                                                    $fcourse_assigned_room = $num_rows['faculty_course_assigned_room'];
                                                    
                                                

                                                    if($result) 
                                                    {
                                                        

                                                             echo "<tr class='table table-striped'> 
                                                                <td >$fcourse_code</td>
                                                                <td>$fcourse_name</td>
                                                                <td >$fcourse_section</td>
                                                                <td>$fcourse_unit</td>
                                                                <td>$fcourse_course_schedule_date 
                                                                $fcourse_course_schedule_in $fcourse_course_schedule_dateType_in - $fcourse_course_schedule_out $fcourse_course_schedule_dateType_out</td>
                                                                <td>$fcourse_assigned_room</td>
                                                            </tr>";
                                                            

                                                       

                                                    }
                                                    else
                                                    {
                                                        echo '<table id="instructor_csd_class_lo" class="table table-hover  flex-nowrap" style="width:100%">';
                                                            echo '<thead>';
                                                                echo '<tr>
                                                                    <th>Course Code</th>
                                                                    <th>Course Name</th>
                                                                    <th>Course Unit</th>
                                                                    <th>Course Schedule</th>
                                                                    <th>Room</th>
                                                                </tr>
                                                             </thead>';
                                                        echo "</table>"; 
                                                        echo "<p style='text-align:center'><b style='color:red'>No Data Available</b></p>";
                                                    }
                                                     
                                                }
                                                echo "</table>"; 
                                }
                            else
                            {
                                      echo "<h5 style='text-align:center'>No data available</h5>";

                                       // echo "<p style='text-align:center'><b style='color:red'>No data available</b></p>";
                            }
            }


}
                                    ?>
    
                                </div> 
                                 </form>
                    </div>
                    <br>
                </ul>

            </div>
        </div>
  
        <?php include 'footer_scripts.php'; ?>

 
  <script type="text/javascript">
            $(document).ready(function () {
             $('#csd_faculty_load_instructorView').DataTable();
                });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
             $('#csd_faculty_load').DataTable();
                });
        </script>
</html>


<?php include 'logout.php';?>

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