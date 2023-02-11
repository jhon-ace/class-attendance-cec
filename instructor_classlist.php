<?php include 'session_select.php'; ?>
<?php include 'logout_session.php'; ?>
<?php include 'session_destroyer.php'; ?>
<?php include 'header_links.php';?>
<head>
    <title>Class List</title>
</head>
    <body style="font-family:Franklin Gothic Book">
        <div class="wrapper d-flex align-items-stretch">
            <?php
                if($user_Type=='Administrator')
                {

                    include 'admin_sidebar.php'; 

                }
                else if($user_Type=="Dean")
                {
                    include 'dean_sidebar_faculty_load.php'; 
                }
                else if($user_Type=="Instructor")
                {
                    include 'instructor_sidebar_classlist.php';
                }
            ?>


            <div id="content" class="p-4 p-md-8">
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <div class="col" style="margin-left:-16px;margin-right:-10px">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></button> 
                        </div>
                            <a href="instructor_classlist.php" class = "btn btn-info" type='button' style="float: right;margin-top: 0px;" ><i class="fa fa-refresh"></i></a>
                    </div>
                </nav>

                <ul class="navbar list-unstyled text-left ace" style="margin-top: -20px;">
                    <div class="card-content table"><br>
                        <center><p><img src="images/csd_logo.png" height="20px" width="20px" style="margin-top:-4px;" /><b> COMPUTER STUDIES DEPARTMENT</b></p></center>
                        <div class="container-fluid text">
                            
                            <p style="text-align:center;color:#FF9200;font-size: 15px;"><b>Class List</b></p>
                        </div>
		                <?php
		                if($user_Type=="Instructor")
		                {
		                ?>
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

                                                  			$_SESSION['session_semtype'] = $semester_type;
                                                
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

                                            $fetchschoolYear = $_POST['schoolyearDisplay'];
                                            $_SESSION['g_session'] = $fetchschoolYear;
                                            $fetchsem = $_POST['semesterDisplay'];
                                            $_SESSION['g_session2'] = $fetchsem;  
                                    ?>
                                            <p>School Year: <b style="color:red;text-transform:uppercase;"><?php echo $fetchschoolYear;?></b>&nbsp;
                                             Semester: <b style="color:red;text-transform:uppercase;"><?php echo $fetchsem;?></b></p>
                                                
                                            <form method="POST">
                                                <?php 

                                                    $sql ="SELECT  * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."' and faculty_load_school_year = '".$fetchschoolYear."' and faculty_load_semester = '".$fetchsem."' ORDER BY faculty_course_schedule_date,faculty_course_schedule_dateType_in ASC ";
                                                    $result = mysqli_query($link, $sql);
                                                    
													
                                                    
				                                                    if(mysqli_num_rows($result) != 0) 

				                                                    {   echo "<label for='sel1' >Course:&nbsp;</label>";
                                                                        echo "&nbsp;<select name='courseDisplay' class='form-control-sm ' id='sel1' required>";
                                                                        echo "<option value='' required>~ Select Course ~</option>";
				                                                        for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
				                                                        {

				                                                            $fcourse_code = $num_rows['faculty_course_code'];
                                                                            $fcourse_name = $num_rows['faculty_course_name'];
                                                                            $fcourse_section = $num_rows['faculty_course_section'];
                                                                            $fcourse_unit = $num_rows['faculty_course_unit'];
                                                                            $fcourse_course_schedule_in = $num_rows['faculty_course_schedule_in'];
                                                                            $fcourse_course_schedule_out = $num_rows['faculty_course_schedule_out'];
                                                                            $fcourse_course_schedule_date = $num_rows['faculty_course_schedule_date'];
                                                                            $fcourse_course_schedule_dateType_in = $num_rows['faculty_course_schedule_dateType_in'];
                                                                            $fcourse_course_schedule_dateType_out = $num_rows['faculty_course_schedule_dateType_out'];
                                                                            $fcourse_assigned_room = $num_rows['faculty_course_assigned_room'];

				                                                            $_SESSION['aces'] = $class_code;
                                                                            $acest = $fcourse_code.' '.$fcourse_name.' '.$fcourse_section.' ('.$fcourse_course_schedule_date.' '.$fcourse_course_schedule_in.' '.$fcourse_course_schedule_dateType_in.' '.$fcourse_course_schedule_out.' '.$fcourse_course_schedule_dateType_out.' '.$fcourse_assigned_room.')';
				                                                            echo "<option>$acest</b></option>";
				                                                        }
				                                                    
				                                                    }
			                                                        else
			                                                        {
			                                                            echo "<h5 style='text-align:center'>No data available</h5>";
			                                                        
			                                                        }
			                                        echo "</select>";
                                                    if(mysqli_num_rows($result) != 0){
                                                        echo "&nbsp<button class='btn btn-success btn-sm' name='courseDisplayName' required style='margin-top:-3.5px'>Display</button>";
                                                    }
                                                    else
                                                    {
                                                        
                                                    }
                                                ?>
                                            </form>

                                    <?php

                                        }
                                    
                                    ?>

                                             <form method="POST">

                                    <?php 


                                            if(isset($_POST['courseDisplayName']))
                                            {    
                                    ?>
                                            <p>School Year: <b style="color:red;text-transform: uppercase;"><?php echo $aces = $_SESSION['g_session'];?></b>&nbsp;Semester: <b style="color:red;text-transform: uppercase;"><?php echo $aces2 = $_SESSION['g_session2'];?></b></p>
                                    <?php
                                            $sql ="SELECT  * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."' ORDER BY faculty_course_schedule_date,faculty_course_schedule_dateType_in ASC";
                                                    $result = mysqli_query($link, $sql);
                                                    echo "<label for='sel1' >Course:&nbsp;</label>";
                                                    echo "&nbsp;<select name='courseDisplay' class='form-control-sm ' id='sel1' required>";
                                                    echo "<option value='' required>~ Select Course ~</option>";
                                                        if(mysqli_num_rows($result) != 0) 
                                                        {
                                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($result) ; $a++ )
                                                            {

                                                                $fcourse_code = $num_rows['faculty_course_code'];
                                                                $_SESSION['scourse_code'] = $fcourse_code;
                                                                $fcourse_name = $num_rows['faculty_course_name'];
                                                                $_SESSION['scourse_name'] = $fcourse_name;
                                                                $fcourse_section = $num_rows['faculty_course_section'];
                                                                $fcourse_unit = $num_rows['faculty_course_unit'];
                                                                $fcourse_course_schedule_in = $num_rows['faculty_course_schedule_in'];
                                                                $fcourse_course_schedule_out = $num_rows['faculty_course_schedule_out'];
                                                                $fcourse_course_schedule_date = $num_rows['faculty_course_schedule_date'];
                                                                $fcourse_course_schedule_dateType_in = $num_rows['faculty_course_schedule_dateType_in'];
                                                                $fcourse_course_schedule_dateType_out = $num_rows['faculty_course_schedule_dateType_out'];
                                                                $fcourse_assigned_room = $num_rows['faculty_course_assigned_room'];

                                                                $acest = $fcourse_code.' '.$fcourse_name.' '.$fcourse_section.' ('.$fcourse_course_schedule_date.' '.$fcourse_course_schedule_in.' '.$fcourse_course_schedule_dateType_in.' '.$fcourse_course_schedule_out.' '.$fcourse_course_schedule_dateType_out.' '.$fcourse_assigned_room.')';

                                                                echo "<option>$acest</option>";

                                                            }

                                                            echo "</select>";

                                                           
                                                        }

                                                        else
                                                        {
                                                            echo "<option>No faculty</option>";


                                                        } 
                                                         echo "&nbsp<button class='btn btn-success btn-sm' name='courseDisplayName' required>Display</button>";

                                                         if(isset($_POST['courseDisplayName']))
                                                         {
                                                            $fetchcourseDisplay = $_POST['courseDisplay'];
                                                            $_SESSION['fcourseDisplay'] = $fetchcourseDisplay;

                                                            $sqle ="SELECT * FROM faculty_load where faculty_school_id = '".$_SESSION['session_id']."'";
                                                            $resultT = mysqli_query($link, $sqle);
                                                            for($a = 0 ; $a < $num_rows = mysqli_fetch_array($resultT) ; $a++ )
                                                            {

                                                                $fcourse_code = $num_rows['faculty_course_code'];
                                                                $_SESSION['scourse_code'] = $fcourse_code;
                                                                $fcourse_name = $num_rows['faculty_course_name'];
                                                                $_SESSION['scourse_name'] = $fcourse_name;
                                                                $fcourse_section = $num_rows['faculty_course_section'];
                                                                $fcourse_unit = $num_rows['faculty_course_unit'];
                                                                $fcourse_course_schedule_in = $num_rows['faculty_course_schedule_in'];
                                                                $fcourse_course_schedule_out = $num_rows['faculty_course_schedule_out'];
                                                                $fcourse_course_schedule_date = $num_rows['faculty_course_schedule_date'];
                                                                $fcourse_course_schedule_dateType_in = $num_rows['faculty_course_schedule_dateType_in'];
                                                                $fcourse_course_schedule_dateType_out = $num_rows['faculty_course_schedule_dateType_out'];
                                                                $fcourse_assigned_room = $num_rows['faculty_course_assigned_room'];

                                                                $acest = $fcourse_code.' '.$fcourse_name.' '.$fcourse_section.' ('.$fcourse_course_schedule_date.' '.$fcourse_course_schedule_in.' '.$fcourse_course_schedule_dateType_in.' '.$fcourse_course_schedule_out.' '.$fcourse_course_schedule_dateType_out.' '.$fcourse_assigned_room.')';


                                                                $resultq = $acest;

                                                                if($_SESSION['fcourseDisplay'] == $resultq )
                                                                {
                                                                    $resultq2 = $acest;
                                                                    $_SESSION['rsq2'] = $resultq2;
                                                                }

                                                            }

                                                            



                                                         }

                                                         
                                                         if(mysqli_num_rows($resultT) != 0) 
                                                         {
                                                            $sql2 = mysqli_query($link, "SELECT COUNT(faculty_school_id) AS 'TOTAL' FROM faculty_class_list where CONCAT(course_code,' ',course_name,' ',faculty_course_section,' (',faculty_course_schedule_date,' ',faculty_course_schedule_in,' ',faculty_course_schedule_dateType_in,' ',faculty_course_schedule_out,' ',faculty_course_schedule_dateType_out,' ',faculty_course_assigned_room,')') = '".$resultq2."' and faculty_school_id = '".$_SESSION['session_id']."'");
                                                            $res2 = mysqli_fetch_array($sql2);
                                                            $alllogs = $res2['TOTAL'];
                                                        }
                                                           

                                    ?>                  <br>
                                                        
                                                            <button class = "btn btn-info add-btn" type='button' data-toggle="modal" data-target="#add_student_class_list" style="float: right;margin-right: 50px;margin-top: 0px;" ><i class="fa fa-pencil-square-o fa-10x" title='ja;lsj'></i>
                                                            </button><br>Course: <b style="color:red;">
                                                            <?php echo $resultq2 ;?></b><br>
                                                            Total No. of Students: <b style="color:red;text-transform: uppercase;"><?php echo $alllogs; ?></b><br>
                                    <?php
                                                
                                                 $sql = "SELECT * FROM faculty_class_list where CONCAT(course_code,' ',course_name,' ',faculty_course_section,' (',faculty_course_schedule_date,' ',faculty_course_schedule_in,' ',faculty_course_schedule_dateType_in,' ',faculty_course_schedule_out,' ',faculty_course_schedule_dateType_out,' ',faculty_course_assigned_room,')') = '".$resultq2."'";
                                                $result = mysqli_query($link, $sql);

                                                if(mysqli_num_rows($result) != 0) 
                                                {
                                                    
                                                    echo '<table id="instructor_csd_class_load" class="table table-hover  flex-nowrap" style="width:100%">';
                                                        echo '<thead>';
                                                            echo '<tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th>Faculty ID</th>
                                                                <th>Course Code</th>
                                                                <th>Course Name</th>
                                                                <th>School ID</th>
                                                                <th>Last Name</th>
                                                                <th>First Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                         </thead>';
                                                    echo "</table>"; 

                                                }
                                                else
                                                {
                                                   echo "<hr width='100%'/><br>";
                                                    echo "<p style='text-align:center'><i><b style='color:black'>No enrolled students</b></p></i>";
                                                }
                                            }

                                    ?>
    
                                </div> 
                                 </form>
                    </div>
                </ul>
        <?php   }
               
        ?>

    
                    </div> 
               </form>
                    </div>
                </ul>

            </div>
        </div>
            
<!-- jQuery library -->

                 




 <?php include 'footer_scripts.php'; ?>
 



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
                ajax: "instructor_classlistAjax.php",

                columnDefs : [
                    //hide the second column
                    { 'visible': false, 'targets': [0,1,2,3,4] }
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                        scrollX: true,

                    },
                    { data:'fclass_list_id' },
                    { data:'faculty_school_id' },
                    { data: 'course_code' },
                    { data: 'course_name' },
                    { data: 'school_id' },
                    { data: 'stud_lastname' },
                    { data: 'stud_firstname'},
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


              

        document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("Select");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Select first");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})


        $(document).ready(function(){  
                      $("#request").change(function(){  
                        var request = $(this).val();  
                        $.ajax({  
                          url:"fetch_student.php",  
                          method:"POST",  
                          data:{request:request},  
                          success:function(data){  
                            $('#result').html(data);
                          // $('#add_student_class_list').modal('show');  
                          }  
                        });  
                      });  
                    });
    </script>




      

        
            


     <?php include 'logout.php';?>




<!---- ###########################################   ADDDDDD STUDENT    ########################################################## -->
                    
<div class="modal fade" id="add_student_class_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>
                    </div>
                    <p style="text-align:left; margin-left: 2px;"><text class="text-danger">Note: Make sure to review all fields.</text></p>

                    <div class="modal-body">
                        <p style="color:red;margin-top:-10px"><b>Course:</b><br><?php $dr = $_SESSION['rsq2']; echo "<text style='color:black;text-decoration: underline'>$dr</text>";?></p>
                            <?php
                                 function fill_invoice($link)  
                                 {  
                                      $output = '';  
                                      $sql = "SELECT * FROM students";  
                                      $result = mysqli_query($link, $sql);  
                                      while($row = mysqli_fetch_array($result))  
                                      {  

                                           $output .= '<option value="'.$row["stud_id"].'" >'.$row["stud_id"].'</option>';
                                           
                                      }  
                                      return $output;  
                                 }
                            ?>
                        
                            <div class="form-label-group">
                                        <select class="form-control" name="request" id="request">
                                            <option required>Select Sudent ID</option>
                                            <?php echo fill_invoice($link); ?>  
                                        </select>   
                                    <label for="disabledSelect" style="color:black;font-family: 'Livvic', sans-serif;">Student ID</label>
                                </div>  <br>
                                
                                    <div id="result" style="background-color:green">
                                        
                                    </div>
                                
                                    


                     </div>

                           

                </div>
            </div>
        </div>
     
            



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
    
</body>

</html>
 