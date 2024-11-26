<div class="desktop-1">
    <div class="backg">
        <video class= "video-bg" autoplay muted loop id="myVideo">
          <source src="../../resource/videos/morph.mp4" type="video/mp4">
        </video>
      </div>
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/signup.css">
<div class="wrapper">
    <div class="title">
       - SIGNUP -
    </div>
    <?php
session_start();

  include("connection.php");


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $user_name =  $_POST['EMAIL'];
    $password = $_POST['PASS'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
      $query = "SELECT * FROM users WHERE username = '$user_name'";
      $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {
      echo " <div style='position: relative; top: 28%; left: 25.5%; color: red;'>Username is already exists! </div>";

    }
    else
    {

      $query = "insert into users values ('$user_name','$password')";

      mysqli_query($con,$query);
      header("Location: home.php");
      die;
    }
  }
    else
    {
      echo "<div style='position: relative; top: 10%; left: 30%; color: red;'> Enter some valid information! </div>";
    }
  }
?>
    <form method="POST">
       <div class="field">
          <input type="text" name="EMAIL" required>
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
       </div>
       <div class="field">
          <input type="submit" value="SUBMIT">
       </div>
       <div class="signup-link">
          Already have an account? <a href="login.php"> Log in</a>
       </div>
    </form>
 </div>
  <input type = "submit" name = "SINGUP" class="btn" ><br><br><br>
  <a href = "login.php" style="font-size: 200%;  padding-left: 50%;">Login</a>
  </div>
 </body>
</html>