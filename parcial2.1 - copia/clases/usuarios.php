<?php
class usuarios
{
	public $id;
 	public $nombre;
  	public $mail;
  	public $clave;
  	public $dni;
  	public $foto;

  	public function BorrarUser($dato)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from tabladedatos 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$dato, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }
	 	public static function BorrarCdPorAnio($año)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from cds 				
				WHERE jahr=:anio");	
				$consulta->bindValue(':anio',$año, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }
	public function ModificarCd()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update cds 
				set titel='$this->titulo',
				interpret='$this->cantante',
				jahr='$this->año'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	 public function ModificarCdParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update cds 
				set titel=:titulo,
				interpret=:cantante,
				jahr=:anio
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
			$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
			return $consulta->execute();
	 }

  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->titulo."  ".$this->cantante."  ".$this->año;
	}
	 public function InsertarCd0()
	 {

				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values('$this->titulo','$this->cantante','$this->año')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }

	 	 public static function InsertarElUsuario($dato)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (usuario,mail,clave)values('$dato->usuario','$dato->mail','$dato->clave')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }


	 	 	 public static function Logueado($dato)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from usuarios ");
				//$consulta =$objetoAccesoDato->RetornarConsulta("SELECT usuario,mail,clave FROM USUARIOS WHERE USUARIO='$dato->usuario' AND MAIL= '$dato->mail' AND CLAVE= '$dato->clave'";
				$consulta->execute();	
				return $consulta->fetchall(PDO::FETCH_BOTH);		
				/*$resultado= $consulta->fetchObject('usuarios');
				return $resultado;		*/		
	//	public array PDOStatement::fetchAll ([ int $fetch_style [, mixed $fetch_argument [, array $ctor_args = array() ]]] )
	

	 }

	  public  function InsertCD()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values('$this->nombre','$this->email','$this->clave')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	  	 	 public static function LogueadoP($dato)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("SELECT *  FROM `usuarios` WHERE  `clave`=:clave and `mail`=:mail ;");

				$consulta->bindValue(':mail',$dato->mail, PDO::PARAM_STR);
				$consulta->bindValue(':clave',$dato->clave, PDO::PARAM_STR);
				$consulta->execute();
				//return $consulta->fetchAll(PDO::FETCH_BOTH);	

				$cdBuscado= $consulta->fetchObject('usuarios');
				return $cdBuscado;	
				

	 }	

	  public static function ListadoUsuarios()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("SELECT *  FROM `usuarios`;");
				$consulta->execute();
				return $consulta->fetchAll(PDO::FETCH_BOTH);	
				

	 }	
	 	  public static function Listadoss()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("SELECT *  FROM `tabladedatos`;");
				$consulta->execute();
				return $consulta->fetchAll(PDO::FETCH_BOTH);	
				

	 }	

	  public static function Muser($dato)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `tabladedatos` SET `nombre`=:nombre,`clave`=:clave,`mail`=:mail, `dni`=:dni,`foto`=:foto WHERE id=:id");
				$consulta->bindValue(':nombre',$dato->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':mail',$dato->mail, PDO::PARAM_STR);
				$consulta->bindValue(':clave',$dato->clave, PDO::PARAM_STR);
				$consulta->bindValue(':dni',$dato->dni, PDO::PARAM_INT);
				$consulta->bindValue(':foto',$dato->foto, PDO::PARAM_STR);
				$consulta->bindValue(':id',$dato->id, PDO::PARAM_INT);
//				return $consulta;
			//	$consulta->execute();
				//return $objetoAccesoDato->RetornarUltimoIdInsertado();	
					return $consulta->execute();
				

	 }	

	   public static function AltaUsuario($dato)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `tabladedatos` (`NOMBRE`,`MAIL`,`CLAVE`,`DNI`,`FOTO`) VALUES (:nombre,:mail,:clave,:dni,:foto)");
				$consulta->bindValue(':nombre',$dato->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':mail',$dato->mail, PDO::PARAM_STR);
				$consulta->bindValue(':clave',$dato->clave, PDO::PARAM_STR);
				$consulta->bindValue(':dni',$dato->dni, PDO::PARAM_INT);
				$consulta->bindValue(':foto',$dato->foto, PDO::PARAM_STR);
//				return $consulta;
				$consulta->execute();
				//return $objetoAccesoDato->RetornarUltimoIdInsertado();	
				return $consulta->fetchAll(PDO::FETCH_BOTH);	
				

	 }	


	 public function InsertarElCdParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values(:titulo,:cantante,:anio)");
				$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
				$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
				$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 


  	public static function TraerTodoLosCds()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,titel as titulo, interpret as cantante,jahr as año from cds");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "cd");		
	}

	public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre,clave from usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "cd");		
	}

	public static function TraerUnCd() 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, titel as titulo, interpret as cantante,jahr as año from cds where id = 1");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('usuarios');
			return $cdBuscado;				

			
	}

	public static function TraerUnCdAnio($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=? AND jahr=?");
			$consulta->execute(array($id, $anio));
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}

	public static function TraerUnCdAnioParamNombre($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->bindValue(':id', $id, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $anio, PDO::PARAM_STR);
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}
	
	public static function TraerUnCdAnioParamNombreArray($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->execute(array(':id'=> $id,':anio'=> $anio));
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}



}