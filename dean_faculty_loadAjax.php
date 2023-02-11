<?php include 'session_select.php';?>
<?php 
   

        


if($user_Type == 'Dean')
{
        


            $sql = "SELECT * FROM faculty_load where faculty_school_id = '".$_SESSION['school_id']."'";
            $result = mysqli_query($link,$sql) or die (mysqli_error());


                        while($row = mysqli_fetch_assoc($result)) 
                        {
                            $array[] = $row;
                            
                        }

                    $dataset = array(
                        "echo" => 1,
                        "totalrecords" => count($array),
                        "totaldisplayrecords" => count($array),
                        "data" => $array
                    );

                      echo json_encode($dataset);
}
else if ($user_Type == 'Instructor')
{

   $sql = "SELECT * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."'";
            $result = mysqli_query($link,$sql) or die (mysqli_error());


                        while($row = mysqli_fetch_assoc($result)) 
                        {
                            $array[] = $row;
                        }

                    $dataset = array(
                        "echo" => 1,
                        "totalrecords" => count($array),
                        "totaldisplayrecords" => count($array),
                        "data" => $array
                    );

                      echo json_encode($dataset);
}

    /*else
    {

               // $sklyr = isset($_GET["skol_yr"]);


                 $sql = "SELECT * FROM course where  course_department = 'CSD' and instructor_id_no = '".$user_school_id."' ";
                        $result = mysqli_query($link, $sql);

                        while($row = mysqli_fetch_assoc($result)) 
                        {
                            $array[] = $row;
                        }

                            $dataset = array(
                                "echo" => 1,
                                "totalrecords" => count($array),
                                "totaldisplayrecords" => count($array),
                                "data" => $array
                            );

                            echo json_encode($dataset);
            
           
       
    }*/
       

  
 ?>



