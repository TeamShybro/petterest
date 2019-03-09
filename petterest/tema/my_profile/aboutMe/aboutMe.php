<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../profile-nav/css/main.css" rel="stylesheet">
        <link href="../profile-nav/css/reset.css" rel="stylesheet">
        <link href="css/about.css" rel="stylesheet">
    </head>
    <body>
        <!--BANNER-->
        <div id="banner">
                <div id="slogan">
                    <span>PETTEREST</span>
                </div>
                <div id="icons">
                    <a href="../../../system/fonk.php?page=home" class="home" id="home1" title="Home"></a>
                    <a href="#" class="home" id="home2"  title="My Profile"></a>
                    <a href="#" class="home" id="home3" title="Comments"></a>
                    <a href="../../../system/fonk.php?page=logout" class="home" id="home4" title="Log out"></a>
                </div>
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
								echo $avatarNewFoto=$splitFoto[0]."/".$splitFoto[0]."/".$splitFoto[2]."/".$splitFoto[3]."/".$splitFoto[4];
							?>
						"/>
                    </div>
                    <div id="name" style="text-transform:uppercase;"><?php echo $userFoto["name"]." ".$userFoto["surname"];?></div>
                        </div>
                        <!--NAVBAR-->
                        <div id="profile-navbar">
                            <ul>
                                <li><a href="../../../system/fonk.php?page=myProfile">MY SHARİNGS</a></li>
                                <li><a href="#">ABOUT ME</a></li>
                                <li><a href="../../../system/fonk.php?page=myPets">MY PETS</a></li>
                            </ul> 
                        </div>
                    </div>
                <div id="about">
                        <div class="out_pic">
                            <div class="in_pic">
                                <img style="width:350px;" src="<?php echo $avatarNewFoto=$splitFoto[0]."/".$splitFoto[0]."/".$splitFoto[2]."/".$splitFoto[3]."/".$splitFoto[4];?>"/>
                            </div>
                            <div class="out_userInfo">
                                <div class="in_userInfo">
                                        <p>Name: <?php echo $userFoto["name"]; ?></p>
                                        <p>Surname: <?php echo $userFoto["surname"]; ?></p>
                                        <p>Birth Date: <?php echo $userFoto["birthDate"]; ?></p>                                        
                                        <p>Password: <?php echo $userFoto["password"]; ?></p>
                                        <p>E mail: <?php echo $userFoto["e_mail"]; ?></p>                                        
                                        <p>Adress: <?php echo $userFoto["address"]; ?></p>
                                </div>
                            </div>
                            <div class="btn">
                                <a href="../../../system/fonk.php?page=updateProfile"><button type="submit">Update My Profile</button></a>
                            </div>
                        </div>
                </div>
        </div>
    </body>
</html>