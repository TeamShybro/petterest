<!Doctype html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="tema/css/mainstyle.css">
	
	<link rel="shortcut icon" href="images/icon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

function deselect(e) {
  $('.pop').slideFadeToggle(function() {
    e.removeClass('selected');
  });    
}
$(function() {
  $('#sign').on('click', function() {
    if($(this).hasClass('selected')) {
      deselect($(this));               
    } else {
      $(this).addClass('selected');
      $('.pop').slideFadeToggle();
    }
    return false;
  });

  $('.close').on('click', function() {
    deselect($('#sign'));
    return false;
  });
});

$.fn.slideFadeToggle = function(easing, callback) {
  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
};
</script>
	</head>
	<body>
		<!--First Screen-->
		<div id="firstscreen">
			<!--Navbar-->
			<div id="navbarr">
				<div id="logoside">
					<p>PETTEREST</p>
				</div>
				<div id="navbarright">
					<p>Already member?</p>
					<a href="#" id="sign">Sign in</a>
				</div>
			</div>
				<!--Content of Index -->
				<div id="contentindex">
					<div id="happypets"></div>
					<div id="formmm">
						 <form action="system/fonk.php" method="post" name="signUp" enctype="multipart/form-data">
							<h1>Sign Up</h1>
							<fieldset>
							  <label for="name">Name</label>
							  <input type="text" id="name" name="name" required>
							    <label for="name">Surname:</label>
							  <input type="text" id="surname" name="surname" required>
							  <label for="mail">Email:</label>
							  <input type="email" id="mail" name="user_email" required>
							  <label for="password">Password:</label>
							  <input type="password" id="password" name="user_password" required><br><br>
							  <input type="radio" name="gender" value="male" checked> Male
							  <input type="radio" name="gender" value="female"> Female
							  <input type="radio" name="gender" value="other"> Other<br><br>
							  <label>Birth date:</label>
							  <input type="date" name="bday">
							  <input type="hidden" name="decisionSignUp" value="signUp">
							</fieldset>

							<input type="submit" value="Sign Up" class="button">
						</form>
					</div>
                    <div class="messagepop pop">
    <form method="post" id="signInPopup" action="system/fonk.php">
    	<fieldset>
        <label for="name">Email:</label>
		<input type="text" id="user_name" name="email" required>
        <label for="name">Password:</label>
		<input type="password" id="password" name="password" required>
        <input type="checkbox" id="remember" name="remember">
		<input type="hidden" name="decisionLogin" value="loginFunc">		
        <span>Remember me</span><br>
        <button type="submit" class="button2" >Sign In</button> or <a class="close" id="close" href="#">Cancel</a>
        </fieldset>
    </form>
    <div id="forgottendiv">
    	<a href="#">Forgotten password</a>
    </div>
				</div>
				
				</div>
		</div>	
       <div class="introduction">
				<h1>petterest</h1>
				<div class="photos">
					<img src="tema/images/intro7.jpg" alt="patlıcan"/>
					<img src="tema/images/intro4.png" alt="patlıcan"/>
					<img src="tema/images/intro1.png" alt="patlıcan"/>
					<img src="tema/images/intro2.png" alt="patlıcan"/>
				</div>
				<div class="defIntro">
					We always want to make sure our pets are as happy and healthy as they could be, but we sometimes get stuck thinking we’re doing everything we can do. There are always new ways to spice up your pet’s life and some owners might not even be covering the basics. Here you’ll find easy ways to make your pets happier.
				</div>
				<div class="photos">
					<img src="tema/images/vancat.jpg" alt="patlıcan"/>
					<img src="tema/images/intro3.png" alt="patlıcan"/>
					<img src="tema/images/intro8.jpg" alt="patlıcan"/>
					<img src="tema/images/intro10.png" alt="patlıcan"/>
				</div>
				<footer>
					<strong>©Copyright 2017</strong> This platform was created by SHYBRO TEAM
				</footer>
				
			</div>
        <script> 
$(document).ready(function(){
 $("#sign").click(function(){
$("#formmm").slideToggle("slow");
 });
});
$(document).ready(function(){
 $("#close").click(function(){
$("#formmm").slideToggle("slow");
 });
});
</script>
	</body>
</html>
