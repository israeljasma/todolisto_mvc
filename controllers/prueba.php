<?php

/*require("views/AdminTask.view.php");

class AdminController {

    public function mostrarUsuariosYTareas() {
        $adminTasks = new AdminTaskView();
        $usuarios = Usuario::getAllUsers();
        $tareas_usuarios = array();
        $k=0;
        for($h=0; $h<count($usuarios); $h++){
            $nombre = $usuarios[$h]->getNombre();
            $tareas = Tarea::getAllUserTareas($usuarios[$h]);
            $cantidad = count($tareas);
            $tareas_usuarios[$h][$k] = $nombre;
            for($k=1; $k<2; $k++){
                $tareas_usuarios[$h][$k] = $cantidad;
            }
        }

        //echo $tareas_usuarios[0] ."<br>";
        //echo $tareas_usuarios[1] ."<br>";
        //echo $tareas_usuarios[2] ."<br>";
        //echo $tareas_usuarios[3] ."<br>";
        echo $adminTasks->render($tareas_usuarios);
    }

}
?>




funk
<?php

require("views/AdminTask.view.php");

class AdminController {

    public function mostrarUsuariosYTareas() {
        $adminTasks = new AdminTaskView();
        $usuarios = Usuario::getAllUsers();
        $tareas_usuarios = array();
        $i = 0;
        foreach($usuarios as $user){
            $nombre = $user->getNombre();
            $tareas = Tarea::getAllUserTareas($user);
            $cantidad = count($tareas);
            $tareas_usuarios[$i] = $nombre;
            $i++;
            $tareas_usuarios[$i] = $cantidad;
            $i++;
        }
        //echo $tareas_usuarios[0] ."<br>";
        //echo $tareas_usuarios[1] ."<br>";
        //echo $tareas_usuarios[2] ."<br>";
        //echo $tareas_usuarios[3] ."<br>";
        echo $adminTasks->render($tareas_usuarios);
    }

}
*/
?>