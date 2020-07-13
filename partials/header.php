<?php
  $query = "SELECT DISTINCT `type` FROM `products`";
  $res = "";
  if($qr = mysqli_query($mysqli, $query)){
    while($row = mysqli_fetch_assoc($qr)){
      $res .= '<li><a href="./index.php?type='.$row['type'].'" class="waves-effect">'.$row['type'].'</a></li>';
    }
  }
  $query = "SELECT `id`, `name` FROM `products`";
  $res1 = "";
  if($qr = mysqli_query($mysqli, $query)){
    if(mysqli_num_rows($qr) == 0){
      $res1 = '<a href="#" class="collection-item">No products found</a>';
    }
    else{
      while($row = mysqli_fetch_assoc($qr)){
        $res1 .= '<a href="./productpage.php?id='.$row['id'].'" class="collection-item searchresulta">'.$row['name'].'</a>';
      }
    }
  }
?>

<header>
  <div class="navbar-fixed">
    <nav class="blue darken-2">
      <div class="nav-wrapper row sidepadding">
        <a href="#" data-target="sidenav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <a href="./index.php" class="brand-logo hide-on-med-and-down">Logo</a>
        <form id="searchform" class="col s8 m8 l6 offset-l3 offset-m1" action="" method="post">
          <div class="input-field">
            <input type="search" name="search" id="search" placeholder="Search a product">
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
          <div id="searchresults" class="z-depth-1 collection">
            <?php echo $res1; ?>
          </div>
        </form>
        <ul class="right hide-on-med-and-down">
          <li><a href="#!" class="dropdown-trigger" data-target="categoriesdropdown">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul id="categoriesdropdown" class="dropdown-content">
    <li><a href="./index.php" class="waves-effect">All</a></li>
    <?php echo $res; ?>
  </ul>
  <ul class="sidenav" id="sidenav">
    <li class="row">
      <div class="user-view">
        <a href="./index.php" class="black-text"><h4>Logo</h4></a>
      </div>
    </li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Categories</a></li>
    <li><a href="./index.php" class="waves-effect">All</a></li>
    <?php echo $res; ?>
  </ul>
</header>
