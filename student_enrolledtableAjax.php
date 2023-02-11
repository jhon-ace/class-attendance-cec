
<?php 
   include 'config.php';
   
   $sql = "SELECT * FROM students where stud_schoolyear = '".$_SESSION['session_studacadyr']."'and stud_year ='".$_SESSION['session_yrdisplay']."' and stud_semester = '".$_SESSION['semesterDisplay']."' ORDER BY stud_lastname ASC";
    $result = mysqli_query($link, $sql);


            while($row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }

            $dataset = array(
                "echo" => 1,
                "totalrecords" => count($array),
                "totaldisplayrecords" => count($array),
                "data" => $array
            );

            echo json_encode($dataset);

 ?>



