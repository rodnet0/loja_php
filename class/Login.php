<?php
require_once('Conect.php');
class Login{
	private $login;
	private $senha;
	
	public function setLogin($login){
		$this->login = $login;
	}
	
	public function setSenha($senha){
	    $this->senha = $senha;
	}
	
	public function getLogin(){
	    return $this->login;
	}
	
	public function getSenha(){
	    return $this->senha;
	}
	
	public function logar(){
	    $pdo = Conect::getInstance();
	    $logar = $pdo->prepare('SELECT * FROM usuarios WHERE login = ? AND senha = ?');
	    $logar->bindValue(1,$this->getLogin());
	    $logar->bindValue(2,$this->getSenha());
	    $logar->execute();
	    
	    if ($logar->rowCount() == 1) {
	        $dados = $logar->fetch(PDO::FETCH_OBJ);
	        $_SESSION['usuarios'] = $dados->nome;
	        $_SESSION['logado'] = true;
	        return true;
	    }
	    return false;
	}
	
	public static function deslogar(){
		if(isset($_SESSION["logado"])){
			unset($_SESSION["logado"]);
			session_destroy();
			header("location: index.php");
		}
	}
}
?>
