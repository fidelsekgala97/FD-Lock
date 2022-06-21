<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<title> FD Graphical Password</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<?php
    session_start();
    include 'includes/dbh.inc.php';

    $msg = "";
    $msgClass =""; 

    if (isset($_POST['register'])) {

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);

      if (!empty($name) && !empty($email) && !empty($phone)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if (strlen($phone) == 10 && is_numeric($phone)) {

            $sql ="SELECT * FROM user WHERE user_email ='$email'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck <= 0) {
                  $sql ="INSERT INTO user(user_name, user_email, user_phone) VALUES('$name' ,'$email', '$phone')";
                    $result = mysqli_query($conn, $sql);
                    
                    if ($result) {

                      $sql ="SELECT * FROM user WHERE user_email ='$email'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    
                    $_SESSION['userid'] =$row['id'];
                    
                      $phone ="";
                      $email ="";
                      $name ="";
                      $msg = "you are successfully registered";
                      $msgClass ="success";

                      
                      header("refresh:5; url=pattern.php");
                      exit;

                  }
                }else{

                  $msg = "You're already registered";
                $msgClass ="danger";
                }
          }else{
            $msg = "Phone must contain ten digits";
              $msgClass ="danger";
          }
        }else{
          $msg = "Enter valid email";
            $msgClass ="danger";
        }
      }else{
          $msg = "Please fill all fields";
          $msgClass ="danger";
      }
    }
  ?>
<div class="tablet">
  <div class="content">

    <!-- headings -->
    <div class="header">
      <div>
        <h1><span>FD</span> Graphical Password</h1>
      </div>
    </div>

    <!-- sub header -->
     <div class="subheader">
      <h2>Register</h2>
    </div>


    <p class="message">To signup, Please use the below form</p>
    
    <!-- register form -->
    <div class="form-container">
      <form method="POST" action="register.php">
        <p class="msg <?PHP echo $msgClass; ?>"><?PHP echo $msg; ?></p>
        <div>
          <label>Full Names: </label>
          <input type="text" name="name" value="<?php echo isset($_POST['name'])? $name : ''; ?>">
        </div>
        <div>
          <label>Email Address: </label>
          <input type="text" name="email" value="<?php echo isset($_POST['email'])? $email : ''; ?>">
        </div>
        <div>
          <label>Phone Number:</label>
          <input type="text" name="phone" value="<?php echo isset($_POST['phone'])? $phone : ''; ?>">
        </div>
        <div class="btn">
          <button type="submit" name="register">Register</button>
        </div>
        <p style="text-align: center;">I already have an accout? <a href="login.php">Login</a></p>
      </form>
    </div>
  </div>
</div>

</body>
</html>
