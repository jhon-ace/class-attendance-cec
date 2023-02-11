<?php include 'config.php';?>
<?php

   if(isset($_POST['selectedValue']))
   {
      $selectedValue = $_POST['selectedValue'];

      $sql ="SELECT  * FROM user where user_department = 'CSD' and user_type = 'Instructor' and user_schoolyear ='".$_SESSION['g_session']."' and semester = '".$_SESSION['g_session2']."' and user_school_id ='".$selectedValue."'";
      $result = mysqli_query($link, $sql);

       for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
      {

         $school_idD = $num_rows['user_school_id'];
         $userlnameD = $num_rows['user_lastname'];
         $userfnameD =$num_rows['user_firstname'];
         $user_imageD = $num_rows['user_image'];
         $_SESSION['try_id'] = $school_id;
         $_SESSION['sadsad'] = $userlnameD;
      }

       echo $school_idD;
   }


    
   
   
?>