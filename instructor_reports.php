<?php include 'session_select.php'; ?>
<?php include 'logout_session.php'; ?>
<?php include 'session_destroyer.php'; ?>
<?php include 'header_links.php';?>
<head>
    <title>Attendance Report</title>
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
                    include 'instructor_sidebar_reports.php';
                }
            ?>


            <div id="content" class="p-4 p-md-8">
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <div class="col" style="margin-left:-16px;margin-right:-10px">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> 
                        </div>
                            <a href="instructor_classlist.php" class = "btn btn-info" type='button' style="float: right;margin-top: 0px;" ><i class="fa fa-refresh"></i></a>
                    </div>
                </nav>

                <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
                    <div class="card-content table"><br>
                        <center><p><img src="images/csd_logo.png" height="20px" width="20px" style="margin-top:-4px;" /><b> COMPUTER STUDIES DEPARTMENT</b></p></center>
                        <div class="container-fluid text">
                            
                            <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>Class Reports</b></p>
                        </div>
                        <?php
                        if($user_Type=="Instructor")
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
                                            <p>School Year: <b style="color:red;text-transform:uppercase;"><?php echo $fetchschoolYear;?></b>&nbsp;
                                             Semester: <b style="color:red;text-transform:uppercase;"><?php echo $fetchsem;?></b></p>
                                                
                                            <form method="POST">
                                                <?php 

                                                    $sql ="SELECT  * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."' and faculty_load_school_year = '".$fetchschoolYear."' and faculty_load_semester = '".$fetchsem."' ORDER BY faculty_course_schedule_date,faculty_course_schedule_dateType_in ASC ";
                                                    $result = mysqli_query($link, $sql);
                                                    
                                                    
                                                    
                                                                    if(mysqli_num_rows($result) != 0) 

                                                                    {   echo "<label for='sel1' >(1) Select Date:&nbsp;</label>";
                                                                        echo "<input type='date' name='datepicker' required>";
                                                                       
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "<h5 style='text-align:center'>No data available</h5>";
                                                                    
                                                                    }
                                                 
                                                    if(mysqli_num_rows($result) != 0){
                                                        echo "&nbsp<button class='btn btn-success btn-sm' name='dateSubmit' required style='margin-top:-3.5px'>Display</button>";
                                                    }
                                                    else
                                                    {
                                                        
                                                    }
                                                ?>
                                            </form>

                                    <?php

                                        }
                                    
                                    ?>

                                             <form method="POST" name="try">

                                    <?php 


                                            if(isset($_POST['dateSubmit']))
                                            {
                                            $date = $_POST['datepicker'];    
                                    ?>          
                                            <p>School Year: <b style="color:red;text-transform: uppercase;"><?php echo $aces = $_SESSION['g_session'];?></b>&nbsp;Semester: <b style="color:red;text-transform: uppercase;"><?php echo $aces2 = $_SESSION['g_session2'];?></b></p>
                                    <?php
                                            $sql ="SELECT  * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."' ORDER BY faculty_course_schedule_date,faculty_course_schedule_dateType_in ASC";
                                                    $result = mysqli_query($link, $sql);
                                                    echo "<label for='sel1' >(2) Select Date:&nbsp;</label>";
                                                        if(mysqli_num_rows($result) != 0) 
                                                        {
                                                            echo "<input type='date' name='datepicker' required>";
                                                        }

                                                        else
                                                        {
                                                            echo "<option>No faculty</option>";


                                                        } 
                                                         echo "&nbsp<button class='btn btn-success btn-sm' name='dateSubmit' required>Display</button>";
                                                         echo "</form>";
                                    ?>

                                <form method="POST">
                                    <?php
                                                         if(isset($_POST['dateSubmit']))
                                                         {
                                                            $fetchDate = $_POST['datepicker'];
                                                            $_SESSION['fdate'] = $fetchDate;

                                                            echo"<p>(1) Date Selected: <text style='color:red'><b>$fetchDate</b><br></text></p>";

                                                            
                                                        $sql ="SELECT  * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."' ORDER BY faculty_course_schedule_date,faculty_course_schedule_dateType_in ASC";
                                                            $result = mysqli_query($link, $sql);
                                                            echo "<label for='sel1' >(1) Course:&nbsp;</label>";
                                                            echo "&nbsp;<select name='courseDisplay' class='form-control-sm ' id='sel1' required>";
                                                            echo "<option value='' required>~ Select Course ~</option>";
                                                        if(mysqli_num_rows($result) != 0) 
                                                        {
                                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
                                                            {

                                                                $fcourse_code = $num_rows['faculty_course_code'];
                                                                $_SESSION['scourse_code'] = $fcourse_code;
                                                                $fcourse_name = $num_rows['faculty_course_name'];
                                                                $_SESSION['scourse_name'] = $fcourse_name;
                                                                $fcourse_section = $num_rows['faculty_course_section'];
                                                                $fcourse_unit = $num_rows['faculty_course_unit'];
                                                                $fcourse_course_schedule_in = $num_rows['faculty_course_schedule_in'];
                                                                $fcourse_course_schedule_out = $num_rows['faculty_course_schedule_out'];
                                                                $fcourse_course_schedule_date = $num_rows['faculty_course_schedule_date'];
                                                                $fcourse_course_schedule_dateType_in = $num_rows['faculty_course_schedule_dateType_in'];
                                                                $fcourse_course_schedule_dateType_out = $num_rows['faculty_course_schedule_dateType_out'];
                                                                $fcourse_assigned_room = $num_rows['faculty_course_assigned_room'];

                                                                $acest = $fcourse_code.' '.$fcourse_name.' '.$fcourse_section.' ('.$fcourse_course_schedule_date.' '.$fcourse_course_schedule_in.' '.$fcourse_course_schedule_dateType_in.' '.$fcourse_course_schedule_out.' '.$fcourse_course_schedule_dateType_out.' '.$fcourse_assigned_room.')';

                                                                echo "<option>$acest</option>";

                                                            }

                                                            echo "</select>";

                                                           
                                                        }

                                                        else
                                                        {
                                                            echo "<option>No faculty</option>";


                                                        } 
                                                         echo "&nbsp<button class='btn btn-success btn-sm' name='courseDisplayName' required>Display</button>";

                                            ?>
                                                 <br>&nbsp;Course Selected: <b style="color:red;">

                                                    <?php 


                                                      // 

                                                        if(mysqli_num_rows($result) == 0)
                                                        {
                                                            
                                            ?>

                                            <?php
                                                        }
                                                        else
                                                        {
                                            ?>
                                                None
                                            <?php
                                                        }
                                                    ?>

                                                           
                                                                
                                                            
                                            <?php
}

                                                       }  


                                            if(isset($_POST['courseDisplayName']))
                                            {
                                                    $ty = $_SESSION['fdate'];    
                                    ?>              
                                            <p>School Year: <b style="color:red;text-transform: uppercase;"><?php echo $aces = $_SESSION['g_session'];?></b>&nbsp;Semester: <b style="color:red;text-transform: uppercase;"><?php echo $aces2 = $_SESSION['g_session2'];?></b></p>
                                            <form method="POST">
                                    <?php

                                                    echo "<label for='sel1' >(3) Select Date:&nbsp;</label>";

                                                            echo "<input type='date' name='datepicker' required>";


                                                         echo "&nbsp<button class='btn btn-success btn-sm' name='dateSubmit' required>Display</button>";
                                                                         


                                                            echo"<br><p>Date Selected: <text style='color:red'><b>$ty</b><br></text></p>";


                                    ?>
                                </form>
                                <form method="POST">
                                    <?php
                                            $sql ="SELECT  * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."' ORDER BY faculty_course_schedule_date,faculty_course_schedule_dateType_in ASC";
                                                    $result = mysqli_query($link, $sql);
                                                    echo "<label for='sel1' >(2) Course:&nbsp;</label>";
                                                    echo "&nbsp;<select name='courseDisplay' class='form-control-sm ' id='sel1' required>";
                                                    echo "<option value='' required>~ Select Course ~</option>";
                                                        if(mysqli_num_rows($result) != 0) 
                                                        {
                                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
                                                            {

                                                                $fcourse_code = $num_rows['faculty_course_code'];
                                                                $_SESSION['scourse_code'] = $fcourse_code;
                                                                $fcourse_name = $num_rows['faculty_course_name'];
                                                                $_SESSION['scourse_name'] = $fcourse_name;
                                                                $fcourse_section = $num_rows['faculty_course_section'];
                                                                $fcourse_unit = $num_rows['faculty_course_unit'];
                                                                $fcourse_course_schedule_in = $num_rows['faculty_course_schedule_in'];
                                                                $fcourse_course_schedule_out = $num_rows['faculty_course_schedule_out'];
                                                                $fcourse_course_schedule_date = $num_rows['faculty_course_schedule_date'];
                                                                $fcourse_course_schedule_dateType_in = $num_rows['faculty_course_schedule_dateType_in'];
                                                                $fcourse_course_schedule_dateType_out = $num_rows['faculty_course_schedule_dateType_out'];
                                                                $fcourse_assigned_room = $num_rows['faculty_course_assigned_room'];

                                                                $acest = $fcourse_code.' '.$fcourse_name.' '.$fcourse_section.' ('.$fcourse_course_schedule_date.' '.$fcourse_course_schedule_in.' '.$fcourse_course_schedule_dateType_in.' '.$fcourse_course_schedule_out.' '.$fcourse_course_schedule_dateType_out.' '.$fcourse_assigned_room.')';

                                                                echo "<option>$acest</option>";

                                                            }

                                                            echo "</select>";

                                                           
                                                        }

                                                        else
                                                        {
                                                            echo "<option>No faculty</option>";


                                                        } 
                                                         echo "&nbsp<button style='margin-top:-5px' class='btn btn-success btn-sm' name='courseDisplayName' required>Display</button>";


                                    ?>
                                </form>
                                    <?php
                                                        if(isset($_POST['courseDisplayName']))
                                                         {
                                                            $fetchcourseDisplay = $_POST['courseDisplay'];
                                                            $_SESSION['fcourseDisplay'] = $fetchcourseDisplay;

                                                            $sqle ="SELECT * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."'";
                                                            $resultT = mysqli_query($link, $sqle);
                                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($resultT) ; $a++ )
                                                            {

                                                                $fcourse_code = $num_rows['faculty_course_code'];
                                                                $_SESSION['scourse_code'] = $fcourse_code;
                                                                $fcourse_name = $num_rows['faculty_course_name'];
                                                                $_SESSION['scourse_name'] = $fcourse_name;
                                                                $fcourse_section = $num_rows['faculty_course_section'];
                                                                $fcourse_unit = $num_rows['faculty_course_unit'];
                                                                $fcourse_course_schedule_in = $num_rows['faculty_course_schedule_in'];
                                                                $fcourse_course_schedule_out = $num_rows['faculty_course_schedule_out'];
                                                                $fcourse_course_schedule_date = $num_rows['faculty_course_schedule_date'];
                                                                $fcourse_course_schedule_dateType_in = $num_rows['faculty_course_schedule_dateType_in'];
                                                                $fcourse_course_schedule_dateType_out = $num_rows['faculty_course_schedule_dateType_out'];
                                                                $fcourse_assigned_room = $num_rows['faculty_course_assigned_room'];

                                                                $acest = $fcourse_code.' '.$fcourse_name.' '.$fcourse_section.' ('.$fcourse_course_schedule_date.' '.$fcourse_course_schedule_in.' '.$fcourse_course_schedule_dateType_in.' '.$fcourse_course_schedule_out.' '.$fcourse_course_schedule_dateType_out.' '.$fcourse_assigned_room.')';


                                                                $resultq = $acest;

                                                                if($_SESSION['fcourseDisplay'] == $resultq )
                                                                {
                                                                    $resultq2 = $acest;
                                                                    $_SESSION['rsq2'] = $resultq2;

                                                                    $_SESSION['in_s'] = $fcourse_course_schedule_in;
                                                                    $_SESSION['out_s'] = $fcourse_course_schedule_out;
                                                                }
                                                                else{
                                                                    $notice = 'No available data';
                                                                    $_SESSION['rsq3'] = $notice;
                                                                }


                                                            }
                                                                if(mysqli_num_rows($resultT) != 0) 
                                                                {
                                                                    $sql2 = mysqli_query($link, "SELECT COUNT(attendance_check ) AS 'TOTAL_PRESENT' FROM attendance_report where fullcourse_name = '".$_SESSION['rsq2']."' and attendance_check = 1 and date_attended = '".$_SESSION['fdate']."' and faculty_school_id = '".$_SESSION['session_id']."'");
                                                                    $res2 = mysqli_fetch_array($sql2);
                                                                    $present = $res2['TOTAL_PRESENT'];
                                                                    
                                                                    $_SESSION['ses_present'] = $present;

                                                                    

                                                                    $sqlr = mysqli_query($link, "SELECT COUNT(attendance_check ) AS 'TOTAL_ABSENCES' FROM attendance_report where fullcourse_name = '".$resultq2."' and attendance_check = 0 and date_attended = '".$_SESSION['fdate']."' and faculty_school_id = '".$_SESSION['session_id']."'");
                                                                    $result_query2 = mysqli_fetch_array($sqlr);
                                                                    $absences = $result_query2['TOTAL_ABSENCES'];
                                                                    $_SESSION['ses_absent'] = $absences;

                                                    ?>

                                                                        &nbsp;Course Selected: <b style="color:red"><?php echo $_SESSION['rsq2']; ?></b><br><a href="attendance.php" target="_blank"><button class="btn btn-success btn-sm btn-sm" style="margin-left:106px"><i class="fa fa-external-link" aria-hidden="true"></i>&nbsp;Attendance Portal</button></a><br>



                                                    <?php 

                                                                   
                                                                }
                                                                else
                                                                {
                                                ?>
                                                        &nbsp;Course: <b style="color:red">No Courses Selected</b><br>
                                                        Presentss: <b style="color:red">No data available</b><br>
                                                        &nbsp;Absent: <b style="color:red">No data available</b>
                                                <?php  
                                                                }



                                                ?>
                                                    
                                                <?php
                                                             $sqlp = "SELECT * FROM attendance_report where fullcourse_name = '".$_SESSION['rsq2']."' and date_attended = '".$_SESSION['fdate']."' and faculty_school_id = '".$_SESSION['session_id']."'";
                                                            $result = mysqli_query($link, $sqlp);

                                                            if(mysqli_num_rows($result) > 0 ) 
                                                            {
                                                ?>
                                                                <h6 style="text-align:center;color:#FF9200;"><b>Attendance (Present)</b></h6>
                                                <?php
                                                                if(mysqli_num_rows($resultT) != 0) 
                                                                {
                                                ?>                 <b>Total Attended:</b> <b style="color:red"><?php echo $_SESSION['ses_present']; ?></b><br>
                                                <?php
                                                                    echo '<table id="instructor_reports_present_table" class="table table-hover  flex-nowrap" style="width:100%">';
                                                                        echo '<thead>';
                                                                        echo '<tr>
                                                                             <th>School ID</th>
                                                                            <th>Last Name</th>
                                                                            <th>First Name</th>
                                                                            <th>Log Time</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                     </thead>';
                                                                    $sql_present = "SELECT CONCAT(date_attended,' ',TIME_FORMAT(student_qr_login_time, '%r')) AS aces, school_id AS school_id, stud_firstname , stud_lastname, student_login_time_status FROM attendance_report where faculty_school_id = '".$_SESSION['session_id']."' and fullcourse_name = '".$_SESSION['rsq2']."' and date_attended = '".$_SESSION['fdate']."' and attendance_check = 1";
                                                                    $result = mysqli_query($link,$sql_present) or die (mysqli_error());
                                                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
                                                                    {
                                                                        $present_stud_id = $num_rows['school_id'];
                                                                        $present_stud_firstname = $num_rows['stud_firstname'];
                                                                        $present_stud_lastname = $num_rows['stud_lastname'];
                                                                        $present_stud_log_time = $num_rows['aces'];
                                                                        $present_attendance_status = $num_rows['student_login_time_status'];

                                                                        
                                                                            if(mysqli_num_rows($result) != 0) 
                                                                            {
                                                                                echo "<tr>
                                                                                        <td>$present_stud_id</td>
                                                                                        <td>$present_stud_lastname</td>
                                                                                        <td>$present_stud_firstname</td>
                                                                                        <td>$present_stud_log_time </td>
                                                                                        <td>$present_attendance_status</td>
                                                                                    </tr>";

                                                                               
                                                                            }
                                                                            
                                                                    }
                                                                     echo "</table><br>"; 

                                                                }

                                                ?>
                                                                <h6 style="text-align:center;color:#FF9200;"><b>Attendance (Absent)</b></h6>
                                                <?php
                                                                if(mysqli_num_rows($resultT) != 0) 
                                                                {
                                                ?>                 <b>Total Absences:</b> <b style="color:red"><?php echo $_SESSION['ses_absent']; ?></b><br>
                                                <?php
                                                                    echo '<table id="instructor_reports_absent_table" class="table table-hover  flex-nowrap" style="width:100%">';
                                                                        echo '<thead>';
                                                                        echo '<tr>
                                                                             <th>School ID</th>
                                                                            <th>Last Name</th>
                                                                            <th>First Name</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                     </thead>';
                                                                    $sql_absent = "SELECT * FROM attendance_report where faculty_school_id = '".$_SESSION['session_id']."' and fullcourse_name = '".$_SESSION['rsq2']."' and date_attended = '".$_SESSION['fdate']."' and attendance_check = 0";
                                                                    $result_absent = mysqli_query($link,$sql_absent) or die (mysqli_error());
                                                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result_absent) ; $a++ )
                                                                    {
                                                                        $present_stud_id = $num_rows['school_id'];
                                                                        $present_stud_firstname = $num_rows['stud_firstname'];
                                                                        $present_stud_lastname = $num_rows['stud_lastname'];
                                                                        $present_stud_log_time = $num_rows['student_qr_login_time'];
                                                                        $present_attendance_status = $num_rows['student_login_time_status'];

                                                                        

                                                                                echo "<tr>
                                                                                        <td>$present_stud_id</td>
                                                                                        <td>$present_stud_lastname</td>
                                                                                        <td>$present_stud_firstname</td>
                                                                                        <td>$present_attendance_status</td>
                                                                                    </tr>";

                                                                                
                                                                            
                                                                            
                                                                    }
                                                                    echo "</table><br><br>"; 

                                                                }

                                                            }
                                                            else  //NO DATA BUT THE TABLE IS SHOWN
                                                            {

                                                                ?>
                                                                <h6 style="text-align:center;color:#FF9200;"><b>Attendance (Present)</b></h6>
                                                <?php
                                                                if(mysqli_num_rows($resultT) != 0) 
                                                                {
                                                ?>                 <b>Total Attended:</b> <b style="color:red"><?php echo $_SESSION['ses_present']; ?></b><br>
                                                <?php
                                                                    echo '<table id="instructor_reports_present_table" class="table table-hover  flex-nowrap" style="width:100%">';
                                                                        echo '<thead>';
                                                                        echo '<tr>
                                                                             <th>School ID</th>
                                                                            <th>Last Name</th>
                                                                            <th>First Name</th>
                                                                            <th>Log Time</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                     </thead>';
                                                                    $sql_present = "SELECT * FROM attendance_report where faculty_school_id = '".$_SESSION['session_id']."' and fullcourse_name = '".$_SESSION['rsq2']."' and date_attended = '".$_SESSION['fdate']."' and attendance_check = 1";
                                                                    $result = mysqli_query($link,$sql_present) or die (mysqli_error());
                                                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
                                                                    {
                                                                        $present_stud_id = $num_rows['school_id'];
                                                                        $present_stud_firstname = $num_rows['stud_firstname'];
                                                                        $present_stud_lastname = $num_rows['stud_lastname'];
                                                                        $present_stud_log_time = $num_rows['student_qr_login_time'];
                                                                        $present_attendance_status = $num_rows['student_login_time_status'];

                                                                        
                                                                            if(mysqli_num_rows($result) != 0) 
                                                                            {
                                                                                echo "<tr>
                                                                                        <td>$present_stud_id</td>
                                                                                        <td>$present_stud_lastname</td>
                                                                                        <td>$present_stud_firstname</td>
                                                                                        <td>$present_stud_log_time </td>
                                                                                        <td>$present_attendance_status</td>
                                                                                    </tr>";

                                                                               
                                                                            }
                                                                            
                                                                    }
                                                                     echo "</table><br>"; 

                                                                }

                                                ?>
                                                                <h6 style="text-align:center;color:#FF9200;"><b>Attendance (Absent)</b></h6>
                                                <?php
                                                                if(mysqli_num_rows($resultT) != 0) 
                                                                {
                                                ?>                 <b>Total Absences:</b> <b style="color:red"><?php echo $_SESSION['ses_absent']; ?></b><br>
                                                <?php
                                                                    echo '<table id="instructor_reports_absent_table" class="table table-hover  flex-nowrap" style="width:100%">';
                                                                        echo '<thead>';
                                                                        echo '<tr>
                                                                             <th>School ID</th>
                                                                            <th>Last Name</th>
                                                                            <th>First Name</th>
                                                                            <th>Status</th>
                                                                        </tr>
                                                                     </thead>';
                                                                    $sql_absent_data = "SELECT * FROM attendance_report where faculty_school_id = '".$_SESSION['session_id']."' and fullcourse_name = '".$_SESSION['rsq2']."' and date_attended = '".$_SESSION['fdate']."' and attendance_check = 0";
                                                                    $result_absent = mysqli_query($link,$sql_absent_data) or die (mysqli_error());
                                                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result_absent) ; $a++ )
                                                                    {
                                                                        $present_stud_id = $num_rows['school_id'];
                                                                        $present_stud_firstname = $num_rows['stud_firstname'];
                                                                        $present_stud_lastname = $num_rows['stud_lastname'];
                                                                        $present_stud_log_time = $num_rows['student_qr_login_time'];
                                                                        $present_attendance_status = $num_rows['student_login_time_status'];

                                                                                echo "<tr>
                                                                                        <td>$present_stud_id</td>
                                                                                        <td>$present_stud_lastname</td>
                                                                                        <td>$present_stud_firstname</td>
                                                                                        <td>$present_attendance_status</td>
                                                                                    </tr>";

                                                                            
                                                                    }
                                                                    echo "</table><br>"; 

                                                                }


                                                            }

                                                        }

                                            }
                    
                                                     
                                    ?>            
                                       
                                        </form>
                                <?php  } ?>
                                        
                                </div> 
                                 
                    </div>
                </ul>
        <?php   
               
        ?>

    
                    </div> 
               </form>
                    </div>
                </ul>

            </div>
        </div>
            
<!-- jQuery library -->

                 



<script type="text/javascript" src="calendar/calendar.js"></script>
 <?php include 'footer_scripts.php'; ?>
 
 <script type="text/javascript">
            $(document).ready(function () {
             $('#instructor_reports_present_table').DataTable();
                });
        </script>

 <script type="text/javascript">
            $(document).ready(function () {
             $('#instructor_reports_absent_table').DataTable();
                });
        </script>

 <script type="text/javascript">
        /* Formatting function for row details - modify as you need */
        function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        
        '</td>' +
        '<td style="margin-left:1%">' +
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
        '</td>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#instructor_csd_class_load_present').DataTable({
                processing: true,
                ajax: "instructor_reports_ajax_present.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [0,1,2,3,4,5] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'attendance_id' },
                    { data:'faculty_school_id' },
                    { data:'school_year' },
                    { data:'semester_type' },
                    { data: 'fullcourse_name' },
                    { data: 'school_id'},
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname' },
                    { data:  'student_qr_login_time'},
                    { data: 'student_login_time_status'},
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#instructor_csd_class_load_present tbody').on('click', 'td.dt-control', function () {
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


      //absent

 function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        
        '</td>' +
        '<td style="margin-left:1%">' +
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
        '</td>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#instructor_csd_class_load_absent').DataTable({
                processing: true,
                ajax: "instructor_reports_ajax_absent.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [0,1,2,3,4,5,9] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'attendance_id' },
                    { data:'faculty_school_id' },
                    { data:'school_year' },
                    { data:'semester_type' },
                    { data: 'fullcourse_name' },
                    { data: 'school_id'},
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname' },
                    { data:  'student_qr_login_time'},
                    { data: 'student_login_time_status'},
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_absent_status" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp'
                            ;

                      }}
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#instructor_csd_class_load_absent tbody').on('click', 'td.dt-control', function () {
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





      //        

        document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("Select");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Select first");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})


        $(document).ready(function(){  
                      $("#request").change(function(){  
                        var request = $(this).val();  
                        $.ajax({  
                          url:"fetch_student.php",  
                          method:"POST",  
                          data:{request:request},  
                          success:function(data){  
                            $('#result').html(data);
                          // $('#add_student_class_list').modal('show');  
                          }  
                        });  
                      });  
                    });
    </script>




      

        
            


     <?php include 'logout.php';?>




<!---- ###########################################   ADDDDDD STUDENT    ########################################################## -->
                    
<div class="modal fade" id="add_student_class_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                    </div>
                    <p style="text-align:left; margin-left: 2px;"><text class="text-danger">Note: Make sure to review all fields.</text></p>

                    <div class="modal-body">
                        <p style="color:red;margin-top:-10px"><b>Course:</b><br><?php $dr = $_SESSION['rsq2']; echo "<text style='color:black;text-decoration: underline'>$dr</text>";?></p>
                            <?php
                                 function fill_invoice($link)  
                                 {  
                                      $output = '';  
                                      $sql = "SELECT * FROM students";  
                                      $result = mysqli_query($link, $sql);  
                                      while($row = mysqli_fetch_array($result))  
                                      {  

                                           $output .= '<option value="'.$row["stud_id"].'" >'.$row["stud_id"].'</option>';
                                           
                                      }  
                                      return $output;  
                                 }
                            ?>
                        
                            <div class="form-label-group">
                                        <select class="form-control" name="request" id="request">
                                            <option required>Select Sudent ID</option>
                                            <?php echo fill_invoice($link); ?>  
                                        </select>   
                                    <label for="disabledSelect" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>  <br>
                                
                                    <div id="result" style="background-color:green">
                                        
                                    </div>
                                
                                    


                     </div>

                           

                </div>
            </div>
        </div>
     
            



<!--------------------------------------     UPDATE GRADE 11 - STUDENT    ----------------------------------->              

<form method="post">
        <div class="modal fade" id="update_absent_status"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Status (Absent)</h5>
                        <button class="btn btn-secondary float-right" data-dismiss="modal" style="float: right;">Cancel</button>
                    </div>
                     <div class="modal-body">
                    <p class="sub-text"><text class="text-danger">Note: Make sure to review all fields.</text></p>
                         <form class="form-signin" method="POST">
                                <div class="form-label-group" style="display: none">
                                    <input type="text" name="idIF" id = "id_id" class="form-control col-sm-10"   required>
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_id" id = "up_stud_id" class="form-control col-sm-3" placeholder="e.g: 2018-06-15">
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
                                        <select class="form-control" name="stud_department" id="d">
                                            <option value="Absent" selected="">Absent</option>
                                            <option value="Excuse">Excuse</option>
                                        </select>   
                                    <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;font-size: 16px;">Status</label>
                                </div>

                                <button class="btn btn-success btn-lg btn-block mb-4 mt-4" type="submit" name = "update-student" style="color:white;font-family: 'Fjalla One', cursive;font-size: 20px">Save Changes</button>
                            </form>
                     </div>
                        
                </div>
            </div>
        </div>
    </form>
    
</body>

</html>
