<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>FD Graphical Password</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<?php
    session_start();
    include 'includes/dbh.inc.php';
    $msg = "";
    $msgClass ="";

    if (isset($_POST['patternlock'])) {

      $app = mysqli_real_escape_string($conn, $_POST['app']);
      $password = mysqli_real_escape_string($conn, $_POST['pattern']);
      $user_id = $_SESSION['userid'];

      if (!empty($app) && !empty($password)) {
        if(strlen($password)>7){
          $sql ="SELECT * FROM pass_word WHERE userid ='$user_id' and app = '$app'";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck <=0) {
            $pwd_hash =password_hash($password, PASSWORD_DEFAULT);
            $sql ="INSERT INTO pass_word(userid,app, pwd) VALUES('$user_id','$app', '$pwd_hash')";
                $result = mysqli_query($conn, $sql);

                if ($result) {

                    $password = "";
                    $msg = "you are successfully registered";
                    $msgClass ="success";
                     header("refresh:5; url= login.php");
                     exit;

                }
          }
          else{
            $msg = "You have already registred this app";
              $msgClass ="danger";
          }
        }
        else{
          $msg = "Select atleast 4 fruits";
            $msgClass ="danger";
        } 
      }
      else{
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
        <h1><span>FD locker</span> Graphical Password</h1>
      </div>
    </div>

    <!-- sub header -->
     <div class="subheader">
      <h2>Pattern Lock</h2>
    </div>


    <p class="message">A pattern must consist of atleast 4 different fruits. A fruit can only be clicked once</p>
  
    <!-- register form -->
    <div class="form-container">
      <p class="msg <?PHP echo $msgClass; ?>"><?PHP echo $msg; ?></p>
      <form method="POST">     
               
          <div class="pattern-container">
            <label>Select App: </label>
            <div class="radio-inputs">
              <div>
                <input type="radio" name="app" value="calculator">
                <i class="fas fa-calculator fa-2x"></i>
              </div>
              <div>
                <input type="radio" name="app" value="youtube">
                <i class="fab fa-youtube fa-2x" ></i>
              </div>
              <div>
                <input type="radio" name="app" value="facebook">
                <i class="fab fa-facebook fa-2x"></i>
              </div>
              <div>
                <input type="radio" name="app" value="twitter">
                <i class="fab fa-twitter fa-2x" ></i>
              </div>
            </div>
            <label>Pattern: </label>
            <div class="pattern-box" id="pattern-box">

              <div id="01"><img src="img/channel1.png"></div>

              <div id="02"><img src="img/channel2.png"></div>

              <div id="03"><img src="img/channel3.jpg"></div>

              <div id="04"><img src="img/channel4.png"></div>

              <div id="05"><img src="img/channel5.jpg"></div>

              <div id="06"><img src="img/channel6.jpg"></div>

              <div id="07"><img src="img/channel7.jpg"></div>

              <div id="08"><img src="img/channel8.jpg"></div>

              <div id="09"><img src="img/channel9.jpg"></div>

              <div id="10"><img src="img/channel10.jpg"></div>

              <div id="11"><img src="img/channel11.png"></div >

              <div id="12"><img src="img/channel12.jpg"></div>

              <div id="13"><img src="img/pchannel13.png"></div>

              <div id="14"><img src="img/channel14.jpg"></div>

              <div id="15"><img src="img/channel15.png"></div>
            
              <div id="16"><img src="img/channel16.png"></div>
            </div>
          </div>
        <input type="password" name="pattern" id="pattern" hidden="">
        <div class="btn">
          <button type="submit" name="patternlock">PatternLock</button>
        </div>

      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
