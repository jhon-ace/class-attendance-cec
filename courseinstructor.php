
                        
                        <label for="cars">School Year:</label>
                            <?php
                              echo "<form method='post'>";
                                $sql = mysqli_query($link,"SELECT school_year FROM schoolyear ");
                                  echo "<select name='skol_yr' class='form-control-sm selectpicker' onchange='getData(this);' id='form_frame'>";
                                   // echo "<option >- school year -<i class='fa fa-arrow-down'></i></option>";
                                      for($a = 0 ; $a < $num_rows = mysqli_fetch_array($sql) ; $a++ )
                                      {
                                        $schoolyearDB = $num_rows['school_year'];
                                        echo "<option style='text-transform:uppercase'>$schoolyearDB</option>";
                                      }
                                  echo "</select>";
                         
                                  echo "&nbsp;<button class='btn btn-success' type='submit' name = 'searchLoad' style='color:white;font-family: 'Fjalla One', cursive;font-size: 20px;'>Search</button>";
                              echo "</form>"
                            ?>
         