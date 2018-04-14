<?php

class DetalleView {

    public function render($id, $detallesTarea, $estadoTarea, $estados) { ?>
        <html>
            <head>
                <title>Todo Listo! / <?php echo $_SESSION["username"];?></title>
            </head>
            <body>

                <a href="/todolisto_mvc/mainController.php/logout">Cerrar Sesión</a>         
                <h1>Todo Listo!</h1>
                <h2>Ver detalles tarea</h2>

                    <form method="POST" action=<?php echo "/todolisto_mvc/mainController.php/editarTarea?id=".$id; ?>>
                    <?php foreach($detallesTarea as $det) { ?>
                        <label for="tarea_id"> Id tarea: </label>
                        <input type="text" id="tarea_id" name="tarea_id" value="<?php echo $det->getId();?>" disabled />
                        <label for="titulo"> Titulo tarea: </label>
                        <input type="text" id="titulo" name="titulo" value="<?php echo $det->getTitulo();?>" />
                        <!--<input type="text" name="fecha_inicio" value="<?php //echo $detallesTarea["fecha_inicio"];?>" /> -->
                        <label for="descripcion"> Descripción tarea: </label>
                        <input type="text" id="descripcion" name="descripcion" value="<?php echo $det->getDescripcion();?>" />
                        <!--<input type="text" name="tipo_id" value="<?php //echo $tipoTarea;?>" /> -->
                    <?php } ?>

                    <label for="estado_id"> Estado tarea: </label>
                        <select id="estado_id" name="estado_id">
                            <option disabled>Estado Tarea</option>
                            <?php foreach($estados as $estado) {
                                if($estado->getId() == $estadoTarea){ ?>
                                    <option selected value="<?php echo $estado->getId(); ?>"><?php echo $estado->getNombre(); ?></option>
                                <?php }else { ?>
                                        <option value="<?php echo $estado->getId(); ?>"><?php echo $estado->getNombre(); ?></option>
                                        <?php echo "estado" .$estado->getId(); ?>
                            <?php }} ?>
                        </select>

                        <input type="submit" value="Editar Tarea!" />
                    </form>

            </body>
        </html>

    <?php }
}
?>