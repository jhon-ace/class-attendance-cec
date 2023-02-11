<!doctype html>
<html>
    <head>
        <link rel="shortcut icon" href="images/csd_logo.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css"/>

        <link rel="stylesheet" href="css/use_styles.css">
        <link href="calendar/calendar.css" rel="stylesheet" type="text/css">

        <script type="text/javascript">

            function display_ct6() 
            {
                var x = new Date()
                var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
                hours = x.getHours( ) % 12;
                hours = hours ? hours : 12;
                hours=hours.toString().length==1? 0+hours.toString() : hours;
                var minutes=x.getMinutes().toString()
                minutes=minutes.length==1 ? 0+minutes : minutes;

                var seconds=x.getSeconds().toString()
                seconds=seconds.length==1 ? 0+seconds : seconds;

                var month=(x.getMonth() +1).toString();
                month=month.length==1 ? 0+month : month;

                var dt=x.getDate().toString();
                dt=dt.length==1 ? 0+dt : dt;

                var x1 =  " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;

               // var x1 = " - " + hours + ":" +  minutes + ":" +  seconds + ":" + ampm;
                var x2 = x.toDateString();

                document.getElementById('ct6').innerHTML = x2 + x1;
                display_c6();
             }
                function display_c6()
                {
                    var refresh=1000; // Refresh rate in milli seconds
                    mytime=setTimeout('display_ct6()',refresh)
                }
                display_c6()
        </script>
        
    </head> 