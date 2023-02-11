<?php 

if($user_Type == 'Administrator')
{
      if(isset($_POST['logout']))
      {
    
        session_destroy();
           header('location:index.php');
            exit();
            
        }
}
else
{
    if(isset($_POST['logout']))
      { 
        session_destroy();
        header('location:index.php');
        exit();
    }
}

?>


       



