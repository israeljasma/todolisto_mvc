<?php
class CalendarView 
{
    public function render($tareas) 
    { 
    ?>
    <html>
            <head>
                <title>Calendario / <?php echo $_SESSION["username"];?></title>
                <meta charset='utf-8' />
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">      
                <link href='/todolisto_mvc/views/resources/fullcalendar.min.css' rel='stylesheet' />
                <link href='/todolisto_mvc/views/css/calendar.css' rel='stylesheet' />
                <link href='/todolisto_mvc/views/resources/fullcalendar.print.min.css' rel='stylesheet' media='print' />
                <script src='/todolisto_mvc/views/resources/lib/moment.min.js'></script>
                <script src='/todolisto_mvc/views/resources/lib/jquery.min.js'></script>
                <script src='/todolisto_mvc/views/resources/fullcalendar.js'></script>
                <script src='/todolisto_mvc/views/resources/locale-all.js'></script>

            </head>

                <h1> Calendario de tareas </h1>
                <script>
                    $(document).ready(function() 
                    {
                        $('#calendar').fullCalendar(
                        {
                            locale: "es",
                            editable: false,
                            weekNumbers: false,
                            eventLimit: true, // allow "more" link when too many events
                            events: [
                                <?php foreach($tareas as $tarea) 
                                { ?>
                                    {
                                        title: '<?php echo $tarea->getTitulo(); ?>',
                                        start: '<?php echo $tarea->getFecha(); ?>',
                                        url: 'tarea?id='+<?php echo $tarea->getId(); ?>
                                    },
                                <?php 
                                } ?>]
                        });
                    });
                </script>
                
            <body>   
                <div id='calendar'></div>
                <br>

                 <button> <a href="todolisto_mvc/mainController.php/tareas">
                                   Volver a la vista tareas
                         </a> 
                </button>
            </body>
        </html>

    <?php
    }
}
?>