<nav id="sidebar" style="background-color: #373333 !important" class="">
                <div class="p-4 pt-5 sticky-top">
                    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo $user_image;?>);"></a>
                        <p style="margin-top:-20px;margin-bottom: 5px">Welcome, <text style="color:#FF9200;"><b style="text-transform: uppercase;"><?=$userlname.", ".$userfname;?> (<?=$user_school_id;?>)</b></text></p>
                        <hr class="my-auto" style="border: 0; border-top: 1px solid #ccc;">
                            <ul class="list-unstyled components mb-5">
                                <li class="active">
                                    <a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i>  &nbsp; Dashboard</a>
                                </li>
                                
                                 <li>
                                    <a href="faculty_load.php"><i class="fa fa-user" aria-hidden="true"></i>  &nbsp; Faculty Load</a> 
                                </li>
                                <li>
                                    <a href="instructor_classlist.php"><i class="fa fa-user" aria-hidden="true"></i>  &nbsp; Class List</a>  
                                </li>
                                <li>
                                    <a href="instructor_reports.php"><i class="fa fa-flag" aria-hidden="true"></i>  &nbsp; Reports</a>
                                </li>
                                <li>
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-gear" aria-hidden="true"></i>  &nbsp; Settings
                                    </a>
                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                        <li>
                                            <a href="students.php"><i class="fa fa-user" aria-hidden="true"></i>  &nbsp; Profile</a>
                                        </li>

                                        <li>
                                            <a href="students-csd.php"><i class="fa fa-user" aria-hidden="true"></i>  &nbsp; Change Password</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out" ></i>  &nbsp; Sign Out</a>
                                </li>
                            </ul>
                        <div class="footer text-center" style="margin-top:-30px">
                            <p id='ct6' style="color:#FF9200;text-align: center;margin-bottom: 0px;"></p>
                            <hr class="my-auto" style="border: 0; border-top: 1px solid #ccc;">
                            <p style="margin-top: 5px;">This system was made by Computer Studies Department</p>
                        </div>
                </div>
            </nav>
            <div id="content" class="p-4 p-md-8">
                <nav class="navbar navbar-light studentRef">
                    <div class="container-fluid">
                        <div class="col" style="margin-left:-16px;margin-right:-10px">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </button> 
                        </div>
                            <a href="dashboard.php" class = "btn btn-info" type='button' style="float: right;margin-top: 0px;" >
                                <i class="fa fa-refresh"></i>
                            </a>
                    </div>
                </nav>
                <div class="album bg-light" style="margin-top:-20px"><br><br>
                     <center><p style="margin-top:-10.2px;color:black;"><img src="images/csd_logo.png" height="20px" width="20px" style="margin-top:-5px;" /><b> COMPUTER STUDIES DEPARTMENT</b></p></center>
                     <hr class="my-auto"><br><br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4 ">
                                    <div class="card-body text-center">
                                        <center><i class="fa fa-bell" style="font-size:35px;margin-bottom:15px"></i></center>
                                        <div class="card-text">
                                            Absence Notif: <text style="color:red">5 </text>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body text-center">
                                        <center><i class="fa fa-bell" style="font-size:35px;margin-bottom:15px"></i></center>
                                        <div class="card-text">
                                            3 Consecutive Absence Notif: <text style="color:red">5 </text>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body text-center">
                                        <center><i class="fa fa-bell" style="font-size:35px;margin-bottom:15px"></i></center>
                                        <div class="card-text">
                                            Instructor Absence Notif: <text style="color:red">5 </text>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="card mb-4 ">
                                        <div class="card-body text-center">
                                            <center><i class="fa fa-bell" style="font-size:35px;margin-bottom:15px"></i></center>
                                            <div class="card-text">
                                                Absence Notif: <text style="color:red">5 </text>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body text-center">
                                        <center><i class="fa fa-bell" style="font-size:35px;margin-bottom:15px"></i></center>
                                        <div class="card-text">
                                            Absence Notif: <text style="color:red">5 </text>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body text-center">
                                        <center><i class="fa fa-bell" style="font-size:35px;margin-bottom:15px"></i></center>
                                        <div class="card-text">
                                            Absence Notif: <text style="color:red">5 </text>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>