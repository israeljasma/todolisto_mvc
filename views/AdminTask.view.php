<?php

class AdminTaskView {

    public function render($tareas_usuarios) { ?>
        
        <html>
            <head>
                <title>Todo Listo! / <?php echo $_SESSION["username"];?></title>
            </head>
            <body>   
                <a href="/todolisto_mvc/mainController.php/logout">Cerrar Sesión</a>
                <a href="/todolisto_mvc/mainController.php/tareas">Vista normal</a>         
                <h1>Todo Listo!</h1>
                <h2>Tareas Usuarios</h2>
                <table style="border: 1px solid black; border-collapse: collapse;">
                    <tr style="border: 1px solid black; border-collapse: collapse;">
                        <th style="border: 1px solid black; border-collapse: collapse;">
                            Usuario
                        </th>
                        <th style="border: 1px solid black; border-collapse: collapse;">
                            Tareas usuario
                        </th>
                    </tr>
                    <tr style="border: 1px solid black; border-collapse: collapse;">
                        <?php 
                            $k=0;
                            for($h=0; $h<count($tareas_usuarios); $h++) { ?>
                            <td style="border: 1px solid black; border-collapse: collapse;">
                                <?php echo $tareas_usuarios[$h][$k]; ?>
                            </td>
                            <?php   for($k=1; $k<2; $k++) { ?>
                            <td style="border: 1px solid black; border-collapse: collapse;">
                                    <?php echo $tareas_usuarios[$h][$k]; ?>
                            </td>
                    </tr>
                        <?php }} ?>
                </table>
            </body>
        </html>

    <?php }
}
?>