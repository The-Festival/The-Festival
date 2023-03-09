<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type="text/css"
        rel = "stylesheet"
        href = "css/styleNav.css"/> 
</head>
<body>
 
<nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
  <div class="container" id="header">
    <a class="navbar-brand" href="/"> <img  id="logo" src="img/logo.png" /></a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" >
      <ul class=" d-flex justify-content-end navbar-nav me-auto w-100">
        <li class="nav-item">
          <a class="nav-link" href="/article">Dance</a></li>
        <li class="nav-item">
          <a class="nav-link" href="/home/about">Jazz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/home/about">Yummy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/home/about">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/kids">Kids</a>
        </li>
        <?php if(isset($_SESSION['user'])){ ?>
        <li class="nav-item">
          <a href="/login/logout" class="nav-link">logout</a>
        </li>
        <?php }else {?>
          <li class="nav-item">
          <a href="/login" class="nav-link">login/register</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" ><img  id="language" src="img/taal.png"/></a>
        </li>
      </ul>   
        
    </div>
  </div>
</nav>

