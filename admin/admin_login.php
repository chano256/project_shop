<?php 
    session_start();
    include 'src/include/db.php';
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>  
    
        <link rel="stylesheet" href="src/css/style.css">   
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" action="" name="form1" method="post">
    <p><input type="text" required name="username" placeholder="Enter Username"></p>
    <p><input type="password" required name="pwd" placeholder="Password"></p>
    <p><input type="submit" name="submit1" value="Log in"></p>
  </form>
</div>
    <?php 
        if (isset($_POST["submit1"])) {
            $query = "SELECT * FROM admin_login WHERE username = '{$_POST["username"]}' && password = '{$_POST["pwd"]}'";
            $res = mysqli_query($db, $query);
            
            while ($row = mysqli_fetch_array($res)) {
                $_SESSION["admin"] = $row["username"];
             ?>
             
             <script type="text/javascript">window.location = "add_product.php";</script>
             
             <?php  
            }
        }
    ?>
  </body>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</html>
