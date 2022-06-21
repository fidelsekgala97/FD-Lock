<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<title>Smart-App Graphical Password</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
  <?php
    session_start();
    include 'includes/dbh.inc.php';
    $msg = "";
    $msgClass =""; 

    if (isset($_POST['verify'])) {
      $email = mysqli_real_escape_string($conn, $_POST['username']);
      if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

          $sql ="SELECT * FROM user WHERE user_email ='$email'";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);
              $row = mysqli_fetch_assoc($result);

              if($resultCheck >0){
                $msg = "You are registered";
                
                $_SESSION['userid'] =$row['id'];
                
              }else{
              $msg = "You are not registered";
            }
        }else{
            $msg = "Enter valid email address";
            $msgClass ="danger";}
      }else{
          $msg = "Enter email address";
          $msgClass ="danger";}

      
    }

  ?>
<div class="tablet">
  <div class="content">
    <!-- headings -->
    <div class="header">
      <div>
        <h1>FD locker Graphical Password</h1>
      </div>
    </div>


    <div class="about">
      <h2>About FD Locker Interface</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

    <!-- verification form-->
    <?php
        if(($msg != "You are registered") and ($msg != "You are not registered")):?>
    <div class="form-verify">
      <p class="msg <?PHP echo $msgClass; ?>"><?PHP echo $msg; ?>
      <form method="post" action="index.php">
        <label>Username verification:</label>
        <input type="text" name="username">
        <button type="submit" name="verify">Verify</button>
      </form>
    </div>
    <?php endif;?>


    <!-- register/Login Buttons -->
    <?php
        if(($msg == "You are registered")){
          echo '<div class="btn"><button><a href="login.php"><i class="fas fa-key"></i> <span>Login</span></a></button></div>';
        }

        elseif(($msg == "You are not registered")){
         echo ' <div class="btn"><button><a href="register.php"><i class="fas fa-lock"></i><span>Register</span></a></button></div>';
        }
    ?>  
     
  </div>
</div>

</body>
</html>
