<?php
include_once "Cliente.php";
include_once "Pedido.php";
/*
 * Acceso a datos con BD y Patrón Singleton
 */
class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;
    
    public static function initModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    // Creo un lista de alimentos, podría obtenerse de una base de datos
    private function __construct(){
        
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "root");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }        
    }

    public function checkPswd($name, $pswd){
        $pass = null;
        $this->stmt = $this->dbh->prepare("SELECT * FROM `clientes` WHERE nombre = ? AND clave = ? ");
        $this->stmt->bindValue(1,$name);
        $this->stmt->bindValue(2,$pswd);
        // Devuelvo una tabla asociativa
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'Cliente');
        // Devuelve objectos clientes llamando a constructor y a métodos setter
        if ( $this->stmt->execute() ){
            if ( $cli = $this->stmt->fetch()){
               $pass = $cli;
            }
        }
        return $pass;
    }

    public function aumentarVecesUsuario($id):bool{
        //Sentencia precompilada
        $this->stmt = $this->dbh->prepare("UPDATE clientes SET veces = veces +1 WHERE cod_cliente = ? ");
        $this->stmt->bindValue(1,$id);
        if($this->stmt->execute()){
            return true;
        }
        return false;
    }

    public function obtenerListaPedidos($id):array{
        $tpedidos = [];
        $this->stmt = $this->dbh->prepare("SELECT * FROM `pedidos` WHERE cod_cliente = ? ");
        $this->stmt->bindValue(1, $id);
        // Devuelvo una tabla asociativa
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, 'Pedido');
        // Devuelve objectos clientes llamando a constructor y a métodos setter
        if($this->stmt->execute()){
            while($ped = $this->stmt->fetch()){
                $tpedidos[] = $ped;
            }
        }
        return $tpedidos;
    }
    
     // Evito que se pueda clonar el objeto.
    public function __clone()
    { 
        trigger_error('La clonación no permitida', E_USER_ERROR); 
    }
}