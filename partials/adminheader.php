<header>
  <ul class="sidenav sidenav-fixed" id="side-menu">
    <li>
      <div class="user-view">
        <a href="#name"><span class="name">Logged in as: <?php echo $_SESSION['curuser'] ?? ''; ?></span></a>
      </div>
    </li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Home</a></li>
    <li id="addproducts"><a href="./addproducts.php" class="waves-effect">Add Product</a></li>
    <li id="manageproducts"><a href="./manageproducts.php" class="waves-effect">Manage Products</a></li>
    <li id="manageproducttypes"><a href="./manageproducttypes.php" class="waves-effect">Manage Product Types</a></li>
    <li id="orderedproducts"><a href="./orderedproducts.php" class="waves-effect">Take An Order</a></li>
    <?php
    if($_SESSION['curuserdesignation'] == 0){
      ?>
      <li id="addusers"><a href="./manageusers.php" class="waves-effect">Manage Users</a></li>
      <?php
    }
    else{
      ?>

      <?php
    }
    ?>

    <li><div class="divider"></div></li>
    <?php
      if(isset($_SESSION['curuser'])){
        ?>
        <li><a href="./logout.php" class="waves-effect">Logout</a></li>
        <?php
      }
    ?>
  </ul>
  <div class="navbar">
    <ul class="dropdown-content" id="userdropdown">
      <li><a href="./logout.php">Logout</a></li>
    </ul>
    <nav class="blue darken-4">
      <div class="nav-wrapper container">
        <a href="./addproducts.php" class="brand-logo">Logo</a>
        <a href="#!" data-target="side-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <?php
          if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){
            ?>
            <li><span>Hello <?php echo $_SESSION['curuser'] ?> </span></li>
            <li><a class="dropdown-trigger" href="#!" data-target="userdropdown"><i class="material-icons">account_circle</i></a></li>
            <?php
          }
          else{
            ?>
            <li><a href="./login.php">Login</a></li>
            <?php
          }
          ?>
        </ul>
      </div>
    </nav>
  </div>
</header>
