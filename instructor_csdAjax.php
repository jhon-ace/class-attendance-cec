
<?php 
   include 'config.php';



        $sql2 = "SELECT * FROM user where user_department = 'CSD' and user_type = 'Instructor' and user_schoolyear = '".$_SESSION['g_session']."' ORDER BY user_lastname ASC";
        
        $result = mysqli_query($link, $sql2);
        while($row = mysqli_fetch_assoc($result)) 
        {
            $array[] = $row;
            $rt = $row['user_schoolyear'];
        }

            $dataset = array(
                "echo" => 1,
                "totalrecords" => count($array),
                "totaldisplayrecords" => count($array),
                "data" => $array
            );

                echo json_encode($dataset);
   
    
 ?>



