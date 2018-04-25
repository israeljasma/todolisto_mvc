<?php 

require("EstadoTarea.php");
require("TipoTarea.php");

class Tarea {
    private $id;
    private $titulo;
    private $descripcion;
    private $fecha_inicio;  
    private $estado;
    private $tipo;
    private $usuario;

    private static function fromRowToTarea($row) {
        return new Tarea($row);
    }

    public static function getAllUserTareas($user) {
        $query = "SELECT * FROM tarea WHERE usuario_id = ?";
        $ps    = Config::$dbh->prepare($query);
        $user_id = $user->getId();
        $res   = $ps->execute(array($user_id));
        $result = array();
        if($res) {
            $result = $ps->fetchAll();
            $result = array_map([Tarea::class, 'fromRowToTarea'], $result);
        }

        return $result;        
    }

    public static function agregarTarea($titulo, $descripcion, $user_id, $estado_id, $tipo_id, $hoy) {
        $query = "INSERT INTO tarea (titulo, descripcion, usuario_id, tipo_id, estado_id, fecha_inicio) VALUES (?, ?, ?, ?, ?, ?)";
        $ps    = Config::$dbh->prepare($query);
        $res   = $ps->execute(array(
                        $titulo,
                        $descripcion,
                        $user_id,
                        $tipo_id,                        
                        $estado_id,
                        $hoy
        ));
      
    }

    public static function borrarTarea($tarea_id) {
        $query = "DELETE FROM tarea WHERE tarea_id =".$tarea_id;
        $ps    = Config::$dbh->prepare($query);
        $res   = $ps->execute(array());
      
    }

    public static function mostrarTarea($id) {
        $query = "SELECT * FROM tarea WHERE tarea_id = ?";
        $ps    = Config::$dbh->prepare($query);
        $res   = $ps->execute(array($id));
        $result = array();
        if($res) {
            $result = $ps->fetchAll();
            $result = array_map([Tarea::class, 'fromRowToTarea'], $result);
        }

        return $result;
    }

/*    public static function obtenerTipo($id) {
        $query = "SELECT nombre FROM tipo_tarea WHERE tipo_id=".$id;
        $ps    = Config::$dbh->prepare($query);
        $res   = $ps->execute(array(
                        $nombre
        ));
    }*/

    public static function actualizarTarea($tarea_id, $titulo, $descripcion, $user_id, $estado_id, $tipo_id) {
        $query = "UPDATE tarea 
                  SET titulo =?,
                  descripcion =?, 
                  estado_id =?,
                  tipo_id =?
                  WHERE tarea_id =?";
        $ps    = Config::$dbh->prepare($query);
        $res   = $ps->execute(array(
                                $titulo,
                                $descripcion,
                                $estado_id,
                                $tipo_id,
                                $tarea_id
        ));
      
    }

    function __construct($result_row) {
        $this->id          = $result_row["tarea_id"];
        $this->titulo      = $result_row["titulo"];
        $this->descripcion = $result_row["descripcion"];        
        $this->estado      = $result_row["estado_id"];
        $this->tipo        = $result_row["tipo_id"];
        $this->fecha_inicio= $result_row["fecha_inicio"];
        $this->usuario     = $result_row["usuario_id"];       
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setFecha($fecha_inicio) {
        $this->fecha_inicio = fecha_inicio;
    }
    public function getFecha() {
        return $this->fecha_inicio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    public function getEstado() {
        return EstadoTarea::getById($this->estado);
    }

    public function getTipo() {
        return TipoTarea::getById($this->tipo);
    }

}

?>