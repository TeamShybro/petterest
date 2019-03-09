<?php 
session_start();
    if(!isset($_SESSION["login"])){
        echo ' <script type="text/javascript">
						alert("You cannot enter this website without login !");
					</script>';
		header('refresh:0; url="../index.php"');

    }else{
        $userEnterID=$_SESSION["id"];        
        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Petterest</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/reset.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/accordion.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script>
		/*YASOUR browser:true, undef: true, unused: true, jquery: true */
                var $container;
                var filters = {};
                $(function(){
                $container = $('#container');
                createContent();
                var $filterDisplay = $('#filter-display');
                $container.isotope();
                // do stuff when checkbox change
                $('#options').on( 'change', function( jQEvent ) {
                    var $checkbox = $( jQEvent.target );
                    manageCheckbox( $checkbox );
                    var comboFilter = getComboFilter( filters );
                    $container.isotope({ filter: comboFilter });
                    $filterDisplay.text( comboFilter );
                });
                });
                var data = {
                brands: 'brand1 brand2 brand3 brand4'.split(' '),
                productTypes: 'type1 type2 type3 type4'.split(' '),
                colors: 'red blue yellow green'.split(' '),
                sizes: 'uk-size8 uk-size9 uk-size10 uk-size11'.split(' ')
                };
                function createContent() {
                var brand, productType, color, size;
                var items = '';
                // dynamically create content
                for (var i=0, len1 = data.brands.length; i < len1; i++) {
                    brand = data.brands[i];
                    for (var j=0, len2 = data.productTypes.length; j < len2; j++) {
                    productType = data.productTypes[j];
                        for (var l=0, len3 = data.colors.length; l < len3; l++) {
                        color = data.colors[l];
                        for (var k=0, len4 = data.sizes.length; k < len4; k++) {
                        size = data.sizes[k];
                        var itemHtml = '<div class="item ' + brand + ' ' +
                            productType + ' ' + color + ' ' + size + '">' +
                            '<p>' + brand + '</p>' +
                            '<p>' + productType + '</p>' +
                            '<p>' + size + '</p>' +
                            '</div>';
                            items += itemHtml;
                        }
                    }
                    }
                }
                }
                function getComboFilter( filters ) {
                var i = 0;
                var comboFilters = [];
                var message = [];
                for ( var prop in filters ) {
                    message.push( filters[ prop ].join(' ') );
                    var filterGroup = filters[ prop ];
                    // skip to next filter group if it doesn't have any values
                    if ( !filterGroup.length ) {
                    continue;
                    }
                    if ( i === 0 ) {
                    // copy to new array
                    comboFilters = filterGroup.slice(0);
                    } else {
                    var filterSelectors = [];
                    // copy to fresh array
                    var groupCombo = comboFilters.slice(0); // [ A, B ]
                    // merge filter Groups  
                    for (var k=0, len3 = filterGroup.length; k < len3; k++) {
                        for (var j=0, len2 = groupCombo.length; j < len2; j++) {
                        filterSelectors.push( groupCombo[j] + filterGroup[k] ); // [ 1, 2 ]
                        }
                    }
                    // apply filter selectors to combo filters for next group
                    comboFilters = filterSelectors;
                    }
                    i++;
                }
                var comboFilter = comboFilters.join(', ');
                return comboFilter;
                }
                function manageCheckbox( $checkbox ) {
                var checkbox = $checkbox[0];
                var group = $checkbox.parents('.option-set').attr('data-group');
                // create array for filter group, if not there yet
                var filterGroup = filters[ group ];
                if ( !filterGroup ) {
                    filterGroup = filters[ group ] = [];
                }
                var isAll = $checkbox.hasClass('all');
                // reset filter group if the all box was checked
                if ( isAll ) {
                    delete filters[ group ];
                    if ( !checkbox.checked ) {
                    checkbox.checked = 'checked';
                    }
                }
                // index of
                var index = $.inArray( checkbox.value, filterGroup );

                if ( checkbox.checked ) {
                    var selector = isAll ? 'input' : 'input.all';
                    $checkbox.siblings( selector ).removeAttr('checked');
                    if ( !isAll && index === -1 ) {
                    // add filter to group
                    filters[ group ].push( checkbox.value );
                    }
                } else if ( !isAll ) {
                    // remove filter from group
                    filters[ group ].splice( index, 1 );
                    // if unchecked the last box, check the all
                    if ( !$checkbox.siblings('[checked]').length ) {
                    $checkbox.siblings('input.all').attr('checked', 'checked');
                    }
                }
                }
    </script>
    </head>
<body>
    <!--BANNER-->
    <div id="banner">
        <div id="slogan">
            <span>PETTEREST</span>
        </div>
        <div id="icons">
            <a href="#" class="home" id="home1" title="Home"></a>
            <a href="../system/fonk.php?page=myProfile" class="home" id="home2"  title="My Profile"></a>
            <a href="#" class="home" id="home3" title="Comments"></a>
            <a href="../system/fonk.php?page=logout" class="home" id="home4" title="Log out"></a>
        </div>
    </div>
    <!--ENF OF THE BANNER-->
    <!--MAIN CONTENT-->
    <div class="wrapper">
        <!--SORTING AS FEATURES OF ANIMALS--> 
        <div class="left_side">
        	<div id="options">
				<button class="accordion"><img src="images/pet-icon.png" alt="Pets Kind" width="15px" height="15px"> Purpose</button>
					<div class="panel option-set"  data-group="brand">
						<div class="panelinput"><input type="checkbox" name="kind" value=".brand1" id="brand1">Mating</div><br>
						<div class="panelinput"><input type="checkbox" name="kind" value=".brand2" id="brand2">Ownership</div><br>	
					</div>
					<button class="accordion"><img src="images/pet-icon.png" alt="Pets Kind" width="15px" height="15px"> Pet's kind</button>
					<div class="panel option-set"  data-group="type">
						<div class="panelinput"><input type="checkbox" name="species" value=".type1" id="type1">Dog</div><br>
						<div class="panelinput"><input type="checkbox" name="species" value=".type2" id="type2">Cat</div><br>
						<div class="panelinput"><input type="checkbox" name="species" value=".type3" id="type3">Bird</div><br>	
					</div>
					<button class="accordion"><img src="images/gender.png" alt="Pets Kind" width="15px" height="15px"> Gender</button>
					<div class="panel option-set"  data-group="color">
						<div class="panelinput"><input type="checkbox" name="gender" value=".red" id="red">Female</div><br>
						<div class="panelinput"><input type="checkbox" name="gender" value=".blue" id="blue">Male</div><br>	
					</div>
			</div>
        </div>
        <div class="middle3">
            <!--NAVBAR OF THE MIDDLE AREA-->
            <nav>
                <ul id="menu">
                    <li id="home"><a href="#" id="m1"><img src="images/pati.png">ALL</a></li>
                    <li id="about" ><a href="#" id="m2"><img src="images/dog.png">DOGS</a></li>
                    <li id="contact" ><a href="#" id="m3" ><img src="images/cat.png" >CATS</a></li>
                    <li id="album"><a href="#" id="m4"><img src="images/bird.png" >BIRDS</a></li>
                </ul>
            </nav>
            <!--SHARINGS ABOUT ANIMALS-->
            <div id="container">
			<?php 
			//Mating Purpose
						$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
						$sql =$db->query("SELECT * FROM animals WHERE sharePurpose='mating' ORDER BY addDate DESC");					
						
						$split="";
						$avatarNew="";
						while($r=$sql->fetch()){
						$split=explode('/',$r["aAvatar"]);
						$avatarNew=$split[3]."/".$split[4]."/".$split[5];
			
			?>
			  <div class="post item brand1 <?php if($r["aSpecies"]=="dog"){echo "type1";}else if($r["aSpecies"]=="cat"){echo "type2";}else if($r["aSpecies"]=="bird"){echo "type3";}  ?> <?php if($r["gender"]=="female"){echo "red";}else if($r["gender"]=="male"){echo "blue";}  ?>">
					<div class="pictu" style="background-image:url(<?php echo $r["aAvatar"];?>); ">
					
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
									$userWho="";
									$userWho=$r["userID"];
									$sqlForUser=$db->query("SELECT * FROM users WHERE userID=$userWho");
									$userFoto=$sqlForUser->fetch();									
									$avatarNewFoto="";									
									echo $avatarNewFoto=$userFoto["avatar"];
									
									?>" style="border-radius:50%"/>
							</div>
						</div>
						<div class="user"><a href="post.php?animalID=<?php echo $r["animalID"];?>" ><img id="openup1" src="images/more.png"/></a></div>
					</div>
				</div>
				
			<?php 
			}
			//OwnerShip
			
						$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
						$sql =$db->query("SELECT * FROM animals WHERE sharePurpose='ownership' ORDER BY addDate DESC");					
						
						$split="";
						$avatarNew="";
						while($r=$sql->fetch()){
						$split=explode('/',$r["aAvatar"]);
						$avatarNew=$split[3]."/".$split[4]."/".$split[5];
			?>              
                <div class="famalepost item brand2 <?php if($r["aSpecies"]=="dog"){echo "type1";}else if($r["aSpecies"]=="cat"){echo "type2";}else if($r["aSpecies"]=="bird"){echo "type3";}  ?> <?php if($r["gender"]=="female"){echo "red";}else if($r["gender"]=="male"){echo "blue";}  ?>">
                    <div class="famalepictu" style="background-image: url(<?php echo $r["aAvatar"];?>);">
                        <div class="famaleinfo">
                            <div class="famaleabout">ownership</div>
                        </div>
                    </div>
                    <div class="famaledetail">
                        <div class="famaledetailAnimal">
                            <div class="famaleinfoAnimal">
                                <p>Gender: <?php echo $r["gender"]?></p>
                                    <p>Kind:<?php echo $r["aKind"]?></p>
                                    <p>Birth Date:<?php echo $r["birthDate"]?></p>                       
                            </div>
                            <div class="famalemore">
                                <img src="<?php 
									$userWho="";
									$userWho=$r["userID"];
									$sqlForUser=$db->query("SELECT * FROM users WHERE userID=$userWho");
									$userFoto=$sqlForUser->fetch();									
									$avatarNewFoto="";									
									echo $avatarNewFoto=$userFoto["avatar"];
									
									?>" style="border-radius:50%"/>
                            </div>
                        </div>
                        <div class="famaleuser"><a href="post.php?animalID=<?php echo $r["animalID"];?>" ><img id="openup1" src="images/more.png"/></a></div>
                    </div>
                </div>
			<?php 
			}
			?>
        </div>
		</div>
        <!--NEW COMERS-->
        <div class="right_side">
		<?php 
						$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
						$sql =$db->query("SELECT * FROM animals ORDER BY addDate DESC LIMIT 9");					
						
						$split="";
						$avatarNew="";
						while($r=$sql->fetch()){
						$split=explode('/',$r["aAvatar"]);
						$avatarNew=$split[2]."/".$split[3]."/".$split[4]."/".$split[5];
		
		?>
            <div class="newanimald" style="background-image: url(<?php echo $avatarNew;?>);">      
				<div class="newnameAnimald" style="font-size:12px; font-family: Verdana, Geneva, Tahoma, sans-serif;"><a href="post.php?animalID=<?php echo $r["animalID"];?>" style="color:white;" ><?php echo $r["aName"];?></a></div> 
			</div>
        <?php
		}
		?>
        
        </div>
        
	</div>	
	<div id="fade" class="black_overlay"></div>
	<script>
                var acc = document.getElementsByClassName("accordion");
                var i;
                    for (i = 0; i < acc.length; i++) {
                    acc[i].onclick = function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight){
                        panel.style.maxHeight = null;
                        } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                        } 
                    }
                    }
                $(document).ready(function(){
            $("#closeprofile").click(function(){
                $("#post1").hide();
            });
            $(".goprofile").click(function(){
                $("#post1").show();
            });
        });
                $(document).ready(function(){
            $("#closeprofile").click(function(){
                $("#fade").hide();
            });
            $(".goprofile").click(function(){
                $("#fade").show();
            });
        });
	</script>	
</body>
</html>
<?php 
    }
?>