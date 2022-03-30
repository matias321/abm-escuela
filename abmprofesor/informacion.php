<!DOCTYPE html>

<html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
         <title></title>

    </head>
              
    <body>

              <center>
                      <h2>Profesores</h2>
              </center>
              <br>
              </br>

          <div class="d-grid gap-2 col-6 mx-auto">


        <a  href="formu.php?oper=1">
          <input type="button" class="btn btn-dark" value=" Nuevo Profesor">
        </a>

        
      

      </div>

      <br></br>
      
      <div>
          <table class="table">
              <thead class="table-dark">
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Direcciòn</th>
                  <th scope="col"></th>
               </tr>
              </thead>
              <tbody>
              <?php
                include("clsprofesor.php");
                $profesor = new clsprofesor();
                $datosTodosLosprofesor = $profesor->getprofesores();
                while($cadaRegistro=mysqli_fetch_array($datosTodosLosprofesor, MYSQLI_ASSOC)){
                        
                ?>
              <tr>
                <td><?php echo $cadaRegistro['nombre'] ?></td>
                <td><?php echo $cadaRegistro['apellido'] ?></td>
                <td><?php echo $cadaRegistro['dni'] ?></td>
                <td><?php echo $cadaRegistro['telefono'] ?></td>
                <td><?php echo $cadaRegistro['direccion'] ?></td>
                <td>
                
            <div>
                    <a href="<?php echo "formu.php?oper=".$cadaRegistro['idprofesor'] ?>" ><i class="fa fa-edit" style="font-size:40px;color:black"></i> </a>
                    
                    <a href="formuconfirmacionprofesor.php?oper=3&idprofesor=<?php echo $cadaRegistro['idprofesor']?>&nombre=<?php echo $cadaRegistro['nombre']?>&apellido=<?php echo $cadaRegistro['apellido']?>&dni=<?php echo $cadaRegistro['dni']?>&telefono=<?php echo $cadaRegistro['telefono']?>&direccion=<?php echo $cadaRegistro['direccion']?>"> 
                      <i class="fa fa-remove" style="font-size:40px;color:black"></i>
                   </a>

                  </div>
                </td>
              </tr>
              <?php
                  }
              ?>

              
            </tbody>
          </table>
          </div>
          
          <br></br>
          <br></br>
          
          <center>

            <div class="btn btn-dark">
        <a href="../index.php" class="btn btn-dark"> Atras </a>
      </div>
          </div>
          </center>

    </body>

</html>