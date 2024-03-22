<?php
include 'dbconnect.php';
$username = $_POST["username"]; 
$password = $_POST["password"];
if (empty($username) or empty($password))
{
    echo 'Заполните все поля';
}
else{
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result=$conn->query($sql);

    if ($result->num_rows){
        while($row=$result->fetch_assoc()){
            echo '<!DOCTYPE html>
            <html>
            <head>
            <link rel="stylesheet" href="reg_style.css">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>PictureOn</title>
            </head>
            <body>
            <div class="log_button">										
            <p style="font-family: Comic Sans MS;">Вы успешно вошли в аккаунт!</p>
            <a class="log_button1" style="font-family: Comic Sans MS;" href="project.html">Зайти на главную страницу</a>
            </div> 
            </body>
            </html>';
            
        }
    }
    else{
        echo 'Нет такого пользователя';
    }
}
?>