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
<style>
    #container{
       margin: 25px 50px 75px 100px
    }
    #uprow{
        margin-top: 20px;
    }  
    
    </style>
<body>
  
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="main.php">Menú Principal</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="catalog.php">Productos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Nosotros</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Galeria</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">Contacto</a>
    </li>
     <li class="nav-item">
      <a class="nav-link " href="new_user.php">Registro</a>
    </li>
     <li class="nav-item">
      <a class="nav-link active" href="new_session.php">Inicia sesión</a>
    </li>
     <li>
     <li class="nav-item">
      <a class="nav-link " href="#">
          <img src="images/search_icon.png" style="width:20px;" >
      </a>
    </li>
  </ul>
</nav>
   

<div class="container-fluid" id="container">
<!--bootstrap nested columns-->
 <div class="row row-cols-3" >
  
        
            <?php
     session_start();
     include "conexion.php";
    $flowers="select * from catalogo_flores";
    $catFlores = $conn->query($flowers);
    
    
               while ($row=$catFlores->fetch(PDO::FETCH_ASSOC)){
          echo '<div class="" id="uprow">';     
          echo '<img src="'.$row["PROD_PIC"].'" width="150px" height="150px">';
          echo '<div class="row">';
          echo '<div class="col-6">';
                   
         echo '<h4>'. $row["PROD_NAME"]. '</h4>';
         echo '<h7>'.$row["PROD_DESC"].'</h7>';
         echo '</div>';
         echo '<div class="col-12">';
         echo '<h4>'.'$'.$row["PROD_PRICE"].'</h4>';
                   
         echo   '</div>';
                   
         echo '<div class="col-6">';               
  echo '<button type="button" class="btn btn-dark" action="add_cart"> Comprar</button>';
  echo '<button type="button" class="btn btn-light" action="add_wish"><img src="images/wishlist.png" style="width:20px;"></button>';
   echo '</div>';
     echo '</div>';
    echo '</div>';
           } ?>
     </div>          
      </div>
          
</body>
</html>