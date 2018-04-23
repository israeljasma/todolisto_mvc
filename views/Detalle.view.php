<?php

class DetalleView {

    public function render($id, $detallesTarea, $estadoTarea, $estados, $tipoTarea, $tipos) {  ?>
        <html>
            <head>
                <title>Todo Listo! / <?php echo $_SESSION["username"];?></title>
            </head>
            <body>

                <a href="/todolisto_mvc/mainController.php/logout">Cerrar Sesión</a>         
                <h1>Todo Listo!</h1>
                <h2>Ver detalles tarea</h2>

                <table>
                    <form method="POST" action=<?php echo "/todolisto_mvc/mainController.php/editarTarea?id=".$id; ?>>
                    <?php foreach($detallesTarea as $det) { ?>
                        <tr>
                            <th>
                                <label for="tarea_id"> Id tarea </label>
                            </th>
                            <th>
                                <label for="titulo"> Titulo tarea </label>
                            </th>
                            <th>
                                <label for="descripcion"> Descripción tarea </label>
                            </th>
                            <th>
                                <label for="estado_id"> Estado tarea </label>
                            </th>
                            <th>
                                <label for="tipo"> Tipo tarea </label>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="tarea_id" name="tarea_id" value="<?php echo $det->getId();?>" disabled />
                            </td>
                            <td>
                                <input type="text" id="titulo" name="titulo" value="<?php echo $det->getTitulo();?>" />
                                <!--<input type="text" name="fecha_inicio" value="<?php //echo $detallesTarea["fecha_inicio"];?>" /> -->
                            </td>
                            <td>
                                <input type="text" id="descripcion" name="descripcion" value="<?php echo $det->getDescripcion();?>" />
                            </td>
                    <?php } ?>
                            <td>
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
                            </td>
                            <td>
                                <?php foreach($tipos as $tipo){
                                    if($tipo->getId() == $tipoTarea){ ?>
                                        <input type="radio" id="tipo" name="tipo_id" value="<?php echo $tipo->getId(); ?>" checked><?php echo $tipo->getNombre(); ?> 
                                    <?php }else{ ?>
                                        <input type="radio" id="tipo" name="tipo_id" value="<?php echo $tipo->getId(); ?>"><?php echo $tipo->getNombre(); ?>
                                    <?php }} ?>
                                    <input type="radio" id="tipo" name="tipo_id" value="otroTipo" required> <input type="text" name="nuevoTipo" placeholder="Otro tipo" style="width: 100px;">
                            </td>
                            <td>
                                <input type="submit" value="Editar Tarea!" />
                            </td>
                        </tr>
                    </form>
                </table>

            </body>
        </html>

    <?php }
}
?>