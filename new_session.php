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
 <?php

session_start();

 include "conexion.php";
  $conn = new PDO("mysql:host=$servername;dbname=ahuehuete", $username, $password)or die ("conexion fallida");
     
    //se ejecuta iniciar sesión
    if(isset($_POST["iniciar"])) { 
        
                //variables locales 
                $CORREO = $_POST['CORREO']; 
                 $PASS1 = $_POST['PASS1']; 
        
    
          //query  
          $sql = "select NOMBRE from usuario where CORREO = '$CORREO' and PASS1 = '$PASS1'";           
            if($users = $conn->query($sql)){
                if($users->rowCount()>0){               
                   header("Location:user_session.php");
                        die();                                  
                }else{
                    echo "usuario no encontrado";
                }
            }else{
                echo "query no ejecutada";
            }    
    }
?>

  <!-- menú superior-->
    <nav id="menu" class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-left">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="main.php">Menú prinicipal</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="catalog.php">Productos</a>
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
<!--la pagina se divide en dos columnas para separa el contenido del form y la imagen-->
   <div class="row">  
    <div class="col-lg-4">
     <form action="user_session.php" method="post">
         <input type="email" id="mail" name="CORREO" placeholder="Correo" required style="margin-top:50px"><br><br> 
      
        <input type="password" id="pwd1" name="PASS1" placeholder="Contraseña"  min="8" max="15" required><br><br>           
          
          <input class="button" type="submit" value="Iniciar sesión" name="iniciar">
     </form>
     </div>
      <!--imagen-->
      <div class="col-lg-8"> 
           <img src="images/img_new_session.png"  class="img-responsive" style="width:90%; float:right;" >
       </div>
       
        
   </div>
    
</body>
</html>