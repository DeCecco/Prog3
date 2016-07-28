<?php
require_once ("clases/usuario.php");
require_once ("clases/AccesoDatos.php");

$queHago = isset($_POST['queHago']) ? $_POST['queHago'] : NULL;

switch($queHago){

	case "mostrarGrilla":
	
		$ArrayDeProductos = Producto::TraerTodosLosProductos();

		$grilla = '<table class="table">
					<thead style="background:rgb(14, 26, 112);color:#fff;">
						<tr>
							<th>  COD. BARRA </th>
							<th>  NOMBRE     </th>
							<th>  FOTO       </th>
							<th>  ACCION     </th>
						</tr> 
					</thead>';   	

		foreach ($ArrayDeProductos as $prod){
			$producto = array();
			$producto["codBarra"] = $prod->GetCodBarra();
			$producto["nombre"] = $prod->GetNombre();

			$producto = json_encode($producto);
		
			$grilla .= "<tr>
							<td>".$prod->GetCodBarra()."</td>
							<td>".$prod->GetNombre()."</td>
							<td><img src='archivos/".$prod->GetPathFoto()."' width='100px' height='100px'/></td>
							<td><input type='button' value='Eliminar' class='MiBotonUTN' id='btnEliminar' onclick='EliminarProducto($producto)' />
								<input type='button' value='Modificar' class='MiBotonUTN' id='btnModificar' onclick='ModificarProducto($producto)' /></td>
						</tr>";
		}
		
		$grilla .= '</table>';		
		
		echo $grilla;
		
		break;
		
	case "subirFoto":
		
		$res = Archivo::Subir();
		
		echo json_encode($res);

		break;
	
	case "borrarFoto":
		
		$pathFoto = isset($_POST['foto']) ? $_POST['foto'] : NULL;

		$res["Exito"] = Archivo::Borrar("./tmp/".$pathFoto);
		
		echo json_encode($res);
		
		break;
		
	case "agregar":
		$retorno["Exito"] = TRUE;
		$retorno["Mensaje"] = "";
		$obj = isset($_POST['producto']) ? json_decode(json_encode($_POST['producto'])) : NULL;
		
		$p = new Producto($obj->codBarra,$obj->nombre,$obj->archivo,$obj->radio);
		
		if(!Producto::Guardar($p)){
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "Lamentablemente ocurrio un error y no se pudo escribir en el archivo.";
		}
		else{
			if(!Archivo::Mover("./tmp/".$obj->archivo, "./archivos/".$obj->archivo)){
				$retorno["Exito"] = FALSE;
				$retorno["Mensaje"] = "Lamentablemente ocurrio un error al mover el archivo del repositorio temporal al repositorio final.";
			}
			else{
				$retorno["Mensaje"] = "El archivo fue escrito correctamente. PRODUCTO agregado CORRECTAMENTE!!!";
			}
		}
	
		echo json_encode($retorno);
		
		break;
	
	case "eliminar":
	//echo 'LLEGASTE A ELIMINAR FALTA LO DEMAS';
	//die();
		$retorno["Exito"] = TRUE;
		$retorno["Mensaje"] = "";
		$obj = isset($_POST['usuario']) ? json_decode(json_encode($_POST['usuario'])) : NULL;
		
		if(!usuario::BorrarUsuario($obj->id)){
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "Lamentablemente ocurrio un error y no se pudo escribir en el archivo.";
		}
		else{
			$retorno["Mensaje"] = "El usuario fue borrado correctamente. usuario eliminado CORRECTAMENTE!!!";
		}
	
		echo json_encode($retorno);
		
		break;
		
	case "modificar":
		$retorno["Exito"] = TRUE;
		$retorno["Mensaje"] = "";
		$obj = isset($_POST['usuario']) ? json_decode(json_encode($_POST['usuario'])) : NULL;
		
		$p = new usuario($obj->id,$obj->nombre);
		
		if(!usuario::Modificar($p)){
			$retorno["Exito"] = FALSE;
			$retorno["Mensaje"] = "Lamentablemente ocurrio un error y no se pudo escribir en el archivo.";
		}
		else{
			if(!Archivo::Mover("./tmp/".$obj->archivo, "./archivos/".$obj->archivo)){
				$retorno["Exito"] = FALSE;
				$retorno["Mensaje"] = "Lamentablemente ocurrio un error al mover el archivo del repositorio temporal al repositorio final.";
			}
			else{
				$retorno["Mensaje"] = "El archivo fue escrito correctamente. PRODUCTO modificado CORRECTAMENTE!!!";
			}
		}
	
		echo json_encode($retorno);
		
		break;
	default:
		echo ":(";
}
?>