<?php include 'session_select.php'; ?>
<?php include 'logout_session.php'; ?>
<?php include 'session_destroyer.php'; ?>
<?php include "header_links.php";?>

    <body style="font-family:Franklin Gothic Book">
        <div class="wrapper d-flex align-items-stretch">
            <?php
                if($user_Type=='Administrator')
                {

                    include 'admin_sidebar.php'; 

                }
                else if($user_Type=="Dean")
                {
                    include 'dean_sidebar_students_csd.php'; 
                }
                else if($user_Type=="Instructor")
                {
                    include 'instructor_sidebar_classlist.php';
                }
            ?>

            <?php
                if($user_Type=='Dean')
                {
            ?> 
            <div id="content" class="p-4 p-md-8">
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <div class="col" style="margin-left:-16px;margin-right:-10px">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> 
                        </div>
                            <a href="students_csd.php" class = "btn btn-info" type='button' style="float: right;margin-top: 0px;" ><i class="fa fa-refresh"></i></a>
                    </div>
                </nav>

                <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
                    <div class="card-content table"><br>
                        <center><p><img src="images/csd_logo.png" height="20px" width="20px" style="margin-top:-7px;" /><b> COMPUTER STUDIES DEPARTMENT</b></p></center>
                        <div class="container-fluid text">
                            <button class = "btn btn-info" type='button' data-toggle="modal" data-target="#add_student_grade11" style="float: right;margin-left: 5px;margin-top: 0px;" ><i class="fa fa-user-plus fa-10x" title='ja;lsj'></i>
                            </button>&nbsp;
                            <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>LIST OF ENROLLED STUDENTS</b></p>
                        </div><br>

                        <form method="POST">
                            <?php 
                                $sql = mysqli_query($link,"SELECT  * FROM schoolyear");
                                echo "<div class='form-group'>";
                                
                                echo "<label for='sel1' >Select:&nbsp;</label>";
                                echo "<select name='academicyearDisplay' class='form-control-sm ' id='sel1'required>";
                                echo "<option value=''>School Year</option>";
                                for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                      $school_id = $num_rows['schoolyear_ID'];
                                      $school_yr = $num_rows['school_year'];

                                      $_SESSION['session_schoolyr'] = $school_yr;
                                    //  echo "ID NUMBER:".." ";

                                      echo " 
                                            <option>$school_yr</option>

                                      ";
                                    }
                                    
                                echo "</select>&nbsp;";
                                //echo "<br>";
                                $sql = mysqli_query($link,"SELECT  * FROM yearlevel");

                                echo "<select name='yearDisplay' class='form-control-sm ' id='sel1'required>";
                                echo "<option value=''>Year Level</option>";
                                for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                      $id = $num_rows['yearlevel_id'];
                                      $yrlvl = $num_rows['year'];

                                      $_SESSION['session_yrlvl'] = $yrlvl;
                                    //  echo "ID NUMBER:".." ";

                                      echo " 
                                            <option>$yrlvl</option>

                                      ";
                                    }
                                    
                                echo "</select>&nbsp;";
                                 echo "<select name='semesterDisplay' class='form-control-sm ' id='sel1' required>";

                                echo "<option value=''>Semester</option>";
                                $sql = mysqli_query($link,"SELECT  * FROM semester");
                                for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                    {
                                      $sems_id = $num_rows['semester_id'];
                                      $semester_type = $num_rows['semester_type'];

                                      $_SESSION['session_semtype'] = $semester_type;
                                    //  echo "ID NUMBER:".." ";

                                      echo "

                                            <option>$semester_type</option>
                                      ";

                                    }
                                    
                                echo "</select>";
                                //echo "<br>";
                                echo "&nbsp;<button class='btn btn-success btn-sm' name='show' style='margin-top: -3px'>&nbsp;Display&nbsp;</button> ";
                                echo "</div>";

                            ?>

                        </form>

                        <div class="card-content table-responsive">
                                    <?php

                                            if(isset($_POST['show']))
                                            {

                                                $fetchacadschoolYear = $_POST['academicyearDisplay'];
                                                $fetchyearDisplay = $_POST['yearDisplay'];
                                                $fetch_semester = $_POST['semesterDisplay'];
                                                $_SESSION['session_studacadyr'] = $fetchacadschoolYear;
                                                $_SESSION['session_yrdisplay'] = $fetchyearDisplay;
                                                $_SESSION['semesterDisplay'] = $fetch_semester;

                                                
                                                  
                                    ?>
                                            
                                            <p>School Year: <b style="color:red;"><?php echo $fetchacadschoolYear;?></b>&nbsp;
                                            Year Level: <b style="color:red;"><?php echo $fetchyearDisplay;?></b>&nbsp;
                                            Semester: <b style="color:red;"><?php echo $fetch_semester;?></b></p>
                                    <?php 

                                                $sql = "SELECT * FROM students where stud_schoolyear = '".$_SESSION['session_studacadyr']."'and stud_year ='".$_SESSION['session_yrdisplay']."' and stud_semester = '".$_SESSION['semesterDisplay']."' ORDER BY stud_lastname ASC";
                                                $result = mysqli_query($link, $sql);

                                                if(mysqli_num_rows($result) == 0) 
                                                {
                                                    //date_default_timezone_set("Singapore");
                                                    //echo "The time is " . date("Y");
                                                    echo "<h5 style='text-align:center'>No data available</h5>";
                                                }
                                                else
                                                {
                                                    echo '<table id="studentenrolledtable_csd" class="table table-hover  flex-nowrap" style="width:100%">';
                                                        echo '<thead>';
                                                            echo '<tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th>School ID</th>
                                                                <th>Lastname</th>
                                                                <th>Firstname</th>
                                                                <th>QR Code</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                         </thead>';
                                                    echo "</table>"; 
                                                }
                                                     
                                            }


                               
                                        if(isset($message))
                                         {   echo "<br>";
                                            echo "<center><text class='text-danger font-weight-bold font-italic'>$message</text></center>"  ; 
                                         }

                                    ?>
                                </div> 
                            </div>
                    </div>
                    <br>&nbsp;
                </ul> 
            </div>
        </div>    
  
        <?php include 'footer_scripts.php'; ?>

     <script type="text/javascript">
        /* Formatting function for row details - modify as you need */
        function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%;display:hidden">' +
       
        '</td>' +
        '<td style="display:flex;justify-content:center;align-items:center">' +
        '<img src="'+d.stud_image+'" height="300px" width="300px"  />'+
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#studentenrolledtable_csd').DataTable({
                processing: true,
                ajax: "student_enrolledtableAjax.php",

  


                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [1,] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'stud_id' },
                    { data:'school_id' },
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname' },
                    { data: 'stud_qrcode' },
                    { data: 'stud_status' },
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_student_grade11" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp;<a class="" data-toggle="modal" data-target="" style="border-radius:4px"><i class="fa fa-unlock-alt" style="color:red;cursor:pointer"></i></a>'
                            ;

                      }},

                ],

                order: [[1, 'asc']],
                 error: function () {
                       alert("No Data Available");
                   },


                        
            });
         
            // Add event listener for opening and closing details
            $('#studentenrolledtable_csd tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

         
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });


              
    </script>
      

<?php
    }
    else if($user_Type=="Instructor")
    {
?> 


        <div id="content" class="p-4 p-md-8">
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <div class="col" style="margin-left:-16px;margin-right:-10px">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> 
                        </div>
                            <a href="instructor_load.php" class = "btn btn-info" type='button' style="float: right;margin-top: 0px;" ><i class="fa fa-refresh"></i></a>
                    </div>
                </nav>

                <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
                    <div class="card-content table"><br>
                        <center><p><img src="images/csd_logo.png" height="20px" width="20px" style="margin-top:-4px;" /><b> COMPUTER STUDIES DEPARTMENT</b></p></center>
                        <div class="container-fluid text">
                            
                            <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>Faculty Load</b></p>
                        </div>
        <form method="POST">
                                    <?php 

                                        $sql = mysqli_query($link,"SELECT  * FROM schoolyear");
                                            echo "<label for='sel1' >Select:&nbsp;</label>";
                                            echo "<select  name='schoolyearDisplay' class='form-control-sm' id='sel1'required>";
                                            echo "<option value=''>School Year</option>";
                                                    for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                                        {
                                                          $school_yr = $num_rows['school_year'];
                                                          echo "<option>$school_yr</option>";
                                                        }
                                            echo "</select>";

                                             echo "&nbsp;<select name='semesterDisplay' class='form-control-sm ' id='sel1' required>";

                                            echo "<option value=''>Semester</option>";
                                            $sql = mysqli_query($link,"SELECT  * FROM semester");
                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                                {
                                                  $sems_id = $num_rows['semester_id'];
                                                  $semester_type = $num_rows['semester_type'];

                                                 // $_SESSION['session_semtype'] = $semester_type;
                                                //  echo "ID NUMBER:".." ";

                                                  echo "

                                                        <option>$semester_type</option>
                                                  ";

                                                }
                                                
                                            echo "</select>";
                                            echo "&nbsp<button class='btn btn-success btn-sm' name='show'>Display</button>";
                                    ?>
                                </form>
                                <div class="card-content table-responsive">
                                    <?php
                                            
                                            if(isset($_POST['show']))
                                            {

                                                $fetchschoolYearShow = $_POST['schoolyearDisplay'];
                                                $_SESSION['fetchYearShow'] = $fetchschoolYearShow;
                                                $fetchSemShow = $_POST['semesterDisplay'];
                                                $_SESSION['fetchSemShow'] = $fetchSemShow;  
                                    ?>
                                                <p>School Year: <b style="color:red;text-transform:uppercase;"><?php echo $fetchschoolYearShow;?></b>&nbsp;Semester: <b style="color:red;text-transform:uppercase;"><?php echo $fetchSemShow;?></b></p>

                                    <?php   
                                            
                                        
                                           
                                            $sql = "SELECT * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."' and faculty_load_school_year = '".$fetchschoolYearShow."' and faculty_load_semester = '".$fetchSemShow."'";
                                                    $result = mysqli_query($link, $sql);

                                             if(mysqli_num_rows($result) != 0) 
                                                {
                                                    
                                                    echo '<table id="instructor_csd_class_load" class="table table-hover  flex-nowrap" style="width:100%">';
                                                        echo '<thead>';
                                                            echo '<tr>
                                                                <th></th>
                                                                <th>ID</th>
                                                                <th>Faculty ID</th>
                                                                <th>School Year</th>
                                                                <th>Semester</th>
                                                                <th>Course Code</th>
                                                                <th>Course Name</th>
                                                                <th>Course Unit</th>
                                                                <th>Course Schedule</th>
                                                                <th>Action</th>
                                                            </tr>
                                                         </thead>';
                                                    echo "</table>"; 

                                                }
                                                else
                                                {
                                                    echo '<table id="" class="table table-hover  flex-nowrap" style="width:100%">';
                                                        echo '<thead>';
                                                            echo '<tr>
                                                                <th>Course Code</th>
                                                                <th>Course Name</th>
                                                                <th>Course Unit</th>
                                                                <th>Course Schedule</th>
                                                            </tr>
                                                         </thead>';
                                                    echo "</table>"; 
                                                    echo "<br>"; 
                                                    echo "<p style='text-align:center'><b style='color:red'>No Data Available</b></p>";
                                                }
                                          
                                        }
                

                                    ?>
    
                                </div> 

                    </div>
                    <br>
                </ul> 
            </div>
        </div>
  
        <?php include 'footer_scripts.php'; ?>
<script>


function showSelected() {
    var select = document.getElementById("data-select");
    var selectedValue = select.options[select.selectedIndex].value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", '',true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var output = document.getElementById("display-output");
            output.innerHTML = selectedValue;
        

    xhr.send("selectedValue=" + selectedValue);
  }
</script>
 <script type="text/javascript">
        /* Formatting function for row details - modify as you need */
        function format(d) {
        // `d` is the original data object for the row
        return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        
        '</td>' +
        '<td style="margin-left:1%">' +
        '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
        '</td>' +
        '<td><i class="fa fa-picture-o"></i></td>' +
        '<td style="margin-left:70%">' +
        
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#instructor_csd_class_load').DataTable({
                processing: true,
                ajax: "dean_faculty_loadAjax.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [0,1,2,3,4,9] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'faculty_load_id' },
                    { data:'faculty_school_id' },
                    { data:'faculty_load_school_year' },
                    { data:'faculty_load_semester' },
                    { data: 'faculty_course_code' },
                    { data: 'faculty_course_name' },
                    { data: 'faculty_course_unit' },
                    { data: 'faculty_course_schedule' },
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_student_grade11" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp;<a class="" data-toggle="modal" data-target="" style="border-radius:4px"><i class="fa fa-unlock-alt" style="color:red;cursor:pointer"></i></a>'
                            ;

                      }}
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#instructor_csd_class_load tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

         
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });


              
    </script>
      


    <script language="text/javascript">
        $("#cameraFileInput").on("change", function(e) {
          var _URL = window.URL || window.webkitURL,
              file = this.files[0], 
              image = new Image();                  
          
           $(image).ready(function($) {
            $('#preview').attr('src', _URL.createObjectURL(file));
           // $('#add_student_grade11').modal('show');
          });
          window.URL.revokeObjectURL(image.src);
          $(e.target.id).val('');
        });


    </script>

    <script type="text/javascript">
        $(function() {
    if (localStorage.getItem('form_frame')) {
        $("#form_frame option").eq(localStorage.getItem('form_frame')).prop('selected', true);
    }

    $("#form_frame").on('change', function() {
        localStorage.setItem('form_frame', $('option:selected', this).index());
    });
    
});
    </script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("Select");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("This field cannot be left blank");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
    </script>
</html>


<?php include 'logout.php';?>

<!---- ###########################################   ADDDDDD STUDENT    ########################################################## -->
                    
<form method="post" enctype="multipart/form-data">
        <div class="modal fade" id="add_student_grade11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Grade - 11 Student</h5>
                        <button class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                    </div>

                     <div class="modal-body">
                        <p class="sub-text"><text class="text-danger">Note: Make sure to review all fields.</text></p>
                         <form class="form-signin" method="POST">
                                <div class="form-label-group"><center>

                                    <img id="preview" width="100" height="100" style="margin-bottom: 10px !important"/>
                  
                                    <input type="file" id="cameraFileInput" accept="image/*" capture="environment" style="display:none;" name="image" required><br>
                                    <label for="cameraFileInput" class="btn btn-large" style="border: 1px solid black;cursor:pointer">Upload Image
                                        </label><br></center>
                                </div>

                                <div class="form-label-group">
                                    
                                      <input type="text" name="add_student_id" class="form-control inp" id="inputPassword" required placeholder="e.g: 2018-10-138" style="outline: none;border-width: 0 0 1px;border-radius:0px">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="stud_lastname" class="form-control" id="inputPassword" required placeholder="e.g: Casabuena">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Lastname</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="stud_firstname" class="form-control" id="inputPassword" required placeholder="e.g: Jhon Ace">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Firstname</label>
                                </div>

                                <div class="form-label-group">
                                        <select class="form-control" id="disabledSelect" name="stud_year" disabled="">
                                            <option value="Grade - 11">GRADE - 11</option>
                                            <option value="Grade - 12">GRADE - 12</option>
                                            <option value="1st Year"></option>
                                            <option value="2nd Year">2ND</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                        </select>
                                    <label for="disabledSelect" style="color: black">Student Year</label>
                                </div>
                                <div class="form-label-group">
                                        <select class="form-control" name="stud_department">
                                            <option value="Grade - 11" selected="">TVL</option>
                                            <option value="1st Year">ICT</option>
                                            <option value="2nd Year">BSIT</option>
                                            <option value="3rd Year">MT</option>
                                            <option value="4th Year">Education</option>
                                            <option value="4th Year">Criminology</option>
                                            <option value="4th Year">HM/TM</option>
                                            <option value="4th Year">Business Administration</option>
                                        </select>   
                                    <label for="disabledSelect" style="color: black">Student Program</label>
                                </div>
                                <div class="form-label-group">
                                        <select class="form-control" name="stud_department" disabled="">
                                            <option value="Grade - 11" selected="">SHS</option>
                                            <option value="1st Year">BSIT</option>
                                            <option value="2nd Year">Mar-E</option>
                                            <option value="3rd Year">MT</option>
                                            <option value="4th Year">Education</option>
                                            <option value="4th Year">Crim</option>
                                            <option value="4th Year">HM/TM</option>
                                            <option value="4th Year">BA</option>
                                        </select>   
                                    <label for="disabledSelect" style="color: black">Student Department</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="stud_voting_code#" class="form-control" required placeholder="e.g: #37rw2">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">QR Code #:</label>
                                </div>

                                <button class="btn btn-success btn-lg btn-block mb-4 mt-4" type="submit" name = "submit-new-student" style="color:white;font-family: 'Fjalla One', cursive;font-size: 20px">Add Student</button>
                            </form>
                     </div>
                        <div class="modal-footer">
                           
                        </div>
                </div>
            </div>
        </div>
    </form>


<!--------------------------------------     UPDATE GRADE 11 - STUDENT    ----------------------------------->              

<form method="post">
        <div class="modal fade" id="update_student_grade11"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true" style="margin-top: -60px">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                        <button class="btn btn-secondary float-right" data-dismiss="modal" style="float: right;margin-top: -30px">Cancel</button>
                    </div>
                     <div class="modal-body">
                    <p class="sub-text" style="margin-top: -20px"><text class="text-danger">Note: Make sure to review all fields.</text></p>
                         <form class="form-signin" method="POST">
                                <div class="form-label-group" style="display: none">
                                    <input type="text" name="idIF" id = "id_id" class="form-control col-sm-10"   required>
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_id" id = "up_stud_id" class="form-control col-sm-10" placeholder="e.g: 2018-06-15">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_lastname" class="form-control" id = "up_stud_lastname" required placeholder="e.g: Casabuena">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Lastname</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_firstname" class="form-control" required 
                                    id = "up_stud_firstname" placeholder="e.g: Jhon Ace">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Firstname</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_middlename" class="form-control" id = "up_stud_middlename" required placeholder="e.g: Vallejos">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Middlename</label>
                                </div>
                                <div class="form-label-group">
                                        <input name="update_stud_department" class="form-control text-danger" id="up_stud_department" readonly>
                                    <label for="disabledSelect" style="color: black">Student Department</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="update_stud_year" id = "up_stud_year" class="form-control text-danger" required readonly>
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Year</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="update_voting_code#" id = "up_stat" class="form-control" required placeholder="e.g: #w7Sxa4">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Voting Code #:</label>
                                </div>

                                <button class="btn btn-success btn-lg btn-block mb-4 mt-4" type="submit" name = "update-student" style="color:white;font-family: 'Fjalla One', cursive;font-size: 20px">Save Changes</button>
                            </form>
                     </div>
                        <div class="modal-footer">
                           
                        </div>
                </div>
            </div>
        </div>
    </form>


    
<?php 

    }
?>

    <script language="text/javascript">
        $("#cameraFileInput").on("change", function(e) {
          var _URL = window.URL || window.webkitURL,
              file = this.files[0], 
              image = new Image();                  
          
           $(image).ready(function($) {
            $('#preview').attr('src', _URL.createObjectURL(file));
           // $('#add_student_grade11').modal('show');
          });
          window.URL.revokeObjectURL(image.src);
          $(e.target.id).val('');
        });


    </script>

    <script type="text/javascript">
        $(function() {
    if (localStorage.getItem('form_frame')) {
        $("#form_frame option").eq(localStorage.getItem('form_frame')).prop('selected', true);
    }

    $("#form_frame").on('change', function() {
        localStorage.setItem('form_frame', $('option:selected', this).index());
    });
    
});
    </script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("Select");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("This field cannot be left blank");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
    </script>
</html>


<?php include 'logout.php';?>

<!---- ###########################################   ADDDDDD STUDENT    ########################################################## -->
                    
<form method="post" enctype="multipart/form-data">
        <div class="modal fade" id="add_student_grade11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Grade - 11 Student</h5>
                        <button class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                    </div>

                     <div class="modal-body">
                        <p class="sub-text"><text class="text-danger">Note: Make sure to review all fields.</text></p>
                         <form class="form-signin" method="POST">
                                <div class="form-label-group"><center>

                                    <img id="preview" width="100" height="100" style="margin-bottom: 10px !important"/>
                  
                                    <input type="file" id="cameraFileInput" accept="image/*" capture="environment" style="display:none;" name="image" required><br>
                                    <label for="cameraFileInput" class="btn btn-large" style="border: 1px solid black;cursor:pointer">Upload Image
                                        </label><br></center>
                                </div>

                                <div class="form-label-group">
                                    
                                      <input type="text" name="add_student_id" class="form-control inp" id="inputPassword" required placeholder="e.g: 2018-10-138" style="outline: none;border-width: 0 0 1px;border-radius:0px">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="stud_lastname" class="form-control" id="inputPassword" required placeholder="e.g: Casabuena">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Lastname</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="stud_firstname" class="form-control" id="inputPassword" required placeholder="e.g: Jhon Ace">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Firstname</label>
                                </div>

                                <div class="form-label-group">
                                        <select class="form-control" id="disabledSelect" name="stud_year" disabled="">
                                            <option value="Grade - 11">GRADE - 11</option>
                                            <option value="Grade - 12">GRADE - 12</option>
                                            <option value="1st Year"></option>
                                            <option value="2nd Year">2ND</option>
                                            <option value="3rd Year">3rd Year</option>
                                            <option value="4th Year">4th Year</option>
                                        </select>
                                    <label for="disabledSelect" style="color: black">Student Year</label>
                                </div>
                                <div class="form-label-group">
                                        <select class="form-control" name="stud_department">
                                            <option value="Grade - 11" selected="">TVL</option>
                                            <option value="1st Year">ICT</option>
                                            <option value="2nd Year">BSIT</option>
                                            <option value="3rd Year">MT</option>
                                            <option value="4th Year">Education</option>
                                            <option value="4th Year">Criminology</option>
                                            <option value="4th Year">HM/TM</option>
                                            <option value="4th Year">Business Administration</option>
                                        </select>   
                                    <label for="disabledSelect" style="color: black">Student Program</label>
                                </div>
                                <div class="form-label-group">
                                        <select class="form-control" name="stud_department" disabled="">
                                            <option value="Grade - 11" selected="">SHS</option>
                                            <option value="1st Year">BSIT</option>
                                            <option value="2nd Year">Mar-E</option>
                                            <option value="3rd Year">MT</option>
                                            <option value="4th Year">Education</option>
                                            <option value="4th Year">Crim</option>
                                            <option value="4th Year">HM/TM</option>
                                            <option value="4th Year">BA</option>
                                        </select>   
                                    <label for="disabledSelect" style="color: black">Student Department</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="stud_voting_code#" class="form-control" required placeholder="e.g: #37rw2">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">QR Code #:</label>
                                </div>

                                <button class="btn btn-success btn-lg btn-block mb-4 mt-4" type="submit" name = "submit-new-student" style="color:white;font-family: 'Fjalla One', cursive;font-size: 20px">Add Student</button>
                            </form>
                     </div>
                        <div class="modal-footer">
                           
                        </div>
                </div>
            </div>
        </div>
    </form>


<!--------------------------------------     UPDATE GRADE 11 - STUDENT    ----------------------------------->              

<form method="post">
        <div class="modal fade" id="update_student_grade11"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true" style="margin-top: -60px">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Student</h5>
                        <button class="btn btn-secondary float-right" data-dismiss="modal" style="float: right;margin-top: -30px">Cancel</button>
                    </div>
                     <div class="modal-body">
                    <p class="sub-text" style="margin-top: -20px"><text class="text-danger">Note: Make sure to review all fields.</text></p>
                         <form class="form-signin" method="POST">
                                <div class="form-label-group" style="display: none">
                                    <input type="text" name="idIF" id = "id_id" class="form-control col-sm-10"   required>
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_id" id = "up_stud_id" class="form-control col-sm-10" placeholder="e.g: 2018-06-15">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_lastname" class="form-control" id = "up_stud_lastname" required placeholder="e.g: Casabuena">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Lastname</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_firstname" class="form-control" required 
                                    id = "up_stud_firstname" placeholder="e.g: Jhon Ace">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Firstname</label>
                                </div>
                                <div class="form-label-group">
                                    <input type="text" name="update_stud_middlename" class="form-control" id = "up_stud_middlename" required placeholder="e.g: Vallejos">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Middlename</label>
                                </div>
                                <div class="form-label-group">
                                        <input name="update_stud_department" class="form-control text-danger" id="up_stud_department" readonly>
                                    <label for="disabledSelect" style="color: black">Student Department</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="update_stud_year" id = "up_stud_year" class="form-control text-danger" required readonly>
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Student Year</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" name="update_voting_code#" id = "up_stat" class="form-control" required placeholder="e.g: #w7Sxa4">
                                        <label for="inputEmail" style="color:black;font-family: 'Livvic', sans-serif;">Voting Code #:</label>
                                </div>

                                <button class="btn btn-success btn-lg btn-block mb-4 mt-4" type="submit" name = "update-student" style="color:white;font-family: 'Fjalla One', cursive;font-size: 20px">Save Changes</button>
                            </form>
                     </div>
                        <div class="modal-footer">
                           
                        </div>
                </div>
            </div>
        </div>
    </form>