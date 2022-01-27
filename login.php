<?php
    require_once 'connection.php'; 

    // $conn = mysqli_connect('localhost','Amine','teste123','patients');
    
    $sql = 'SELECT * FROM doctor';
    $resl = mysqli_query($conn, $sql);
    $doctor = mysqli_fetch_assoc($resl);
    // echo "<pre>"  ;
    // print_r($doctor);
    // echo "</pre>";
    $errors = array();
    if(isset($_POST['login'])){
        $nom = $_POST['user'];
        $code = $_POST['code'];
        if($doctor['nom']=="$nom" and $doctor['specialite']=="$code"){
            header('location:dash.php');
        }else if($doctor['nom']!="$nom"){
            array_push($errors,"The user name is incorrect ");
        }else if($doctor['specialite']<>"$code"){
            array_push($errors,"The Password is incorrect ");
        }
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginStyle.css">
</head>
<body>
    <nav class="nav-barre">
        <div class="log">
            <h1><span>D</span>octeur.</h1>
        </div>
        <ul class="list" id="lista">
            <li><a href="index.php"> Home</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Support</a></li>
            <li class="login">
                <a href="login.php" id="button">Login</a>
                <a href="##">Login for doctors!</a>
            </li>
        </ul>
        <div class="menu">
            <div class="menu-l"></div>
            <div class="menu-l2"></div>
            <div class="menu-l"></div>
        </div>
    </nav>
    <div class="container">
        <div class="deco">
            <img src="./image/deco2.png" alt="">
            <div class="content">
                <img src="./image/doc.png" alt="">
                <h1><span> WEL</span>COME <br> Doc<span>teur.</span></h1>
                
            </div>
            <img src="./image/deco.png" alt="" class="deco-pic">
        </div>
        <div class="formule" id="form">
            <form action="" method="post">
                <div class="login-formulaire">
                <h1>Login.</h1>
                    <div class="inputs">
                        <p style="color:red;"><?php  if(count($errors)!=0){echo $errors[0];} ; ?></p>
                        
                        <label for="">Email</label><br>
                        <input type="text" name="user" placeholder="Enter your user name" id="email" value="">
                    </div>
                    <div class="inputs">
                        <label for="">Password</label><br>
                        <input type="password" placeholder="Enter your password" name="code" id="code" value="" >
                    </div>
                    <a href="#">Froget passwod?</a>
                    <input type="submit" value="Login" name="login" class="submit">
                </div>
            </form>
        </div>
    </div>
    <script src="indexJS.js"></script>
</body>
</html>