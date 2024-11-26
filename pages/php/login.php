<div class="desktop-1">
      <div class="backg">
        <video class= "video-bg" autoplay muted loop id="myVideo">
          <source src="../../resource/videos/morph.mp4" type="video/mp4">
        </video>
      </div>
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/login.css">
<div class="wrapper">
    <div class="title">
       - LOGIN -
    </div>

    <?php

session_start();


  include("connection.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $user_name =  $_POST['NAME'];
    $password = $_POST['PASS'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
      //read from database
      $query = "select * from users where username = '$user_name' limit 1 ";

      $result =  mysqli_query($con,$query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {
          $user_data = mysqli_fetch_assoc($result);

          if($user_data['password'] === $password)
          {
            $_SESSION['user_id'] = $user_data['user_id'];
            header("Location: home.php");
            die;
          }
        }
      }

          echo "<div style='position: relative; top: 46%; left: 23%; color: red; font-weight: bolder;'>wrong username or password!</div>";
    }else
    {
      echo "<div style='position: relative; top: 10%; left: 30%; color: red;'>Enter valid information!</div>";
    }
  }

?>


    <form method="POST">
       <div class="field">
          <input type="text" name="NAME" required>
          <label>Email Address</label>
       </div>
       <div class="field">
          <input type="password" name="PASS" required>
          <label>Password</label>
       </div>
       <div class="content">
          <div class="checkbox">
             <input type="checkbox" id="remember-me">
             <label for="remember-me">Remember me</label>
          </div>
          <div class="pass-link">
             <a href="#">Forgot password?</a>
          </div>
       </div>
       <div class="field">
          <input type="submit" value="SUBMIT">
       </div>
       <div class="signup-link">
          Not a member? <a href="signup.php">Signup now</a>
       </div>
    </form>
 </div>
