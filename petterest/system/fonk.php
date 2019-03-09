<?php 
ob_start();
session_start();
		if($_POST) {

			
			try {
				if(@$_POST['decisionSignUp'] == "signUp") {				
					signUp();
				}
				else if (@$_POST['decisionLogin'] == "loginFunc") {
					login();
				}else if (@$_POST['addAnimal'] == "addAnimalFunc") {
					addAnimalFunc();
				}else if (@$_POST['forgetPass'] == "forgetFunc") {
					forgetPassword();
				}
				else if (@$_POST['animalUpdate'] == "animalUpdateFunc") {
					animalUpdate();
				}
				else if (@$_POST['userUpdate'] == "userUpdateFunc") {
					userUpdateFunc();
				}else if (@$_POST['makeComment'] == "makeCommentFunc") {
					makeCommentFunc();
				}
				
				
				
			}
			catch (Exception $e) {
				echo $e.getMessage();
			}
		}else if($_GET){
			if(@$_GET['page'] == "logout") {				
				logout();				
			}else if (@$_GET['page']=="forget") {
				 include("../tema/forget.php");
			}else if (@$_GET['page']=="myProfile") {
				 header("Location: ../tema/my_profile/index.php");
			}else if (@$_GET['page']=="home") {				 
				 header("Location: ../tema/main.php");
			}else if (@$_GET['page']=="aboutMe") {				 
				  header("Location: ../tema/my_profile/aboutMe/aboutMe.php");
			}else if (@$_GET['page']=="myPets") {				
				 header("Location: ../tema/my_profile/my_pets/myPets.php");
			}else if (@$_GET['page']=="updateProfile") {				
				 header("Location: ../tema/my_profile/aboutMe/registration/registration.php");
				 
			}else if (@$_GET['page']=="deletePet") {				
				 deleteFunc();
				 
			}else if (@$_GET['page']=="deleteComment") {				
				 deleteComment();
				 
			}
			


		}
function deleteComment(){
				$commentID=$_GET["commentID"];
				$animalID=$_GET["animalID"];
				$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
				$deleteComment="DELETE FROM comments WHERE commentID=?";
				$query=$db->prepare($deleteComment);
				$query->execute(array($commentID));
				if(count($query)){
					
			header('refresh:0; url="../tema/post.php?animalID='.$animalID.'"');

				}else{
					echo '<script type="text/javascript">
							alert("You did not DELETE your comment Successfully");
						</script>';
					header('refresh:0; url="../tema/post.php?animalID='.$animalID.'"');
				}
}
		
function makeCommentFunc(){
	$userID=$_POST["userID"];
	$animalID=$_POST["animalID"];
	$comment=$_POST["comment"];
	$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");
	$com="INSERT INTO comments (comment,animalID,userID,addDate) VALUES (?,?,?,Now())";
		$query=$db->prepare($com);
		$query->execute(array($comment,$animalID,$userID));
		if(count($query)){
			
			header('refresh:0; url="../tema/post.php?animalID='.$animalID.'"');

		}else{
			echo '<script type="text/javascript">
					alert("You did not comment Successfully");
				</script>';
			header('refresh:0; url="../tema/main.php"');
		}
}		
		
function deleteFunc(){
	echo $anim=$_GET["animalID"];
	
	
				$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
				$updateAnimal="DELETE FROM animals WHERE animalID=?";
				$query=$db->prepare($updateAnimal);
				$query->execute(array($anim));
				if(count($query)){
					
					header('refresh:0; url="../tema/my_profile/my_pets/myPets.php"');

				}else{
					echo '<script type="text/javascript">
							alert("You did not DELETE your animal Successfully");
						</script>';
					header('refresh:0; url="../tema/my_profile/my_pets/myPets.php"');
				}
	
}
function userUpdateFunc(){
		$name=$_POST["name"];
		$surname=$_POST["surname"];
		$user_email=$_POST["email"];
		$user_password=$_POST["password"];
		$gender=$_POST["gender"];
		$bDate=$_POST["bDate"];
		$adress=$_POST["adress"];
		$user_foto=$_POST["userFoto"];
		$userID=$_POST["userID"];
		
		//Did you upload animal Photo?
		if (!empty($_FILES["avatar"]["tmp_name"])){
						if ($_FILES["avatar"]["type"]=="image/jpeg" or  $_FILES["avatar"]["type"]=="image/png"){
							if ($_FILES["avatar"]["size"]<(1024*9000)){
								$eski_ad=$_FILES["avatar"]["name"];
								$uzanti=substr($eski_ad,-4,4);
								$rasgele=rand(1,100000);
								$ekle=array("er","se","uy","re","yts");
								$yeni_ad="../tema/images/users_avatar/".$ekle[rand(0,4)].$rasgele.$uzanti;
								if (!file_exists($yeni_ad)){
									if (move_uploaded_file($_FILES["avatar"]["tmp_name"],$yeni_ad)){
										$avatar=$yeni_ad;
									}else{
										echo "Profil resmi yüklenemedi!<br/>Yönlendiriliyorsunuz...";
										header('refresh:5; url=../tema/my_profile/aboutMe/aboutMe.php');
										die();
									}
								}else{
									echo "Bu dosya zaten mevcut!<br/>Yönlendiriliyorsunuz...";
									header('refresh:5; url=../tema/my_profile/aboutMe/aboutMe.php');
									die();
								}
							}else{
								echo "Profil resminin boyutu 300 KB'tan küçük olmalı!<br/>Yönlendiriliyorsunuz...";
								header('refresh:5; url=../tema/my_profile/aboutMe/aboutMe.php');
								die();
							}
						}else{
								echo "Profil resminin tipi png veya jpg değil!<br/>Yönlendiriliyorsunuz...";
								header('refresh:5; url=../tema/my_profile/aboutMe/aboutMe.php');
								die();
						}
					}else{
					$avatar=$user_foto;
					}
				
				$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
				$addAnimal="UPDATE users SET name=?,surname=?,e_mail=?,password=?,gender=?,birthDate=?,address=?,avatar=? WHERE userID=$userID";
				$query=$db->prepare($addAnimal);
				$query->execute(array($name,$surname,$user_email,$user_password,$gender,$bDate,$adress,$avatar));
				if(count($query)){
					
					header('refresh:0; url="../tema/my_profile/aboutMe/aboutMe.php"');

				}else{
					echo '<script type="text/javascript">
							alert("You did not Update your animal Successfully");
						</script>';
					header('refresh:0; url="../tema/my_profile/aboutMe/aboutMe.php"');
				}
		

}
function animalUpdate(){
		$petSpecies=$_POST["petSpecies"];
		$vaccine=$_POST["vaccine"];
		$gender=$_POST["gender"];
		$petName=$_POST["aName"];
		$petKind=$_POST["aKind"];
		$bdate=$_POST["bDate"];
		$momKind=$_POST["momKind"];
		$dadKind=$_POST["dadKind"];				
		$description=$_POST["description"];
		$animalID=$_POST["animalID"];
		$sharePurpose=$_POST["sharePurpose"];
		$animalFoto=$_POST["animalFoto"];
		
		if (!empty($_FILES["avatar"]["tmp_name"])){
						if ($_FILES["avatar"]["type"]=="image/jpeg" or  $_FILES["avatar"]["type"]=="image/png"){
							if ($_FILES["avatar"]["size"]<(1024*900)){
								$eski_ad=$_FILES["avatar"]["name"];
								$uzanti=substr($eski_ad,-4,4);
								$rasgele=rand(1,100000);
								$ekle=array("er","se","uy","re","yts");
								$yeni_ad="../tema/my_profile/my_pets/images/".$ekle[rand(0,4)].$rasgele.$uzanti;
								if (!file_exists($yeni_ad)){
									if (move_uploaded_file($_FILES["avatar"]["tmp_name"],$yeni_ad)){
										$avatar=$yeni_ad;
									}else{
										echo "Profil resmi yüklenemedi!<br/>Yönlendiriliyorsunuz...";
										header('refresh:5; url=index.php?sayfa=kayit_ol');
										die();
									}
								}else{
									echo "Bu dosya zaten mevcut!<br/>Yönlendiriliyorsunuz...";
									header('refresh:5; url=index.php?sayfa=kayit_ol');
									die();
								}
							}else{
								echo "Profil resminin boyutu 300 KB'tan küçük olmalı!<br/>Yönlendiriliyorsunuz...";
								header('refresh:5; url=index.php?sayfa=kayit_ol');
								die();
							}
						}else{
								echo "Profil resminin tipi png veya jpg değil!<br/>Yönlendiriliyorsunuz...";
								header('refresh:5; url=index.php?sayfa=kayit_ol');
								die();
						}
					}else{
					$avatar=$animalFoto;
					}
		
		
		$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
		$addAnimal="UPDATE animals SET aSpecies=?,aKind=?,aName=?,birthDate=?,gender=?,vaccine=?,aAvatar=?,momKind=?,dadKind=?,sharePurpose=?,information=? WHERE animalID=$animalID";
		$query=$db->prepare($addAnimal);
		$query->execute(array($petSpecies,$petKind,$petName,$bdate,$gender,$vaccine,$avatar,$momKind,$dadKind,$sharePurpose,$description));
		if(count($query)){
			
			header('refresh:0; url="../tema/my_profile/my_pets/myPets.php"');

		}else{
			echo '<script type="text/javascript">
					alert("You did not Update your animal Successfully");
				</script>';
			header('refresh:0; url="../tema/my_profile/my_pets/myPets.php"');
		}
}
		
function addAnimalFunc(){
	if($_POST){
		echo $petSpecies=$_POST["petSpecies"];
		echo $vaccine=$_POST["vaccine"];
		echo $gender=$_POST["gender"];
		echo $petName=$_POST["petName"];
		echo $petKind=$_POST["petKind"];
		echo $bdate=$_POST["bdate"];
		echo $momKind=$_POST["momKind"];
		echo $dadKind=$_POST["dadKind"];				
		echo $description=$_POST["description"];
		echo $accountID=$_POST["accountID"];
		
		
		//Did you upload animal Photo?
		if (!empty($_FILES["avatar"]["tmp_name"])){
						if ($_FILES["avatar"]["type"]=="image/jpeg" or  $_FILES["avatar"]["type"]=="image/png"){
							if ($_FILES["avatar"]["size"]<(1024*900)){
								$eski_ad=$_FILES["avatar"]["name"];
								$uzanti=substr($eski_ad,-4,4);
								$rasgele=rand(1,100000);
								$ekle=array("er","se","uy","re","yts");
								$yeni_ad="../tema/my_profile/my_pets/images/".$ekle[rand(0,4)].$rasgele.$uzanti;
								if (!file_exists($yeni_ad)){
									if (move_uploaded_file($_FILES["avatar"]["tmp_name"],$yeni_ad)){
										$avatar=$yeni_ad;
									}else{
										echo "Profil resmi yüklenemedi!<br/>Yönlendiriliyorsunuz...";
										header('refresh:5; url=index.php?sayfa=kayit_ol');
										die();
									}
								}else{
									echo "Bu dosya zaten mevcut!<br/>Yönlendiriliyorsunuz...";
									header('refresh:5; url=index.php?sayfa=kayit_ol');
									die();
								}
							}else{
								echo "Profil resminin boyutu 300 KB'tan küçük olmalı!<br/>Yönlendiriliyorsunuz...";
								header('refresh:5; url=index.php?sayfa=kayit_ol');
								die();
							}
						}else{
								echo "Profil resminin tipi png veya jpg değil!<br/>Yönlendiriliyorsunuz...";
								header('refresh:5; url=index.php?sayfa=kayit_ol');
								die();
						}
					}else{
					$avatar="../tema/my_profile/my_pets/images/noAvatar.png";
					}
		$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
		$addAnimal="INSERT INTO animals(userID,aSpecies,aKind,aName,birthDate,gender,vaccine,aAvatar,momKind,dadKind,sharePurpose,information,addDate,lastSituation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,Now(),?)";
		$query=$db->prepare($addAnimal);
		$query->execute(array($accountID,$petSpecies,$petKind,$petName,$bdate,$gender,$vaccine,$avatar,$momKind,$dadKind,'Just Add',$description,1));
		if(count($query)){
			
			header('refresh:0; url="../tema/my_profile/my_pets/myPets.php"');

		}else{
			echo '<script type="text/javascript">
					alert("You did not add your animal Successfully");
				</script>';
			header('refresh:0; url="../index.php"');
		}
		
	}else{
		echo "You cannot add animal. There is a some problem!";
	}


}

function forgetPassword(){
	if(isset($_POST)){
		
	$email=$_POST["email"];
	$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");			
	$sql = "SELECT * FROM users WHERE e_mail = :email";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(
	':email'=>$email	
	));	
	
if($stmt->rowCount()){


$result = $stmt->fetch();

echo $result['name'];

include "../tema/class.phpmailer.php";
$mail = new PHPMailer();

$mail->IsSMTP();

$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->Username = 'semihozden01@gmail.com';
$mail->Password = '';

$mail->SetFrom($mail->Username, 'Semih ÖZDEN');

$mail->AddAddress($result["e_mail"], 'senin adın soyadın');
$mail->CharSet = 'UTF-8';
$mail->Subject = 'E-POSTA KONUSU';
$content = '<div style="background: #eee; padding: 10px; font-size: 14px">Bu bir test e-posta\'dır..</div>';
$mail->MsgHTML($content);
if($mail->Send()) {
    // e-posta başarılı ile gönderildi
} else {
    // bir sorun var, sorunu ekrana bastıralım
    echo $mail->ErrorInfo;
}
		
		/*$to = $result['e_mail'];
		$password = $result['password'];
		$subject = "Your Recovered Password";
		$message = "Please use this password to login " . $password;
		$headers = "From : semihozden01@cgmail.com";
		ini_set() ;
		if(mail($to, $subject, $message, $headers)){
			echo "Your Password has been sent to your email id";
		}else{
			echo "Failed to Recover your password, try again";
		}*/
}		
	}else{		
		echo "Please Fulfill the fields!!";
	}
}
function logout(){
echo '<script type="text/javascript">
		alert("Are you sure to log out!!");
		</script>';
	//session_unset();
	$_SESSION=array();
	session_destroy();
	header('refresh:0; url="../index.php"');

}
 	
function signUp(){
	
		$name=$_POST["name"];
		$surname=$_POST["surname"];
		$user_email=$_POST["user_email"];
		$user_password=$_POST["user_password"];
		$gender=$_POST["gender"];
		$bDate=$_POST["bday"];

		$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");
		$sql="SELECT * FROM users WHERE e_mail=:e_mail";
		$stmt=$db->prepare($sql);
		$stmt->execute(array(
			':e_mail'=>$user_email
		));
		
		if($stmt->rowCount()){
			echo ' <script type="text/javascript">
		alert("You Have Already Enrolled! Please Write different E mail adres");
		</script>';
			header('refresh:0; url="../index.php"');
		}else{
					

		$avatar="../tema/images/users_avatar/noAvatar.png";
		$enroll="INSERT INTO users (name,surname,e_mail,password,gender,birthDate,address,avatar,rutbe,onay,enrolDate) VALUES (?,?,?,?,?,?,?,?,?,?,Now())";
		$query=$db->prepare($enroll);
		$query->execute(array($name,$surname,$user_email,$user_password,$gender,$bDate,'From The EARTH',$avatar,0,1));
		if(count($query)){
			echo '<script type="text/javascript">
					alert("You enrolled Successfully");
				</script>';
			header('refresh:0; url="../index.php"');

		}else{
			echo '<script type="text/javascript">
					alert("You did not enrolled Successfully");
				</script>';
			header('refresh:0; url="../index.php"');
		}
		
		}
}

function login(){
		$mail=$_POST["email"];
		$password=$_POST["password"];
		
		$db= new PDO("mysql:host=127.0.0.1;dbname=petportal;charset=utf8","root","");
		/*$sorgu=$db->query("SELECT * FROM users where e_mail='$mail' and password='$password'");
		
		$result=$sorgu->fetch();
			*/
	$sql = "SELECT * FROM users WHERE e_mail = :email AND password= :password";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(
	':email'=>$mail,
	':password'=>$password
	));

		
		if($stmt->rowCount()){
			$result=$stmt->fetch();
						
			$_SESSION["login"]=1;
			$_SESSION["e_mail"]=$result["e_mail"];
			$_SESSION["name"]=$result["name"];
			$_SESSION["surname"]=$result["surname"];
			$_SESSION["gender"]=$result["gender"];
			$_SESSION["id"]=$result["userID"];
			$_SESSION["avatar"]=$result["avatar"];
			
			header('refresh:0; url="../tema/main.php"');
			
			
		}else{
				echo ' <script type="text/javascript">
		alert("You did not enter Successfully");
		</script>';
			header('refresh:0; url="../index.php"');
			
		}
}
?>