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
      
           <div class="" id="uprow">
           <img src="images/cact1.jpg" width="150px" height="150px">
           <div class="row">
               <div class="col-6">
                   
        <h4> Cactus colgante </h4>
        <h7>Tamaño aprox 45cm.</h7>
               </div>
               <div class="col-12">
     <h4>$220</h4>
         </div>
          <div class="col-6">
    <button type="button" class="btn btn-dark"> Comprar</button>
    <button type="button" class="btn btn-light"><img src="images/wishlist.png" style="width:20px;"></button>
        </div>
           </div>
       </div>
       
       
          <div class="" id="uprow">
           <img src="images/cact2.jpg" width="150px" height="150px">
           <div class="row">
               <div class="col-6">
                   
        <h4> Cactus injerto</h4>
        <h7>Tamaño aprox 15 cm,colores rojo y amarillo</h7>
               </div>
               <div class="col-12">
     <h4>$200</h4>
         </div>
          <div class="col-6">
    <button type="button" class="btn btn-dark"> Comprar</button>
    <button type="button" class="btn btn-light"><img src="images/wishlist.png" style="width:20px;"></button>
        </div>
           </div>
       </div>
       
       
      <div class="" id="uprow">
           <img src="images/suculenta.jpg" width="150px" height="150px">
           <div class="row">
               <div class="col-6">
                   
        <h4> Variedad de suculentas</h4>
        <h7>Tamaño aprox 10 cm (no incluye maceta)</h7>
               </div>
               <div class="col-12">
     <h4>$45</h4>
         </div>
          <div class="col-6">
    <button type="button" class="btn btn-dark"> Comprar</button>
    <button type="button" class="btn btn-light"><img src="images/wishlist.png" style="width:20px;"></button>
        </div>
           </div>
       </div>
       
       
       <div class="" id="uprow">
           <img src="images/suculenta2.jpg" width="150px" height="150px">
           <div class="row">
               <div class="col-6">
                   
        <h4> Variedad de suculentas </h4>
        <h7>Tamaño aprox 8 a 10 cm</h7>
               </div>
               <div class="col-12">
     <h4>$40</h4>
         </div>
          <div class="col-6">
    <button type="button" class="btn btn-dark"> Comprar</button>
    <button type="button" class="btn btn-light"><img src="images/wishlist.png" style="width:20px;"></button>
        </div>
           </div>
       </div>
       
      <div class="" id="uprow">
           <img src="images/mamill.jpg" width="150px" height="150px">
           <div class="row">
               <div class="col-6">
                   
        <h4> Mamillari Elongata</h4>
        <h7>Tamaño aprox 25 a 30cm</h7>
               </div>
               <div class="col-12">
     <h4>$280</h4>
         </div>
          <div class="col-6">
    <button type="button" class="btn btn-dark"> Comprar</button>
    <button type="button" class="btn btn-light"><img src="images/wishlist.png" style="width:20px;"></button>
        </div>
           </div>
       </div>
       
       
       <div class="" id="uprow">
           <img src="images/coral.jpg" width="200px" height="150px">
           <div class="row">
               <div class="col-6">
                   
        <h4>Cactus coral </h4>
        <h7>Tamaño aprox 25 a 30cm</h7>
               </div>
               <div class="col-12">
     <h4>$240</h4>
         </div>
          <div class="col-6">
    <button type="button" class="btn btn-dark"> Comprar</button>
    <button type="button" class="btn btn-light"><img src="images/wishlist.png" style="width:20px;"></button>
        </div>
           </div>
       </div>
   
     </div>
    
   </div>
   
</body>
</html>