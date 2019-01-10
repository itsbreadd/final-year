<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Fixtures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/view.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	
</head>

<body>

<header>
		<a href="index.html"><img class="mainlogo" src="img/WritingLogo.png"></a>
</header>

<div class="title">
	<h1>View Fixtures</h1>
</div>

<div id="wrapper">
    <div class="overlay"></div>
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
		<ul class="nav sidebar-nav">
            <li class="sidebar-brand"><img class="logo" src="img/roundlogo.png" href="home.html"></li>
			<div class="nav">
				<li><a class="invisbutton"></a></li>
				<li><a href="index.html">Start Page</a></li>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="profile.html">My Profile</a></li>
                <li><a href="edit.html">Edit Fixtures</a></li>
                <li><a href="view.php">View Fixtures</a></li>
				<li><a href="help.html">Help</a></li>
			<div>
                <!-- FOR EXPANDED DROPDOWN <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Dropdown heading</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li> --> 
                <li><a href="https://twitter.com/iArcheRz">Follow Us</a></li>
        <div class="sociallinks">
			<a href="https://www.facebook.com"><img class="facebook" src="img/socials/facebook.png"></a>
			<a href="https://www.twitter.com/iarcherz"><img class="twitter" src="img/socials/twitter.png" href="home.html"></a>
			<a href="https://www.instagram.com"><img class="instagram" src="img/socials/instagram.png" href="home.html"></a>
			<a href="https://www.youtube.com"><img class="youtube" src="img/socials/youtube.png" href="home.html"></a>
		</div>
								<p class="copright">© 2018 Bradley Archer</p>
		</ul>
		
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
<div id="page-content-wrapper">
<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
    <span class="hamb-top"></span>
    <span class="hamb-middle"></span>
	<span class="hamb-bottom"></span>
</button>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="jumbotron jumbotron-sm">
					<div class="container">
					<!-- INSERT ALL PAGE CONTENT WITHIN THIS DIV -->
					</div>
				</div>                         
            </div>
        </div>
    </div>
</div>
        <!-- /#page-content-wrapper -->
</div>
    
	<!-- /#wrapper -->
<script type="text/javascript">
$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});
</script>

<div class="fullcontainer">

<table>
	<tr>
		<th>Team 1</th>
		<th>Team 2</th>
		<th>League</th>
		<th>Cup</th>
		<th>Group</th>
		<th>Type</th>
	</tr>

<?php
//connection to db
$conn = mysqli_connect('localhost','root','root','ff');
if ($conn-> connect_error) {
	die("Connection Failed:". $conn-> connect_error);
}

$sql = "SELECT team1, team2, league, cup, group1, type FROM fixtures";
$result = $conn-> query($sql);

if ($result-> num_rows > 0) {
	while($row = $result-> fetch_assoc()){
		echo "<tr><td>". $row["team1"] ."</td><td>" . $row["team2"] . "</td><td>" . $row["league"] . "</td><td>" . $row["cup"] . "</td><td>" . $row["group1"] . "</td><td>" . $row["type"] . "</td></tr>";
	}
	echo "</table>";
}
else {
	echo "0 results";
}

$conn-> close();
?>

<div>


</body>
</html>
