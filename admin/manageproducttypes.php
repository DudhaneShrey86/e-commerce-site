<?php
require '.././conn.php';
if(isset($_SESSION['curuser']) && !empty($_SESSION['curuser'])){

}
else{
  header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Admin Page</title>
  <?php include('.././partials/admincsslinks.php') ?>
</head>
<body>
  <?php include('.././partials/adminheader.php'); ?>
  <main data-id="manageproducttypes">
    <div class="container">
      <div class="row">
        <br>
        <div class="col s12 l8 offset-l2 card">
          <ul class="tabs">
            <li class="tab"><a href="#addtypes">Add</a></li>
            <li class="tab"><a href="#managetypes">Manage</a></li>
          </ul>
          <div class="divider">

          </div>
          <div class="row">
            <div class="col s12" id="addtypes">
              <p class="flow-text">Adding New Product Type</p>
              <form action="./manageproducttypes.php" method="post" onsubmit="addtags()">
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" id="name" name="name">
                    <label for="name">Name</label>
                    <span class="helper-text"></span>
                  </div>
                  <div class="input-field col s12">
                    <button class="btn waves-effect waves-light">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col s12" id="managetypes">
              <p class="flow-text">Manage Product Type</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include('.././partials/adminjslinks.php') ?>
  <script src=".././js/manageproducttypes.js" charset="utf-8"></script>
</body>
</html>
<?php
  if(isset($_SESSION['errormsg'])){
    unset($_SESSION['errormsg']);
  }
?>
