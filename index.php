<?php
session_start();
?>

<!DOCTYPE HTML>
  <html lang="en">

<head>
  <title>Welcome!</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/styles.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!--RESIZES CONTENT FOR MOBILE-->
</head>


<body>
  <header>
    <div class="contact-button">
      <a href="contact.html"><button type="button">Contact</button></a>
    </div> <!-- not the issue-->
  <header>

<div class="background-container">

<div class="main-content-flex">
  <div class="main-content-container">
    <div class="main-image-flex">
      <a href="homepage.html"><img href="homepage.html" src="img/WritingLogo.png" alt="FF Logo"></a>
    </div>

    <div class="heading">
    		<h1>Create Your Team Now!</h1>
    </div>

    <div class="login-text">
        <h2>Please Login Below</h2>
    </div>

    <div class="login-flex">
      <form action="action/login-action.php" method="POST" class="login">
        <label><b>Username:</b></label>
        <input type="text" placeholder="Username/ Email" name="uname" required>

        <label><b>Password:</b></label>
        <input type="password" placeholder="Enter Password" name="pword" required>

        <div class="submit-container">
          <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
        	<button type="submit" name ="submit">Login</button>
        </div>

        <div class="message">
          <p>Forgot Password? <a href="contact.html">Contact Us</a></p>
        </div>


      </form>


    </div>

    <div class="copyright">
      <p>© <?php echo date('Y'); ?> Bradley Archer</p>
    </div>
  </div>
</div>








</div>
<script src="scripts.js"></script>
</body>
</html>
