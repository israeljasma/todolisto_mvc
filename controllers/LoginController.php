<?php

require("models/Usuario.php");
require("views/Login.view.php");

class LoginController {

    public function loginScreen() {
        $loginView = new LoginView();
        echo $loginView->render();
    }
    
    public function login($username, $password) {
        $user = Usuario::findByUsername($username);        
        
        if($user != null) {
            $_SESSION["username"] = $username;
            $_SESSION["user"] = $user;
            header('Location: ' . '/todolisto_mvc/mainController.php/tareas');            
        } else {
            echo "No se encontro el usuario con el nombre indicado";
        }
        
    }

    public function logout() {
        $_SESSION = [];
        session_destroy();
        header('Location: ' . '/todolisto_mvc/mainController.php/index');
    }
}

?>