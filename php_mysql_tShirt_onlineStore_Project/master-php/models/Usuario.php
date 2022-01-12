<?php

class Usuario{
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $rol;
	private $imagen;
	private $db;
	//My code

	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getApellidos() {
		return $this->apellidos;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function getRol() {
		return $this->rol;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setApellidos($apellidos) {
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email); //Que hace aqui db???
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function setRol($rol) {
		$this->rol = $rol;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function save(){
		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function login(){
		$result = false;
		$email = $this->email;
		$password = $this->password;
		
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$login = $this->db->query($sql); //Que devuelve??
		
		
		if($login && $login->num_rows == 1){ //Entiendo que login es true si no es false
			$usuario = $login->fetch_object();
			
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){ 
				$result = $usuario;
			}
		}
		
		return $result;
	}

	//My code
	public function getAll(){
		$usuario = $this->db->query("SELECT u.id, nombre, apellidos, email, rol, (SELECT sum(coste) FROM `pedidos` WHERE usuario_id = u.id) AS 'Coste_Pedidos', (SELECT count(*) FROM `pedidos` WHERE usuario_id = u.id AND estado = 'sended') AS 'Pendientes' FROM `usuarios` u ORDER by id DESC ");
		return $usuario;
	}
	//End my code
	
	
	
}