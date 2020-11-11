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
  
    <!-- menú superior-->
    <nav id="menu" class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
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
  </ul>
  <ul class="nav navbar-nav navbar-right">
         <li class="nav-item">
      <a class="nav-link " href="#">
          <img src="images/search_icon.png" style="width:20px;" >
      </a>
    </li>
         <li class="dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">USUARIO</a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="#" style="background-color:black">Perfil</a></li>
          <li><a class="nav-link" href="#" style="background-color:black">Pedidos</a></li>
          <li><a class="nav-link" href="#" style="background-color:black">Salir</a></li>
        </ul>
      </li>
       <li class="nav-item">
      <a class="nav-link " href="#">
          <img src="images/wishlist.png" style="width:30px;" >
      </a>
    </li>
      <li class="nav-item">
      <a class="nav-link " href="#">
          <img src="images/bag.jpg" style="width:30px;" >
      </a>
    </li>
    </ul>
    </div>
</nav>
   

<div class="container-fluid" id="container">
<!--bootstrap nested columns-->
 <div class="row row-cols-3" >
  
        
            <?php
     include "conexion.php";
    $addCart="INSERT INTO `pedidos`(`ID_PEDIDO`, `ID_USER`, `ID_PROD`, `PROD_PRICE`, `PROD_CANT`, `TOTAL`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])";
    $catFlores = $conn->query($addCart);
    
    
               while ($row=$addCart->fetch(PDO::FETCH_ASSOC)){
          echo '<div class="" id="uprow">';     
          echo '<img src="'.$row["PROD_PIC"].'" width="150px" height="150px">';
          echo '<div class="row">';
          echo '<div class="col-6">';
                   
         echo '<h4>'. $row["PROD_NAME"]. '</h4>';
         echo '<h7>'.$row["PROD_DESC"].'</h7>';
         echo '</div>';
         echo '<div class="col-12">';
         echo '<h4>'.'$'.$row["PROD_PRICE"].'</h4>';
         echo '<h4>'.'$'.$row["PROD_CANT"].'</h4>';
         echo '<h4>'.'$'.$row["TOTAL"].'</h4>';        
                   
         echo   '</div>';                 
     echo '</div>';
    echo '</div>';
           } ?>
     </div>          
      </div>
             
     
  
</body>
</html>