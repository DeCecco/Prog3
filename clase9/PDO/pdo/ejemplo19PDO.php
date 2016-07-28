<!DOCTYPE html>
<html>
     <head>
        <title> Ejempos PHP</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="./js/funciones.js"></script>
        <!--script src="bower_components/jquery/dist/jquery.min.js"></script-->
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
      <div class="container">
            <div class="page-header">
                <h1>Ejemplos de PHP</h1>      
            </div>
            <div class="jumbotron">
                <h3 class="text-info">Método de instancia para Modificar.</h3>
                    <div class="well well-sm text-info">
                                 $arraysDeCd =cd::TraerTodoLosCds();<br>
                                 echo "creo la tabla"<br>
                                


                                  foreach ($arraysDeCd as $cd) {<br>
                                   //formo el contenido de las celdas<br>
                                  }<br>
                                  echo" cierro la tabla"; <br>
                                    ?><br>
                                 


                                    
                    </div>
             </div>
             <h3 >  Método de la clase  </h3>
                                    <?php
                                    include_once ("clases/AccesoDatos.php");
                                    include_once ("clases/usuario.php");

                                   $arraydeUsuarios =usuario::TraerTodoLosUsuarios();

                                  echo" <table class='table  '>
                                    <thead>
                                      <tr>
                                        <th>Modificar</th>
                                        <th>borrar</th>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <!-- <th>año</th> -->
                                      </tr>
                                    </thead>";



                                  foreach ($arraydeUsuarios as $usuario) {
                                    $usu = array();
                                    //$usuario["id"] = $usu->GetNombre();
                                    //$usuario["nombre"] = $usu->GetId();
                                    $usu = json_encode($usuario);

                                    echo "<tr>
                                        <td> <a class='btn btn-warning' id='$usuario->id' onClick=ModificarUsuario($usu) >Modificar</a></td>
                                        <td> <a class='btn btn-danger'  id='$usuario->id'  onClick=borrar($usu)>Borrar</a></td>
                                        <td><div id='usuario'>$usuario->id</div></td>
                                        <td><div id='nombre'>$usuario->nombre</div></td>
                                        <!--td>$usuario->clave</td-->
                                      </tr>";
                                  }
                                  echo" </table>"; 

                                  $html="<div><a><input id='id' type='text'></a></div>";
                                  $html=$html . "<div><a><input id='name' type='text'></a></div>";
                                  $html=$html . "<div><a><input id='pass' type='text'></a></div>";
                                  $html=$html . "<div><a onClick=ModificarUser($usu) class='btn btn-warning id='guardar' value='Modificar' type='button'>Modificar</a></div></br>";
                                  echo $html;

                                    ?>
                            <a class="btn btn-info" href="indexPDO.html">Menu principal</a>


                  </div>

    </body>
</html>



