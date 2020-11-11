<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8"> 
    <meta  name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Página principal</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  <style>
      /* contenido responsivo*/
    @media (max-width: 500px) {
     .row
      {
        width: 100%;
        height: auto;
  }
}    
      /* limpia los floats de las columnas */
      .row { 
          position: relative;
          content: "";
          clear: both;
      }
      h2{        
          text-align: center;
          font-style: normal;
          font-size: 40px;
      }

    </style>
   <body>
   <!-- divide la pantalla en dos columnas para el contenido-->
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="catalog.php">Productos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="us.php">Nosotros</a>
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
<div class="row">
<div class="col-lg-4">
    <img src="images/logo_main.png" class="img-responsive" 
    style="width:100%;margin-left: 30px" >
    
    <h2> Ahuehuete Plant Shop</h2>
    </div>
  <div class="col-lg-8">   
    <img src="images/main_img.png" class="img-responsive"
     style="width:100%;">
    </div>
</div>
</body>
</html>