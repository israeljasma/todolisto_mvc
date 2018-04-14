<?php

require("models/Tarea.php");
require("views/Tareas.view.php");
require("views/Detalle.view.php");

class TareaController {

    public function listadoTareas() {
        $user = $_SESSION["user"];        
        $tareas = Tarea::getAllUserTareas($user);        
        $estados = EstadoTarea::getAll();

        $tareasViews = new TareasView();
        echo $tareasViews->render($tareas, $estados);
    }
    
    public function agregarTarea($titulo, $desc, $estado_id) {
        $user = $_SESSION["user"];
        Tarea::agregarTarea($titulo, $desc, $user->getId(), $estado_id);        
        header('Location: ' . '/todolisto_mvc/mainController.php/tareas');
    }

    public function borrarTarea($id){
        $user = $_SESSION["user"];
        Tarea::borrarTarea($id);
        header('Location: ' . '/todolisto_mvc/mainController.php/tareas');
    }

    public function mostrarTarea($tarea_id) {
        $user = $_SESSION["user"];
        $detallesTarea = Tarea::mostrarTarea($tarea_id);
        $estados = EstadoTarea::getAll();
        $nombre=null;
        foreach($detallesTarea as $det) {
            $nombre = EstadoTarea::getById($det->getEstado()->getId());
        }
        $estadoTarea = $nombre->getId();

        $detallesTareaViews = new DetalleView();
        echo $detallesTareaViews->render($tarea_id, $detallesTarea, $estadoTarea, $estados);
    }

    public function editarTarea($tarea_id, $titulo, $desc, $estado_id) {
        $user = $_SESSION["user"];
        Tarea::actualizarTarea($tarea_id, $titulo, $desc, $user->getId(), $estado_id);        
        header('Location: ' . '/todolisto_mvc/mainController.php/tareas');
    }
}
?>