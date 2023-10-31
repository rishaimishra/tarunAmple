<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Icons -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <link rel="stylesheet" href="./assets/css/dashboard.css">
</head>

<body>
  <div id="wrapper">
    <div id="sidebar" class="sidebar">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <img src="./assets/images/sidebar/logo.png" width="30">
        </a>
        <a href="#" class="simple-text logo-normal hide-content-collapsed">
          AMPLE POINTS
        </a>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">
          <li><a href=""><i class="fas fa-th-large"></i></a><a href="#" class="hide-menu"> Dashboard</a>
          </li>
          <!-- Add more menu items and submenus as needed -->
        </ul>
      </div>
    </div>
    <div id="content">
      <div id="header" class="header">
        <div class="header-menu">
          <div class="toggle">
            <button id="menu-toggle">☰</button>
            <p>Dashboard</p>
          </div>
          <div class="user">
            <i class="fas fa-user"></i>
          </div>
        </div>
      </div>
      <div id="main-content" class="main-content">
        <h2>Main Content</h2>
        <p>This is the main content section.</p>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.bundle.js"></script>

  <script>
    var sidebar = document.getElementById('sidebar');
    var menuToggle = document.getElementById('menu-toggle');
    var logoText = document.querySelector('.hide-content-collapsed');
    var menuHide = document.querySelector('.hide-menu');

    menuToggle.addEventListener('click', function () {
      var isCollapsed = sidebar.classList.toggle('collapsed');
      menuToggle.innerText = isCollapsed ? '✕' : '☰'; // Change the text here
      logoText.style.display = isCollapsed ? 'none' : 'block';
      menuHide.style.display = isCollapsed ? 'none' : 'block';
    });
  </script>

</body>

</html>