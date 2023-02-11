<?php include 'session_select.php'; ?>
<?php include 'logout_session.php'; ?>
<?php include 'session_destroyer.php'; ?>
<?php include 'header_links.php';?>
<?php

    $server = "localhost";
    $username="root";
    $password="";
    $dbname="attendance-final";
    
    $conn = new mysqli($server,$username,$password,$dbname);

        $faculty_school_id = $_SESSION['session_id'];
        $faculty_school_year = $_SESSION['session_school_year'];
        $faculty_semester = $_SESSION['session_semester'];
        $fullcourse_name = $_SESSION['rsq2'];
        $sched_in = $_SESSION['in_s'];
        $sched_out = $_SESSION['out_s'];

    if(isset($_POST['text']))
    {
        
        $text =$_POST['text'];
        $_SESSION['idText'] = isset($_POST['text']);
       

        $sql_query1 = "SELECT * from students where school_id = '".$text."'";
        $result_query1 = mysqli_query($link, $sql_query1);
        for($i = 0; $i < $num_rows=mysqli_fetch_array($result_query1); $i++)
        {
            $skol = $num_rows["school_id"];
            $stud_lastname = $num_rows["stud_lastname"];
            $stud_firstname = $num_rows["stud_firstname"];
        }

        $sql_query2 = "INSERT INTO attendance_report(attendance_id,faculty_school_id,school_year,semester_type,fullcourse_name,faculty_course_schedule_in,faculty_course_schedule_out,school_id,stud_lastname,stud_firstname,attendance_check,date_attended,student_qr_login_time,student_login_time_status) VALUES('','$faculty_school_id','$faculty_school_year','$faculty_semester','$fullcourse_name','$sched_in','$sched_out','$text','$stud_lastname','$stud_firstname','1',CURDATE(),TIME_FORMAT(NOW(), '%r'),'On time attendance')";

      //  if($conn->query($sql_query2) ===TRUE){
      //     ECHO "<center><h1>Successfully Inserted</center>";
      //  }else{
           // echo "Error : " .$sql . "<br>" . $conn->error;
       // }

    }
        $conn->close();

        header("refresh:1;url=successful_attendance.php");
       


?>