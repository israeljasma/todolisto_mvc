<?php

class TareasView {

    public function render($paramTareas, $estados, $tipos) { ?>
        <html>
            <head>
                <title>Todo Listo! / <?php echo $_SESSION["username"];?></title>
            </head>
            <body>   
                <a href="/todolisto_mvc/mainController.php/logout">Cerrar Sesión</a>
                <?php
                if($_SESSION["rol"] == "1"){ ?>
                    <a href="/todolisto_mvc/mainController.php/adminTask">Vista Administrador</a>
                <?php } ?>
                <h1>Todo Listo!</h1>
                <h2>Crear Tarea</h2>

                    <form method="POST" action="/todolisto_mvc/mainController.php/nuevaTarea">
                        <table>
                            <tr style="text-align:left;">
                                <th><label for="titulo"> Titulo nueva tarea </label></th>
                                <th><label for="desc"> Decripción </label></th>
                                <th><label for="estado"> Estado </label></th>
                                <th><label for="tipo"> Tipo </label></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" id="titulo" name="titulo" placeholder="Titulo" />
                                </td>
                                <td>
                                    <input type="text" id="desc" name="descripcion" placeholder="Descripcion" />                        
                                </td>
                                <td>
                                    <select id="estado" name="estado_id">
                                        <option selected disabled>Estado Tarea</option>
                                        <?php foreach($estados as $estado) { ?>
                                            <option value="<?php echo $estado->getId(); ?>"><?php echo $estado->getNombre(); ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <?php foreach($tipos as $tipo) { ?>
                                        <input type="radio" id="tipo" name="tipo_id" value="<?php echo $tipo->getId(); ?>"> <?php echo $tipo->getNombre(); ?> <br>
                                    <?php } ?>
                                    <input type="radio" id="tipo" name="tipo_id" value="otroTipo" required> <input type="text" name="nuevoTipo" placeholder="Otro tipo" style="width: 100px;">
                                </td>
                                <td>
                                    <input type="submit" value="Crear Tarea!" />
                                </td>
                            </tr>
                        </table>
                    </form>

                <h2>Mis tareas</h2>

                    <table>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>
                                <a href="/todolisto_mvc/mainController.php/calendario"> Ver Calendario </a> 
                            </th>
                        </tr>
                        <?php foreach($paramTareas as $tarea) { ?>
                        <tr>
                            <td>
                                <a href="<?php echo "/todolisto_mvc/mainController.php/tarea?id=".$tarea->getId(); ?>">
                                    <?php echo $tarea->getTitulo(); ?>
                                </a>
                            </td>
                            <td><?php echo $tarea->getDescripcion(); ?></td>
                            <td>
                                <a href="<?php echo "/todolisto_mvc/mainController.php/borrarTarea?id=".$tarea->getId(); ?>">
                                    Borrar
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>

            </body>
        </html>

    <?php }
}
?>