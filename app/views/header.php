<?php
  include_once(__DIR__ . '/../services/custompagesservice.php');
  include_once __DIR__ . '/../models/User.php';

  if(isset($_SESSION['user'])){
      $user = unserialize($_SESSION['user']);
  }
?>

<!DOCTYPE html>
<html lang="en" style="height:100%">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Festival</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="/css/styleNav.css" />
  <link type="text/css" rel="stylesheet" href="/css/footer-style.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


  <?php
  if (isset($var)) {
    switch ($var) {
      case 'artist':
        echo '<link type="text/css" rel="stylesheet" href="/css/artistsstylesheet.css"/>';
        break;
      case 'jazz':
        echo '<link type="text/css" rel="stylesheet" href="/css/jazzstylesheet.css"/>';
        break;
      case 'history':
        echo '<link type="text/css" rel="stylesheet" href="/css/historystylesheet.css"/>';
        break;
      case 'dashboard':
        echo '<link type="text/css" rel="stylesheet" href="/css/dashboard.css"/>';
        break;

      default:
        break;
    }
  }
  ?>
</head>

<body style="height:100%">

  <nav class="navbar navbar-expand-lg bg-body-tertiary p-0" id="nav">
    <div class="container" id="header">
      <a class="navbar-brand" href="/"> <img id="logo" src="/img/logo.png" /></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class=" d-flex justify-content-end navbar-nav me-auto w-100">

          <li class="nav-item">
            <a class="nav-link" href="/jazz">Jazz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/yummy/yummy">Yummy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/history">History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/kids">Kids</a>
          </li>
            <?php if(isset($_SESSION['customPageService'])){
                echo '<li class="nav-item">
                        <a class="nav-link" href="/custompages">Custom Page</a>
                      </li>';
            }?>
          <?php if (isset($_SESSION['user'])) { ?>
            <li class="nav-item">
              <a href="/login/logout" class="nav-link">logout</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="/login" class="nav-link">login/register</a>
            </li>
          <?php } ?>
          
          <?php if ((isset($_SESSION['user'])) && $user->getRole() == 'admin') : ?>
            <div class="dropdown m-1">
              <button class="btn dropdown-toggle btn-transparent text-white nav-link" type="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="/users">Users</a></li>
                  <li><a class="dropdown-item" href="/yummy/yummyDashboard">Yummy - Restaurants</a></li>
                  <!-- <li><a class="dropdown-item" href="/yummy/sessionDashboard">Yummy - Sessions</a></li> -->
                  <li><a class="dropdown-item" href="/admin/orderDashboard">Orders</a></li>
              </ul>
            </div>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link"><img id="language" src="/img/taal.png" /></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
