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
       
        <link href="css/edit.css" rel="stylesheet">
		<link href="cssForsee/registration.css" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
       
    </head>
    <body>
    

<div id="banner">
        <div id="slogan">
           
            <p>PETTEREST</p>
        </div>
        <div id="icons">
            <a href="../../../system/fonk.php?page=home" class="home" id="home1" title="Home"></a>
            <a href="#" class="home" id="home2"  title="My Profile"></a>
            <a href="#" class="home" id="home3" title="Comments"></a>
            <a href="../../../system/fonk.php?page=logout" class="home" id="home4" title="Log out"></a>
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
                <div id="profile-navbar">
                    <ul>
                        <li><a href="../../../system/fonk.php?page=myProfile">MY SHARINGS</a></li>
                        <li><a href="../../../system/fonk.php?page=aboutMe">ABOUT ME</a></li>
                        <li><a href="../../../system/fonk.php?page=myPets">MY PETS</a> </li>
                    </ul> 
                </div>
            
        </div>
        <div id="publishing-area">
        
		
		<?php 
			
			
			$anim=$_GET["animalID"];
			
			$id=$_SESSION["id"];
			$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
			$sql =$db->query("SELECT * FROM animals WHERE animalID=$anim");	
			$split="";
			$avatarNew="";
			while($r=$sql->fetch()){
			$split=explode('/',$r["aAvatar"]);
			$avatarNew=$split[4]."/".$split[5];
			
		?>
		<img src="<?php echo $_SESSION["animalAvatar"]=$avatarNew;?>" style="width:200px; height:200px; float:right; margin:150px 50px;border-radius:30px;border:2px solid #02254f">
        <!--UPDATING USER INFORMATION-->
                    <div class="regis">
                        <h1 style="margin-left:500px">UPDATE YOUR PET'S INFORMATION</h1>
                        <div class="form">
                            <!--If user pass this page, existing info about user will come-->
                            <div class="inputs">
                            <form method="POST" action="../../../system/fonk.php" enctype="multipart/form-data" autocomplete="on" >
                            <fieldset>
								 <label>Pet's Species:</label>
								<select name="petSpecies" style="margin-left:19px;height:25px;width:100px;border-radius:15px;text-indent:10px">
								<?php 
									if($r["aSpecies"]=="cat"){
								?>
								<option value="cat" selected>Cat</option>
								<option value="dog">Dog</option>
								<option value="bird">Bird</option>
								<?php
									}else if($r["aSpecies"]=="dog"){
								?>
								<option value="cat" >Cat</option>
								<option value="dog" selected>Dog</option>
								<option value="bird">Bird</option>
								<?php
								}else if($r["aSpecies"]=="bird"){
								?>
								<option value="cat">Cat</option>
								<option value="dog">Dog</option>
								<option value="bird" selected>Bird</option>
								
								<?php
								}
								?>
								</select> <br>
							<label>Vaccine:</label>
								<select name="vaccine"  style="margin-left:60px;height:25px;width:100px;border-radius:15px;text-indent:10px">
								<?php 
								if($r["vaccine"]=="yes"){
								?>
								<option value="yes" selected>Yes</option>
								<option value="no">No</option>
								<?php 
								}else if($r["vaccine"]=="no"){
								?>
								<option value="yes" >Yes</option>
								<option value="no" selected>No</option>
								
								<?php 
								}
								?>
								</select><br>
								<label>Gender:</label>
								<select name="gender"  style="margin-left:62px;height:25px;width:100px;border-radius:15px;text-indent:10px">
								<?php 
								if($r["gender"]=="male"){
								?>
								<option value="male" selected>Male</option>
								<option value="female">Female</option>
								<?php 
								}else if($r["gender"]=="female"){
								?>
								<option value="male">Male</option>
								<option value="female" selected>Female</option>
								<?php 
								}
								?>
								</select><br>
								<label>Purpose</label>
								<select name="sharePurpose" style="margin-left:65px;height:25px;width:100px;border-radius:15px;text-indent:10px">
								<?php 
								if($r["sharePurpose"]=="Just Add"){
								?>
								<option value="Just Add" selected>Just Add</option>
								<option value="mating">Mating</option>								
								<option value="ownership">Ownership</option>
								<?php 
								}else if($r["sharePurpose"]=="mating"){
								?>
								<option value="Just Add" >Just Add</option>
								<option value="mating" selected>Mating</option>								
								<option value="ownership">Ownership</option>
								<?php 
								}else if($r["sharePurpose"]=="ownership"){
								?>
								<option value="Just Add" >Just Add</option>
								<option value="mating" >Mating</option>								
								<option value="ownership" selected>Ownership</option>
								<?php 
								}
								?>
								</select><br><br>
                                <label>Name:</label><input type="text" name="aName" value="<?php echo $r["aName"];?>" autofocus required="required"><br><br>
                                <label>Animal Kind:</label><input type="text"  value="<?php echo $r["aKind"];?>" name="aKind"><br><br>
                                <label>Birth Date:</label><input type="date" value="<?php echo $r["birthDate"];?>" name="bDate"><br><br>
                                <label>Mom Kind:</label><input type="text" value="<?php echo $r["momKind"];?>" name="momKind"><br><br>
                                <label>Dad Kind:</label><input type="text" value="<?php echo $r["dadKind"];?>"name="dadKind"><br><br>                                
                                <label>Description:</label><textarea name="description" ><?php echo $r["information"];?> </textarea><br><br>
								<br>
								<input type="hidden" name="animalUpdate" value="animalUpdateFunc">
								<input type="hidden" name="animalID" value="<?php echo $anim;?>">
								<input type="hidden" name="animalFoto" value="<?php echo $r["aAvatar"];?>"><br><br><br>
								
								<label>Add Photo +</label><label> <input type="file" name="avatar" style="margin-top:-40px;margin-left:90px"><?php echo $avatarNew;?></label> <br><br><br><br>
                                <br><br><button type="submit" style="width:40%;float:left;margin-top:-30px;">Update/Make Your Pet Happy</button>
                                </fieldset>
                                </form>
								<a href="../../../system/fonk.php?page=deletePet&animalID=<?php echo $anim;?>" style="width:200px;
																		border-radius:7px;
																		border:none;
																		background: lightsteelblue;
																		color:white;
																		transition:0.3s;
																		line-height:35px;
																		text-align:center;
																		margin-top:-47px;
																		margin-left:220px;
																		display:block">Delete Your Pet</a>
                            </div>
                        </div>
                    </div>
        	<?php
			}
			
			
			?>
        </div>
        
		</div>
		
		
		
 
    </body>
</html>