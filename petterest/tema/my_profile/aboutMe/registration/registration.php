<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/registration.css" rel="stylesheet">
        <link href="../../profile-nav/css/reset.css" rel="stylesheet">
        <link href="../../profile-nav/css/main.css" rel="stylesheet">
    </head>
    <body>
        <!--BANNER-->
        <div id="banner">
                <div id="slogan">
                    <span>PETTEREST</span>
                </div>
                <div id="icons">
                    <a href="../../../../system/fonk.php?page=home" class="home" id="home1" title="Home"></a>
                    <a href="../../../../system/fonk.php?page=myProfile" class="home" id="home2"  title="My Profile"></a>
                    <a href="#" class="home" id="home3" title="Comments"></a>
                    <a href="../../../../system/fonk.php?page=logout" class="home" id="home4" title="Log out"></a>
                </div>
            </div>
                    <div class="wrapper">
                        <div class="profile-info">
                            <div class="picture-area-1">
                                <div id="pic_1">
                                    <img src="
							<?php 
								$id=$_SESSION["id"];
								$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");	
								$sqlForUser=$db->query("SELECT * FROM users WHERE userID=$id");
								$userFoto=$sqlForUser->fetch();
								$splitFoto="";
								$avatarNewFoto="";
								$splitFoto=explode('/',$userFoto["avatar"]);
								echo $avatarNewFoto=$splitFoto[0]."/".$splitFoto[0]."/".$splitFoto[0]."/".$splitFoto[2]."/".$splitFoto[3]."/".$splitFoto[4];
							?>
						"/>
                    </div>
                    <div id="name" style="text-transform:uppercase;"><?php echo $userFoto["name"]." ".$userFoto["surname"];?></div>
                        </div>
                        <!--NAVBAR-->
                        <div id="profile-navbar">
                            <ul>
                               <li><a href="../../../../system/fonk.php?page=myProfile">MY SHARİNGS</a></li>
                                <li><a href="../../../../system/fonk.php?page=aboutMe">ABOUT ME</a></li>
                                <li><a href="../../../../system/fonk.php?page=myPets">MY PETS</a></li>
                            </ul> 
                        </div>
                        </div>
                    </div>
                    <!--UPDATING USER INFORMATION-->
                    <div class="regis">
                        <h1>UPDATE YOUR INfORMATION</h1>
                        <div class="form">
                            <!--If user pass this page, existing info about user will come-->
                            <div class="inputs">
                            <form method="POST" action="../../../../system/fonk.php" enctype="multipart/form-data"  autocomplete="on">
                            <fieldset>
                                <label>Name:</label><input type="text" name="name" value="<?php echo $userFoto["name"];?>" autofocus required="required"><br><br>
                                <label>Surname:</label><input type="text" name="surname" value="<?php echo $userFoto["surname"];?>"  required="required"><br><br>
                                <label>E Mail:</label><input type="text" name="email" value="<?php echo $userFoto["e_mail"];?>" required="required"><br><br>
                                <label>Password:</label><input type="text" name="password" value="<?php echo $userFoto["password"];?>" required="required"><br><br>
                                <label>Gender:</label>
								<select name="gender" style="margin-left:65px;height:30px;border-radius:25px;text-indent:10px;width:100px">
								<?php
								if($userFoto["gender"]=="male"){
								?>
								<option value="male" selected>Male</option>
								<option value="female">Female</option>
								<?php 
								}else if($userFoto["gender"]=="female"){
								?>
								<option value="male">Male</option>
								<option value="female" selected>Female</option>
								<?php 
								}else if($userFoto["gender"]=="other"){
								?>
								<option value="male">Male</option>
								<option value="female" >Female</option>
								<option value="other" selected>Other</option>
								<?php 
								}
								?>
								</select><br><br>
                                <label>Birth Date:</label><input type="date" name="bDate" value="<?php echo $userFoto["birthDate"];?>" required="required"><br><br>                                
                                <label>Adress:</label><textarea name="adress" placeholder="Your Adress..."><?php echo $userFoto["address"];?></textarea><br><br>
								<input type="file" name="avatar"><?php echo $userFoto["avatar"];?> <br><br>
								
								<input type="hidden" name="userUpdate" value="userUpdateFunc">								
								<input type="hidden" name="userFoto" value="<?php echo $userFoto["avatar"];?>">
								<input type="hidden" name="userID" value="<?php echo $id;?>">
								
                                <br><br><button type="submit" style="width:150px">UPDATE PROFILE</button>
                                </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
    </body>
</html>