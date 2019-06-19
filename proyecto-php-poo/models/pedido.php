<?php 

class Pedido{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct(){
        //Conexión base de datos
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUsuario_Id(){
        return $this->usuario_id;
    }

    public function setUsuario_Id($usuario_id){
        return $this->usuario_id = $usuario_id;
    }

    public function getProvincia(){
        return $this->provincia;
    }

    public function setProvincia($provincia){
        return $this->provincia = $this->db->real_escape_string($provincia);
    }

    public function getLocalidad(){
        return $this->localidad;
    }

    public function setLocalidad($localidad){
        return $this->localidad = $this->db->real_escape_string($localidad);
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        return $this->direccion = $this->db->real_escape_string($direccion);
    }

    public function getCoste(){
        return $this->coste;
    }

    public function setCoste($coste){
        return $this->coste = $coste;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        return $this->estado = $estado;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        return $this->fecha = $fecha;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setHora($hora){
        return $this->hora = $hora;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }

    public function getOne(){
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id={$this->getId()}");
        return $producto->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_Id()}, '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME())";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_linea(){
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach($_SESSION['carrito'] as $elemento){
            $producto = $elemento['producto'];

            $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']});";
            $save = $this->db->query($insert);
        }

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }
}

?>