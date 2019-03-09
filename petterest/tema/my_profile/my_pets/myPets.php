<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/my_pets.css" rel="stylesheet">
        <link href="../profile-nav/css/main.css" rel="stylesheet">
        <link href="css/addAnimal.css" rel="stylesheet">
        <link href="css/edit.css" rel="stylesheet">
        
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
							?>"/>
                    </div>
                    <div id="name" style="text-transform:uppercase;"><?php echo $userFoto["name"]." ".$userFoto["surname"];?></div>
                </div>
                <div id="profile-navbar">
                    <ul>
                        <li><a href="../../../system/fonk.php?page=myProfile">MY SHARİNGS</a></li>
                        <li><a href="../../../system/fonk.php?page=aboutMe">ABOUT ME</a></li>
                        <li><a href="#">MY PETS</a> </li>
                    </ul> 
                </div>
            
        </div>
        <div id="publishing-area">
             <div class="out">
			 
			 <?php 
			 //MALE SORTİNG
			$id=$_SESSION["id"];
			$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
			$sql =$db->query("SELECT * FROM animals WHERE userID=$id AND gender='male'");	
			$split="";
			$avatarNew="";
			while($r=$sql->fetch()){
			$split=explode('/',$r["aAvatar"]);
			$avatarNew=$split[4]."/".$split[5];
			
		
			 ?>
                 <div class="animal" style="background-image: url(<?php echo $avatarNew;?>); width:175px; height:200px;">
					<div id="pati">
					<img src="images/pati.png" alt="animal1" title="animal1"/>
					</div>
				   <div class="nameAnimal" style="text-align:center;padding-left:0px"><a href="seePets.php?animalID=<?php echo $r["animalID"];?>" style="color:white;text-transform:uppercase;"><?php echo $r["aName"];?><a/></div> 
				</div>
			<?php 
			}
			//FEMALE SORTİNNG
			$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
			$sql =$db->query("SELECT * FROM animals WHERE userID=$id AND gender='female'");	
			$split="";
			$avatarNew="";
			while($r=$sql->fetch()){
			$split=explode('/',$r["aAvatar"]);
			$avatarNew=$split[4]."/".$split[5];
			?>
        <div class="animald" style="background-image: url(<?php echo $avatarNew;?>); width:175px; height:200px;">
           <div id="patid">
               <img src="images/pati.png" alt="animal1" title="animal1"/>
           </div>
           <div class="nameAnimald" style="text-align:center;padding-left:0px"><a href="seePets.php?animalID=<?php echo $r["animalID"];?>" style="color:white;text-transform:uppercase;"><?php echo $r["aName"];?><a/></div> 
        </div>
		<?php
		}
		?>
        
        <div class="animalAdd">
          <img src="images/add.png" class="addAnimal">
        </div>
             </div>
             <div class="messagepop pop">
            <form method="post" id="registration" enctype="multipart/form-data" action="../../../system/fonk.php">  
                <fieldset>
                <label>Pet's Species:</label>
                    <select name="petSpecies">
                    <option value="cat" selected>Cat</option>
                    <option value="dog">Dog</option>
                    <option value="bird">Bird</option>
                    </select> <br>
                <label>Vaccine:</label>
                    <select name="vaccine">
                    <option value="yes" selected>Yes</option>
                    <option value="no">No</option>
                    </select><br>
                <label>Gender:</label>
                    <select name="gender">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                    </select><br>
                <label>Pet's name:</label>
                    <input type="text" name="petName" placeholder="Enter your pet's name"/><br>
                <label>Pet's Kind:</label>
                    <input type="text" name="petKind" placeholder="Enter your pet's kind"/><br>
                <label>Birth date:</label>
                    <input type="date" name="bdate"/><br>
                <label>Pet's Dad's kind:</label>
                    <input type="text" name="momKind" placeholder="Enter your pet's mom kind"/><br>
                <label>Pet's Mom's kind:</label>
                    <input type="text" name="dadKind" placeholder="Enter your pet's dad kind"/><br>
                <span>Add Photo +</span> <input type="file" name="avatar"> <br><br><br><br>
                <label>Description:</label>
                    <textarea name="description">Describe your pet...</textarea><br>
				<input type="hidden" name="accountID" value="<?php echo $_SESSION["id"];?>">
				<input type="hidden" name="addAnimal" value="addAnimalFunc">
                <button type="submit" name="send">Add pet</button>
                
                </fieldset>
            </form>
			<button name="exit" id="exit">Exit</button>
			
        </div>
		
		<?php 
			
			if($_GET){
			$anim=$_GET["animalID"];
			
			$id=$_SESSION["id"];
			$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
			$sql =$db->query("SELECT * FROM animals WHERE userID=$id AND animalID=$anim");	
			$split="";
			$avatarNew="";
			while($r=$sql->fetch()){
			$split=explode('/',$r["aAvatar"]);
			$avatarNew=$split[4]."/".$split[5];
			
		?>
        <div class="post">
            <div class="pictu">
               <img src="<?php echo $avatarNew;?>" style="width:100%;height:250px;">
                <div class="info">
                    <div class="about"></div>
                </div>
            </div>
            <div class="detail">
                <div class="detailAnimal">
                    
                </div>
                <div class="user"><img src="../../images/close.png"/></div> 
            </div>
            <div class="description">
            	<p>Name: <?php echo $r["aName"];?></p>  
                <p>Gender: <?php echo $r["gender"];?></p>
                <p>Kind:<?php echo $r["aKind"];?></p>
                <p>Age:<?php echo $r["birthDate"];?></p>
                <p>Dad's Race:</p>    
                <p>Mom's Race:Terrier</p>
                <p>Vaccination: yes</p>
                <p>Purpose: Mating</p>
                <p>Description: She loves playing with carpets.bla bla bla
                She loves playing with carpets.bla bla blaShe loves playing with carpets.bla bla blaShe loves playing with carpets.bla bla blaShe loves playing with carpets.bla bla blaShe loves playing with carpets.bla bla blaShe loves playing with carpets.bla bla blaShe loves playing with carpets.bla bla bla</p>
                
                 
            </div>
            <button id="edit" type="submit" name="edit">Edit Informations</button>
            <button id="sharen" type="submit" name="sharen">Make your pet</button>
            <div id="extra">
        		<form method="post" id="registration" action="#">  
                <fieldset>
                <label>Purpose</label>
                    <select>
                    <option value="mating" selected>Mating</option>
                    <option value="ownership">Ownership</option>
                    </select> <br>
                <label>Description:</label>
                    <textarea name="purposedescription">Enter your description...</textarea><br>
                <button type="submit" name="share" id="share">Share</button>
                <button id="cancel1">Cancel</button>
                </fieldset>
            </form>
        	</div>
        </div>
        	<?php
			}
			}
			
			?>
        </div>
        <div id="fade" class="black_overlay"></div>
		</div>
		
		
		
		
   <script>

function deselect(e) {
  $('.pop').slideFadeToggle(function() {
    e.removeClass('selected');
  });    
}

$(function() {
  $('.addAnimal').on('click', function() {
    if($(this).hasClass('selected')) {
      deselect($(this));               
    } else {
      $(this).addClass('selected');
      $('.pop').slideFadeToggle();
    }
    return false;
  });

  $('.close').on('click', function() {
    deselect($('.addAnimal'));
    return false;
  });
});

$.fn.slideFadeToggle = function(easing, callback) {
  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
};

</script>
   <script>
$(document).ready(function(){
    $("#exit").click(function(){
        $("#fade").hide();
    });
    $(".addAnimal").click(function(){
        $("#fade").show();
    });
});
</script>
   <script>
$(document).ready(function(){
    $(".user").click(function(){
        $(".post").hide();
    });
    $(".nameAnimal").click(function(){
        $(".post").show();
    });
});
		
});
</script>
   <script>
		$(document).ready(function(){
    $("#edit").click(function(){
        $(".post").hide();
    });
    $("#edit").click(function(){
        $(".pop").show();
    });
});
$(document).ready(function(){
    $("#exit").click(function(){
        $(".pop").hide();
    });
    
});
	
$(document).ready(function(){
    $("#sharen").click(function(){
        $("#extra").slideToggle("slow");
    });
});
</script>
    </body>
</html>