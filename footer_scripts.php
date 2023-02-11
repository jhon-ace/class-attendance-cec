    

    <script src="js/jquery.min.js"></script>
    <script src="js/backup/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>

    <script src="js/popper.js"></script>
    <script src="js/main.js"></script>

    
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>

     <script>
        $(document).ready(function(){
         
         function load_unseen_notification(view = '')
         {
          $.ajax({
           url:"fetch_notif_instructor.php",
           method:"POST",
           data:{view:view},
           dataType:"json",
           success:function(data)
           {
            $('#dropdown-menu').html(data.notification);
            if(data.unseen_notification > 0)
            {
             $('#count').html(data.unseen_notification);
            }
           }
          });
         }
         
         load_unseen_notification();
         

          $(document).on('click', '#dropdown-toggle', function(){
            $('#count').html('');
             load_unseen_notification('yes');
            });

        setInterval(function(){ 
            load_unseen_notification(); 
        }, 5000);
                 
                });



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

        


