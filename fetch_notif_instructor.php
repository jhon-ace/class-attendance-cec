<?php
//fetch.php;
$link = mysqli_connect("localhost","root","","attendance-final");
if(isset($_POST["view"]))
{


  $query = "SELECT * FROM attendance where attendance_logs_date ='2023-01-26 13:25:57' and attendance_status = 0 ORDER BY instructor_attendance_log_id Limit 8";
 $result = mysqli_query($link, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   
   <li>
    <a href="">
     <strong>'.$row["user_school_id"].'</strong><br />
     <small><em>Status: '.$row["status"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 

 $count = mysqli_num_rows($result);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>