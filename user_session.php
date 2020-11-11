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
     @media (max-width: 500px) {
     .row
         {
        
        width: 100%;
        height: auto;
  }
}
    .head{
  width: 100%;
  height: 500px;
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
      <a class="nav-link " href="cart.php">
          <img src="images/bag.jpg" style="width:30px;" >
      </a>
    </li>
    </ul>
    </div>
</nav> 
    
    <div id="head">
        <img src="images/img_user_session.png"  class="img-responsive" width="100%" height="600px">
    </div>
    
<div class="container" >
   <div class="col-lg-12" >
   <br>
   </div>
    <div class="row">
        <div class="col-lg-4">
        <img src="images/advert1.png" class="img-responsive" width="70%">
        </div>
        <div class="col-lg-4">
        <img src="images/advert2.png" class="img-responsive" width="70%">
        </div>
        <div class="col-lg-4">
        <img src="images/advert4.png" class="img-responsive" width="70%">
        </div>
    </div>
    </div>

   
</body>
</html>