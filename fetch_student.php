

<?php  
 //filter.php 
$link = mysqli_connect("localhost", "root","","attendance-final");
    if (isset($_POST["request"])) 
    {       
          $output = '';
            $request = $_POST["request"];
            $query = "SELECT * FROM students WHERE stud_id = '".$request."'";
            $result = mysqli_query($link, $query) or die(mysqli_error());

           if (mysqli_num_rows($result) > 0) {

               $output .= '<br><br><div class="form-label-group" id="result" style="background-color:green">
                                        <h1>success</h1>
                                    </div>';
          } 
          else 
          {
               $output .= '<div class="form-label-group" id="result" style="background-color:green">
                                        <br><br><h1>walay data</h1>
                                    </div>';
          }
               echo $output;
               }
?>
