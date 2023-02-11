<?php

 include 'config.php';
 
error_reporting(0);
  
  if(isset($_POST['toSubmit']))
  {  
    if(empty($_FILES['cameraFileInput']['name']))
    {
      $message = "Choose Image First!";
      echo "<script type='text/javascript'>alert('$message');</script>"; 
    }
    else
    {
      $directory = 'images/';
      $imgURL = $directory. basename($_FILES['cameraFileInput']['name']);
        move_uploaded_file($_FILES['cameraFileInput']['name'], $imgURL);
          
        $directory = 'images/';
        $imgURL = $directory. basename($_FILES['cameraFileInput']['name']);
          move_uploaded_file($_FILES['cameraFileInput']['tmp_name'], $imgURL);

          function triphoto_getGPS($imgURL='')
          {
            //get the EXIF all metadata from Images
            $exif = exif_read_data($imgURL);
          
            if(isset($exif["GPSLatitudeRef"])) 
            {
              $LatM = 1; $LongM = 1;
              if($exif["GPSLatitudeRef"] == 'S') 
              {
                  $LatM = -1;
              }

              if($exif["GPSLongitudeRef"] == 'W') 
              {
                  $LongM = -1;
              }

              //get the GPS data
              $gps['LatDegree']=$exif["GPSLatitude"][0];
              $gps['LatMinute']=$exif["GPSLatitude"][1];
              $gps['LatgSeconds']=$exif["GPSLatitude"][2];
              $gps['LongDegree']=$exif["GPSLongitude"][0];
              $gps['LongMinute']=$exif["GPSLongitude"][1];
              $gps['LongSeconds']=$exif["GPSLongitude"][2];

              //convert strings to numbers
              foreach((array)$gps as $key => $value){
                  $pos = strpos($value, '/');
                  if($pos !== false){
                      $temp = explode('/',$value);
                      $gps[$key] = $temp[0] / $temp[1];
                  }
              }

              //calculate the decimal degree
              $result['latitude']  = (float)$LatM * ($gps['LatDegree'] + ($gps['LatMinute'] / 60) + ($gps['LatgSeconds'] / 3600));
              $result['longitude'] = (float)$LongM * ($gps['LongDegree'] + ($gps['LongMinute'] / 60) + ($gps['LongSeconds'] / 3600));
             // $result['datetime']  = $exif["DateTime"];

              return $result;

            }


          }   
            
            $returned_data = triphoto_getGPS($imgURL);

            $lat = $returned_data['latitude'];
            $long = $returned_data['longitude'];

              $reports_name = "reports no. 1";
              $reports_file = $imgURL;
              $reports_latitude = $lat;
              $reports_longitude =$long;
              $status = 1;

            if(!empty($lat && $long))
            {
              $sqe = "INSERT into reports(reports_id,reports_name,reports_file,reports_latitude,reports_longitude, status) VALUES('','$reports_name','$reports_file','$reports_latitude','$reports_longitude', '$status')";
             
                mysqli_query($link, $sqe);

                  $message = "Successful Entry!";
                    echo "<script type='text/javascript'>alert('$message');
                          </script>"; 
            }
            else
            {

              $sqe = "INSERT into reports(reports_id,reports_name,reports_file,reports_latitude,reports_longitude, status) VALUES('','$reports_name','$reports_file','$reports_latitude','$reports_longitude', '$status')";
             
                mysqli_query($link, $sqe) or die (mysqli_error());
                $message = 'CAPTURE FAILED!'.'\n'.'\n'.'Please steady your phone while capturing!';
                  echo "<script type='text/javascript'>alert('$message');
                        </script>";   
                        //window.location.assign('ajbey.php');
            }

    }
  }
    





?>

<!doctype html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="images/csd_logo.png" type="image/x-icon">
    <title>CSD - Classroom Attendance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="ACE CASABUENA">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
         
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
        <script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgWf-sGi6xFPl60LciRkc8R3wibBH09V4&callback=initMap"></script>
        <style>
        #map{
                width: 100%;
                height: 400px;
            }
        </style>
        
  </head>
  <body>
    
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar" style="background-color: #373333 !important">
        <div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/csd_logo.png);"></a>
          <p style="margin-top:-20px;text-align:center;">Welcome, <text style="color:red;text-decoration:underline"></text></p><br>
          <ul class="list-unstyled components mb-5">
          <li>
                <a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
            </li>
            <li>
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle text-success"><i class="fa fa-users" aria-hidden="true"></i> Students</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li class="active">
                    <a href="grade11_students.php"><i class="fa fa-user" aria-hidden="true"></i> Grade 11</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Grade 12</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> 1st Year</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> 2nd Year</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> 3rd Year</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> 4th Year</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Faculty</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-flag" aria-hidden="true"></i> Reports</a>
            </li>
            <li>
              <a href="#settingsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</a>
              <ul class="collapse list-unstyled" id="settingsMenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
            </li>
          </ul>
          <div class="footer text-center" style="margin-top:50px">
            <p>
              This system was made by Computer Studies Department</a>
             </p>
          </div>

        </div>
      </nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

          <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
              </button>           
            </div>
            
            
          </nav>
          <ul class="navbar list-unstyled">
      <li><form method="POST" enctype="multipart/form-data">
          <div class="card" style="width: 20rem;margin-top: 10px">
              <div class="card-body py-1 text-center">

                  <div id="my_camera" ></div>
                  <br>
                  <img id="pictureFromCamera" width="100px" height="100px" style="margin-bottom: 10px !important" data-name="image"/>
                  
                  <input type="file" id="cameraFileInput" accept="images/*" capture="environment" style="display:none;" name="cameraFileInput" style="width:50px;height:50px"><br>
                  <label name="ace" for="cameraFileInput" class="btn btn-large" style="border: 1px solid black;cursor:pointer"><i class="fa fa-file" aria-hidden="true"></i> Choose File</label><br>

                 
                  <button type="submit" class="btn btn-success" name="toSubmit">Submit</button>
                  <br>
                  <br>
                  
          <!--    <p>Longitude: <?php echo $imgLat;?></p>
              <br>
              <p>Latitude <?php echo $imgLng;?></p> -->

              </div>
          </div>
          
        </form>
      </li>

      <li>
        <div class="card" style="width: 60rem;margin-top: 10px;margin-right:10px;">
            <div class="card-body py-1 text-center">
             
                <p class="card-text text-center" style="text-align: justify;">Reports List: </p>
                <div class="card-content table-responsive">
                                         
                                         <br>
                                    <table class="table" id="dtTable">
                                        <thead style="font-weight: bold;color: black;font-size: 15px">
                                            <th>Reports Name</th>
                                            <th>Report File</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            
                                           include_once('config.php');

                                            
                                            $sql = mysqli_query($link,"SELECT * FROM reports ORDER BY reports_id ASC");
                                        
                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                            {
                                                $rep_id = $num_rows['reports_id'];
                                                $rep_name = $num_rows['reports_name'];
                                                $rep_file = $num_rows['reports_file'];
                                                $rep_latitude = $num_rows['reports_latitude'];
                                                $rep_longitude = $num_rows['reports_longitude'];
                                                $rep_status = $num_rows['status'];
                                                
                                            ?>
                                                <tr>
                                                    <td style="display:none"><?=$rep_id;?></td>
                                                    <td><?=$rep_name;?></td>
                                                    <td><?=$rep_file;?></td>
                                                    <td style="display:none"><?=$rep_latitude;?></td>
                                                    <td style="display:none"><?=$rep_longitude;?></td>
                                                    <td style="display:none"><?=$rep_status;?></td>
                                                    <td><button type="button" class="btn btn-primary viewMapButton" data-toggle="modal" data-target="#viewMap" data_id="'.$num_rows['reports_id'].'" style="color:black;">View Map</button></td>
                                                    <td><button type='button' class='btn-primary blockbt' data-toggle='modal' data-target='#update_student_grade11' style='cursor:pointer;color:black;border-radius:6px;color:;' class='btn-primary'><i class='fa fa-pencil-square-o' style='color:white'></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                        <?php }


                                         ?>

                                        </tbody>
                                    </table>
                  </div>
            </div>
          </div>
      </li>

      

    </ul>

      </div>
    </div>
    <script language="JavaScript">
    document
      .getElementById("cameraFileInput")
      .addEventListener("change", function () {

        document
          .getElementById("pictureFromCamera")
          .setAttribute("src", window.URL.createObjectURL(this.files[0]));

       
      });

      
</script>




   
  <!--<script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgWf-sGi6xFPl60LciRkc8R3wibBH09V4&callback=initMap"></script>-->
 
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  <div class="modal fade" id="viewMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Report Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

          <script type="text/javascript">
    
  
      $(".viewMapButton").click(function(){
           $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function () 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);
                    $('#view_id').val(data[0]);
                    $('#view_filename').val(data[1]);
                    $('#view_file').val(data[2]);
                    $('#view_latitude').val(data[3]);
                    $('#view_longitude').val(data[4]);
                    $('#view_status').val(data[5]);

                  var image = new google.maps.LatLng(data[3],data[4]);
                  

                  console.log(image);
                  showMap(image) ;

                });
            
                function showMap(image){
                    

                            var marker = new google.maps.Marker({
                            position: image
                        });
                      var opt = {
                            center: image,
                            zoom: 13,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        map = new google.maps.Map(document.getElementById("map"), opt);
                        marker.setMap(map);
                    };
  </script>


        <div class="modal-body">
          <div class="form-label-group">
              <label for="view_id" style="color:black;font-family: 'Livvic', sans-serif;">Reports ID: </label>
              <input type="text" class="form-control" id="view_id">
          </div><br>

          <div class="form-label-group">
              <label for="view_id" style="color:black;font-family: 'Livvic', sans-serif;">Latitude: </label>
              <input type="text" class="form-control" id="view_latitude">
          </div><br>

          <div class="form-label-group">
              <label for="view_id" style="color:black;font-family: 'Livvic', sans-serif;">Longitude: </label>
              <input type="text" class="form-control" id="view_longitude">
          </div><br>
          <script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgWf-sGi6xFPl60LciRkc8R3wibBH09V4&callback=initMap"></script>
          
          <div class="form-label-group">  
              <div id="map"></div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  </body>


</html>
 