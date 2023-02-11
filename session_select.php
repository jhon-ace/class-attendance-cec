<?php include'config.php';?>

<?php
$sessionID = $_SESSION['userID'];
$res1 = "SELECT * FROM user WHERE user_school_id = '".$sessionID."'";
$result1 = mysqli_query($link, $res1) or die(mysqli_error());
    for($i=0; $i<$num_rows=mysqli_fetch_array($result1);$i++) 
    {
        $user_school_id = $num_rows["user_school_id"];
        $userfname= $num_rows["user_firstname"];
        $userlname= $num_rows["user_lastname"];
        $user_Type = $num_rows["user_type"];
        $user_image = $num_rows["user_image"];
        $user_school_year = $num_rows["user_schoolyear"];
        $semester = $num_rows["semester"];



        $_SESSION['session_name'] = $userlname;
        $_SESSION['session_id'] = $user_school_id;
        $_SESSION['session_school_year'] = $user_school_year;
        $_SESSION['session_semester'] = $semester;
        
    }
?>