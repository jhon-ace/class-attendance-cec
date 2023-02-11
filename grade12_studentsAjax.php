
<?php 
   include 'config.php';
   
   $sql = "SELECT * FROM students where stud_year = 'G-12' ORDER BY stud_lastname ASC";
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



