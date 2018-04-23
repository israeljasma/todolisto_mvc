<?php

require("models/Tarea.php");
require("views/Tareas.view.php");
require("views/Detalle.view.php");

class TareaController {

    public function listadoTareas() {
        $user = $_SESSION["user"];        
        $tareas = Tarea::getAllUserTareas($user);        
        $estados = EstadoTarea::getAll();
        $tipos = TipoTarea::getAll();

        $tareasViews = new TareasView();
        echo $tareasViews->render($tareas, $estados, $tipos);
    }
    
    public function agregarTarea($titulo, $desc, $estado_id, $tipo_id) {
        $user = $_SESSION["user"];
        Tarea::agregarTarea($titulo, $desc, $user->getId(), $estado_id, $tipo_id);        
        header('Location: ' . '/todolisto_mvc/mainController.php/tareas');
    }

    public function agregarTareaYTipo($titulo, $desc, $estado_id, $nombreTipo) {
        $user = $_SESSION["user"];
        $tipo_id = TipoTarea::agregarTipo($nombreTipo);
        Tarea::agregarTarea($titulo, $desc, $user->getId(), $estado_id, $tipo_id);        
        header('Location: ' . '/todolisto_mvc/mainController.php/tareas');
    }

    public function borrarTarea($tarea_id) {
        $user = $_SESSION["user"];
        Tarea::borrarTarea($tarea_id);        
        header('Location: ' . '/todolisto_mvc/mainController.php/tareas');
    }

    public function mostrarTarea($tarea_id) {
        $user = $_SESSION["user"];
        $detallesTarea = Tarea::mostrarTarea($tarea_id);
        $estados = EstadoTarea::getAll();
        $tipos = TipoTarea::getAll();
        foreach($detallesTarea as $det) {
            $estadoTarea = EstadoTarea::getById($det->getEstado()->getId());
            $tipoTarea = TipoTarea::getById($det->getTipo()->getId());
        }
        $estadoTarea = $estadoTarea->getId();
        $tipoTarea = $tipoTarea->getId();

        $detallesTareaViews = new DetalleView();
        echo $detallesTareaViews->render($tarea_id, $detallesTarea, $estadoTarea, $estados, $tipoTarea, $tipos);
    }

    public function editarTarea($tarea_id, $titulo, $desc, $estado_id, $tipo_id) {
        $user = $_SESSION["user"];
        Tarea::actualizarTarea($tarea_id, $titulo, $desc, $user->getId(), $estado_id, $tipo_id);        
        header('Location: ' . '/todolisto_mvc/mainController.php/tareas');
    }

    public function editarTareaYTipo($tarea_id, $titulo, $desc, $estado_id, $nombreTipo) {
        $user = $_SESSION["user"];
        $tipo_id = TipoTarea::agregarTipo($nombreTipo);
        Tarea::actualizarTarea($tarea_id, $titulo, $desc, $user->getId(), $estado_id, $tipo_id);        
        header('Location: ' . '/todolisto_mvc/mainController.php/tareas');
    }
}
?>