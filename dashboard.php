<?php include 'session_select.php'; ?>
<?php include 'logout_session.php'; ?>
<?php include 'session_destroyer.php'; ?>
<?php include 'header_links.php'; ?>
<head>
    <title>Dashboard</title>
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
                    
                    include 'dean_sidebar_dashboard.php';

                }
                else if ($user_Type=="Instructor")
                {

                    include 'instructor_sidebar_dashboard.php';
                }
                else
                {

                    include 'guidance_sidebar.php'; 
                } 
            ?>  

 
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
        '<td style="margin-left:70%">' +
        '<img src="'+d.stud_image+'" height="300px" width="300px" />'+
        '</td>' +
        '</tr>' +
        '<tr>' +
        '</table>'
        );
        }

           
 
        $(document).ready(function () {
            var table = $('#instructor_csd').DataTable({
                processing: true,
                ajax: "instructor_csdAjax.php",

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
                    { data:'instructor_id' },
                    { data:'instructor_id_no' },
                    { data: 'instructor_lastname' },
                    { data: 'instructor_firstname' },
                    { data: 'instructor_qrcode' },
                    { data: 'instructor_status' },
                    { data: function(data) {
                        return '<a class="editbtn" data-toggle="modal" data-target="#update_student_grade11" style="border-radius:4px;color:green"><i class="fa fa-pencil-square-o" style="cursor:pointer;color:green"></i></a>&nbsp;&nbsp;&nbsp;<a class="" data-toggle="modal" data-target="" style="border-radius:4px"><i class="fa fa-unlock-alt" style="color:red;cursor:pointer"></i></a>'
                            ;

                      }}
                ],

                order: [[1, 'asc']],
            });
         
            // Add event listener for opening and closing details
            $('#instructor_csd tbody').on('click', 'td.dt-control', function () {
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




  </body>
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
<!--     <script>
        $(document).ready(function(){
            function load_unseen_notification(view = ''){
                $.ajax({
                    url:'fetch_notif_instructor.php',
                    method:'POST',
                    data:{view:view},
                    dataType: "json",
                    success:function(data)
                    {
                        $('.dropdown-menu').html(data.notification);

                        if(data.unseen_notification > 0){
                            $('.count').html(data.unseen_notification);
                        }
                    }
                });
            }
            load_unseen_notification();

            $(document).on('click', 'dropdown-toggle',function(){
                $('.count').html('');

                load_unseen_notification('yes');
            });

            setInterval(function(){
                load_unseen_notification();;
            }, 5000);
    });

    </script> -->