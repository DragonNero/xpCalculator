<!DOCTYPE html>
<html lang="en" class="antialiased">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

  <title>Status &amp; XP | Flying Blue</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/bootstrap-icons.min.css" rel="stylesheet">
  <link href="./css/select2.css" rel="stylesheet">
  <link href="./css/style.css?v=<?= time() ?>" rel="stylesheet">
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./js/jquery.min.js"></script>
  <script src="./js/select2.js"></script>

  <link rel="icon" href="./icons/favicon.ico" sizes="any">
  <link rel="icon" href="./icons/icon.svg" type="image/svg+xml">
  <link rel="apple-touch-icon" href="./icons/apple-touch-icon.png">

  <meta name="theme-color" content="#ffffff">
</head>
<body>
    <?php
    $baseurl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['CONTEXT_PREFIX'];
    $currentPage = 'about';
    if (isset($_GET['p'])) {
        $currentPage = $_GET['p'];
    }
    ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= $baseurl ?>/about">
        <img src="./img/navimg.svg" alt="Logo" width="175" height="36" class="d-inline-block align-text-top">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?= $currentPage === 'about' ? 'active' : '' ?>" aria-current="page" href="<?= $baseurl ?>/about">Status & XP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $currentPage === 'calculator' ? 'active' : '' ?>" aria-current="page" href="<?= $baseurl ?>/calculator">XP Calculator</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="bg-primary h10">
      <h1 class="main-title w-full text-white text-4xl font-bold p-8 pb-16 h-full flex items-center">
        <?php
        if ($currentPage === 'about') {
            echo 'Status & XP';
        } elseif ($currentPage === 'calculator') {
            echo 'XP Calculator';
        }
        ?>
      </h1>
    </div>

    <div class="main-content container">
    <?php
    if ($currentPage === 'about') {
        include_once './pages/statusXp.php';
    } elseif ($currentPage === 'calculator') {
        include_once './pages/calculator.php';
    } else {
        include_once './pages/404.php';
    }
    ?>
    </div>
  </div>

</body></html>