<!DOCTYPE html>

<html>

    <head>
    	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

         <title></title>

    </head>
    
    <center>
    			<h2>Datos Personales</h2>
    </center>   
 
    <body>
    <br>
    <br>
 
 <?php
    
      if(isset($_GET['oper'])){
       
        $operacion = $_GET['oper'];
      }else{
        header('location:informacion.php');
      }


    include("clsprofesor.php");
    $profesor = new clsprofesor();

 
     
          if(isset($_GET['modificar']) && $_GET['modificar'] == 1)
          {
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $dni = $_GET['dni'];
            $telefono = $_GET['telefono'];
            $direccion = $_GET['direccion'];
           
          }else
            {
              $nombre = "";
              $apellido = "";
              $dni = "";
              $telefono = "";
              $direccion = "";

      }
    } 

    else {
      $idprofesor = $_GET['idprofesor'];
      $profesor->idprofesor = $idprofesor;
      $registrodedatos = $profesor->getprofesores();

      if ($vectordato = mysqli_fetch_array( $registrodedatos, MYSQLI_ASSOC)) {

        // aca van todos los datos de profesor
        $nombre = $vectordato['nombre'];
        $apellido = $vectordato['apellido'];
        $dni = $vectordato['dni'];
        $telefono = $vectordato['telefono'];
        $direccion = $vectordato['direccion'];
      }
    }
    ?>

  <div>

   
        <form action="formuconfirmacionprofesor.php?oper=<?php echo $operacion ?>" method="post" >

                <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nombre" value="<?php echo $nombre?>" name="nombre">
                </div>
                <br>
               </br>
               <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Apellido</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="apellido" value="<?php echo $apellido?>"name="apellido">
                </div>
              </div>
              <br>
            </br>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">DNI</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="dni" value="<?php echo $dni?>" name="dni">
                </div>
              </div>
              <br>
            </br>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="telefono" value="<?php echo $telefono?>" name="telefono">
                </div>
              </div>
              <br>
            </br>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Direcciòn</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="direccion" value="<?php echo $direccion?>" name="direccion">
                </div>
              </div>
              <br>
            </br>
  <center>

      <div align="center">
                <input class="btn btn-dark" type="submit" value="Guardar" >
               
                
                <a href="informacion.php">
                  <input class="btn btn-dark"type="button" value="Cancelar" class="Boton" >
                </a>
      </div>
  </center>

  </form>

    
  
</div>

</body>
</html>