<?php include 'session_select.php';?>
<?php 
   
    if($user_Type=='Dean')
    {

        //if(isset($_POST['show']))
       // {


          $query = isset($_GET['yearDisplay']);


            $sql = "SELECT * FROM course where course_department = 'CSD' and year_Level = '".$query."'";
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
       // }

        
        
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



