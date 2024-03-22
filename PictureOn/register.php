<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'dbconnect.php';   
    
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
            
    
    $sql = "Select * from users where username='$username'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    
    
    if($num == 0) {
    
                
        $sql = "INSERT INTO `users` ( `username`, 
                `password`, `date`) VALUES ('$username','$password', 
                current_timestamp())";
    
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            $showAlert = true; 
        }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }
    
   if($num>0) 
   {
      $exists="Имя недопустимо,повторите попытку"; 
   } 
    
 
    
?>
    
<?php
    
    if($showAlert) {
    
        echo 'Успешно!
        <!DOCTYPE html>
        <html>
        <head>
	    <link rel="stylesheet" href="reg_style.css">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>PictureOn</title>
        </head>
        <body>
        <div class="log_button">										
		<p style="font-family: Comic Sans MS;">Теперь y вас есть аккаунт-вы можете войти!</p>
		<a class="log_button1" style="font-family: Comic Sans MS;" href="pass.html">Войти</a>
		</div> 
        </body>
        </html>';
    
    }
    
    if($showError) {
    
        echo ' Ошибка!</strong> '. $showError; 
   }
        
    if($exists) {
        echo 'Ошибка!'. $exists; 
     }
   
?>
    
