<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="profile-nav/css/main.css" rel="stylesheet">
        <link href="profile-nav/css/reset.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <!--BANNER-->
        <div id="banner">
                <div id="slogan">
                    <span>PETTEREST</span>
                </div>
                <div id="icons">
                    <a href="../../system/fonk.php?page=home" class="home" id="home1" title="Home"></a>
                    <a href="#" class="home" id="home2"  title="My Profile"></a>
                    <a href="#" class="home" id="home3" title="Comments"></a>
                    <a href="../../system/fonk.php?page=logout" class="home" id="home4" title="Log out"></a>
                </div>
        </div>
        <!--WRAPPER-->
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
								echo $avatarNewFoto=$splitFoto[0]."/".$splitFoto[2]."/".$splitFoto[3]."/".$splitFoto[4];
							?>
						"/>
                    </div>
                    <div id="name" style="text-transform:uppercase;"><?php echo $userFoto["name"]." ".$userFoto["surname"];?></div>
                </div>
                <!--NAVBAR OF PROFILE PAGE-->
                <div id="profile-navbar">
                    <ul>
                        <li><a href="#">MY SHARİNGS</a></li>
                        <li><a href="../../system/fonk.php?page=aboutMe" target="_parent">ABOUT ME</a></li>
                        <li><a href="../../system/fonk.php?page=myPets">MY PETS</a> </li>
                    </ul> 
                </div>
             </div>
            <div class="out">
                <div class="posit">
				<!-- Mating POST!-->
					<?php 
						$id=$_SESSION["id"];
						$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
						$sql =$db->query("SELECT * FROM animals WHERE userID=$id AND sharePurpose='mating'");	
						
						
						$split="";
						$avatarNew="";
						while($r=$sql->fetch()){
						$split=explode('/',$r["aAvatar"]);
						$avatarNew=$split[3]."/".$split[4]."/".$split[5];
					?>
                    <div class="post">
                        <div class="pictu" style="background-image: url(<?php echo $avatarNew;?>);">
                            <div class="info">
                                <div class="about">Mating</div>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detailAnimal">
                                <div class="infoAnimal">
                                    <p>Gender: <?php echo $r["gender"]?></p>
                                    <p>Kind:<?php echo $r["aKind"]?></p>
                                    <p>Birth Date:<?php echo $r["birthDate"]?></p>                        
                                </div>
                                <div class="more">
                                    <img src="<?php 
									$sqlForUser=$db->query("SELECT * FROM users WHERE userID=$id");
									$userFoto=$sqlForUser->fetch();
									$splitFoto="";
									$avatarNewFoto="";
									$splitFoto=explode('/',$userFoto["avatar"]);
									echo $avatarNewFoto=$splitFoto[0]."/".$splitFoto[2]."/".$splitFoto[3]."/".$splitFoto[4];
									
									?>"/>
                                </div>
                            </div>
                            <div class="user"><a href="my_pets/seePets.php?animalID=<?php echo $r["animalID"];?>"><img src="images/more.png"/></a></div>
                        </div>
                    </div>
					<?php
					}
					
					//OwnerShip 
					
						$id=$_SESSION["id"];
						$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
						$sql =$db->query("SELECT * FROM animals WHERE userID=$id AND sharePurpose='ownership'");	
						
						
						$split="";
						$avatarNew="";
						while($r=$sql->fetch()){
						$split=explode('/',$r["aAvatar"]);
						$avatarNew=$split[3]."/".$split[4]."/".$split[5];
					
					?>
					
					
                    <div class="famalepost">
                        <div class="famalepictu" style="background-image: url(<?php echo $avatarNew;?>);">
                            <div class="famaleinfo">
                                <div class="famaleabout">Ownership</div>
                            </div>
                        </div>
                        <div class="famaledetail">
                            <div class="famaledetailAnimal">
                                <div class="famaleinfoAnimal">
                                    <p>Gender: <?php echo $r["gender"];?></p>
                                    <p>Kind:<?php echo $r["aKind"];?></p>
                                    <p>Birth Date:<?php echo $r["birthDate"];?></p>                        
                                </div>
                                <div class="famalemore">
                                     <img src="<?php 
									$sqlForUser=$db->query("SELECT * FROM users WHERE userID=$id");
									$userFoto=$sqlForUser->fetch();
									$splitFoto="";
									$avatarNewFoto="";
									$splitFoto=explode('/',$userFoto["avatar"]);
									echo $avatarNewFoto=$splitFoto[0]."/".$splitFoto[2]."/".$splitFoto[3]."/".$splitFoto[4];
									
									?>"/>
                                </div>
                            </div>
                            <div class="famaleuser"><a href="my_pets/seePets.php?animalID=<?php echo $r["animalID"];?>"><img src="images/more.png"/></a></div>
                        </div>
                    </div>
					<?php 
					}
					?>
                </div>
            </div>
        </div>
    </body>
</html>