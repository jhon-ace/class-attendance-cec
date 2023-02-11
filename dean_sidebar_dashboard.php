<nav id="sidebar" style="background-color: #3E3E3E !important" class="">
                <div class="p-4 pt-5 sticky-top">

                    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo $user_image;?>);"></a>
                            <p style="margin-top:-20px;margin-bottom: 5px">Welcome, <text style="color:#FF9200;"><b style="text-transform: uppercase;"><?=$userlname.", ".$userfname;?> (<?=$user_school_id;?>)</b></text></p>
                            <hr class="my-auto" style="border: 0; border-top: 1px solid #ccc;"><br>
                            <ul class="list-unstyled components mb-5">
                                <li class="active">

                                    <a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp; Dashboard</a>
                                </li>
                                <li>
                                    <a href="#courses" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-users" aria-hidden="true"></i>  &nbsp; Course
                                    </a>
                                    <ul class="collapse list-unstyled" id="courses">
                                        <li>
                                            <a href="course_csd.php"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Computer Studies Department</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#faculty" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-users" aria-hidden="true"></i>  &nbsp; Faculty
                                    </a>
                                    <ul class="collapse list-unstyled" id="faculty">
                                        <li>
                                            <a href="instructor_csd.php"><i class="fa fa-user" aria-hidden="true"></i>  &nbsp; Computer Studies Department</a>
                                        </li>

                                        <li>
                                            <a href="faculty_load.php"><i class="fa fa-user" aria-hidden="true"></i> F &nbsp; Faculty Load</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-users" aria-hidden="true"></i>  &nbsp; Students
                                    </a>
                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                        <li>
                                            <a href="students-csd.php"><i class="fa fa-user" aria-hidden="true"></i>  &nbsp; Computer Studies Department</a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>

                                        <li>
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> ~ </a>
                                        </li>
                                    </ul>
                                </li>                                 
                                <li>
                                    <a href="instructor_reports.php"><i class="fa fa-flag" aria-hidden="true"></i>  &nbsp; Reports</a>
                                </li>
                                <li>
                                    <a href="#settingsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>  &nbsp; Settings
                                    </a>
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
                                <li>
                                   <a href="" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out" ></i>  &nbsp; Sign Out</a>
                                </li>
                            </ul>
                        <div class="footer text-center" style="margin-top:-30px">
                            <p id='ct6' style="color:#FF9200;text-align: center;"></p>
                            <hr class="my-auto" style="border: 0; border-top: 1px solid #ccc;">
                            <p style="margin-top: 10px;">This system was made by Computer Studies Department</p>
                        </div>
                </div>
            </nav>

                       <div id="content" class="p-4 p-md-8">
                <nav class="navbar navbar-light studentRef" >
                    <div class="container-fluid">
                        <div class="col" style="margin-left:-16px;margin-right:-10px">
                            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </button> 
                        </div>
                        
                            <a href="dashboard.php" class="btn btn-info" type='button'  style="float: right;margin-top: 0px;"><i class="fa fa-refresh"></i></a>
                    </div>
                </nav>
                
                <div class="album bg-light" style="margin-top:-20px">
                    <div class="container"><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-4 ">
                                    <div class="card-body text-center">
                                        <center>
                                                <ul class="nav navbar">
                                                  <li class="dropdown">
                                                    <a href="#" class="nav-item dropdown-toggle " data-toggle="dropdown" id="dropdown-toggle">
                                                      <span class="badge badge-default" id="count"></span>
                                                      <i class="fa fa-bell" style="font-size:45px"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" id="dropdown-menu"></ul>
                                                  </li>
                                                </ul>
                                        </center>
                                        <div class="card-text">
                                            Instructor Absence Notif: <text style="color:red"></text>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body text-center">
                                        <center><i class="fa fa-bell" style="font-size:35px;margin-bottom:15px"></i></center>
                                        <div class="card-text">
                                            Students
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