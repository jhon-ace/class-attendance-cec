<nav id="sidebar" style="background-color: #373333 !important" class="">
                <div class="p-4 pt-5 sticky-top">
                    <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(<?php echo $user_image;?>);"></a>
                            <p style="margin-top:-20px;margin-bottom: 5px">Welcome, <text style="color:#FF9200;"><b style="text-transform: uppercase;"><?=$userlname.", ".$userfname;?> (<?=$user_school_id;?>)</b></text></p>
                            <hr class="my-auto" style="border: 0; border-top: 1px solid #ccc;"><br>
                            <ul class="list-unstyled components mb-5">
                                <li>
                                    <a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i>  &nbsp; Dashboard</a>
                                </li>
                                <li>
                                    <a href="#courses" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-users" aria-hidden="true"></i>  &nbsp; Course
                                    </a>
                                    <ul class="collapse list-unstyled" id="courses">
                                        <li>
                                            <a href="course_csd.php"><i class="fa fa-user" aria-hidden="true"></i>  &nbsp; Computer Studies Department</a>
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
                                <li class="active">
                                    <a href="#faculty" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                                        <i class="fa fa-users" aria-hidden="true"></i>  &nbsp; Faculty
                                    </a>
                                    <ul class="collapse list-unstyled" id="faculty">
                                        <li>
                                            <a href="instructor_csd.php"><i class="fa fa-user" aria-hidden="true"></i>  &nbsp; Computer Studies Department</a>
                                        </li>

                                        <li class="active">
                                            <a href="faculty_load.php"><i class="fa fa-user" aria-hidden="true"></i>  &nbsp; Faculty Load</a>
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

           