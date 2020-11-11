<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<!-- contenido responsivo -->
<style>   
     @media (max-width: 500px) {
     .row
         {
        width: 100%;
        height: auto;
  }
}
    @media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
     .row { 
          position: relative;
          margin-left: 100px;

      } 
    input{
        width: 90%;
        padding: 10px 15px;      
    }
    input[type=submit]{
        background-color: black;
        color: white;
    }

    </style>
<body>
  <!-- menú superior-->
    <nav id="menu" class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-left">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="main.php">Menú prinicipal</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Productos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Galeria</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">Contacto</a>
    </li>
     <li class="nav-item">
      <a class="nav-link " href="#">
          <img src="images/search_icon.png" style="width:20px;" >
      </a>
    </li>
  </ul>
</nav>

<?php
    
    session_start(); 
    include "conexion.php";
    
    if(isset($_POST["enviar"])) { 
        

                //variables locales
                 $NOMBRE = $_POST["NOMBRE"]; 
                 $APELLIDO1 = $_POST["APELLIDO1"]; 
                 $APELLIDO2 = $_POST["APELLIDO2"]; 
                 $TELEFONO = $_POST["TELEFONO"]; 
                 $CORREO = $_POST["CORREO"]; 
                 $PASS1 = $_POST["PASS1"]; 
                 $PASS2 = $_POST["PASS2"]; 
       try{
                //query 
              $query = "INSERT INTO usuario (NOMBRE,APELLIDO1,APELLIDO2,TELEFONO,CORREO,PASS1,PASS2) VALUES ('$NOMBRE','$APELLIDO1','$APELLIDO2','$TELEFONO ','$CORREO','$PASS1','$PASS2')"; 
           
           $conn->exec($query);
                echo 'Registro guardado.'; 
            }catch(PDOException $e){
           echo $sql . "<br>" . $e->getMessage();
        } } else { }  
     
    ?>


<!--la pagina se divide en dos columnas para separa el contenido del form y la imagen-->
   <div class="row">  
    <div class="col-lg-4">
     <form method="post">
         <input type="text" id="clientName" name="NOMBRE" placeholder="Nombre" size="40" required style="margin-top:50px"><br><br> 
          <input type="text" name="APELLIDO1" name="clientLastName"placeholder="Apellido Paterno" size="40" required><br><br> 
           <input type="text" id="clientLAstName2" name="APELLIDO2" placeholder="Apellido Materno" size="40"><br><br>   
            <input type="tel" id="tel" name="TELEFONO" placeholder="00-0000-0000" maxlength="10" required><br><br> 
             <input type="email" name="CORREO" placeholder="Correo" required><br><br> 
      
        <input type="password" id="pwd1" name="PASS1" placeholder="Crea una contraseña"  min="8" max="15" required><br><br> 
        <label style="color:red">Las contraseñas deben coincidir</label><br> <!--hay que esconder esta etiqueta-->
         <input type="password" id="pwd2" name="PASS2" placeholder="Vuelve a escribir tu contraseña"  min="8" max="15" required><br><br>     
          
          <input type="submit" value="Crear cuenta" name="enviar">
     </form>
     </div>
      <!--imagen-->
      <div class="col-lg-8"> 
           <img src="images/img_new_user.png"  class="img-responsive" style="width:90%; float:right;" >
       </div>
       
        
   </div>
    
</body>
</html>