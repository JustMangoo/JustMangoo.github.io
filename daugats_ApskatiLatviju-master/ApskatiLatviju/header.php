<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apskati Latviju</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    
</head>

<body>
<div class="info">

<?php
    if(isset($_POST["autorizeties"])){
        require("faili/connect_db.php");
        session_start();

        $Lietotajvards = mysqli_real_escape_string($savienojums, $_POST["lietotajs"]);
        $Parole = mysqli_real_escape_string($savienojums, $_POST["parole"]);
        $sqlVaicajums = "SELECT * FROM lietotaji WHERE Lietotajvards = '$Lietotajvards'";
        $rezultats = mysqli_query($savienojums, $sqlVaicajums);

        if(mysqli_num_rows($rezultats) == 1){
            while($row = mysqli_fetch_array($rezultats)){
                if(password_verify($Parole, $row["Parole"])){
                    $_SESSION["lietotajvards"] = $Lietotajvards;
                    header("location:parmums.php");
                }else{
                    echo "Nepareizs lietotājvārds vai parole!";
                }
            }
        }else{
            echo "Nepareizs lietotājvārds vai parole!";
        }




    }
    if(isset($_GET['logout'])){
        session_destroy();
    }   
    ?>

</div>
    <button id="login-button"><i class="fa-solid fa-lock"></i></button>
    <button id="user-button"><i class="fa-solid fa-user"></i></button>
    <img id="banner" src="Images/WebBanner.jpg" alt="WebBanner">
    <header>
        
        <div class="logo"><img src="images/logo.png" alt="Logo">Apskati Latviju</div>
        <nav class="nav">
            <ul>
                <li><a href="./index.php">Sākums</a></li>
                <li><a href="./piedavajumi.php">Piedāvājumi</a></li>
                <li><a href="./aktualitates.php">Aktualitātes</a></li>
                <li><a href="./parmums.php">Par mums</a></li>
            </ul>
        </nav>
    </header>

    <div class="burger">
        <div class="logo"><img src="images/logo.png" alt="Logo">Apskati Latviju</div>
        <div id="myLinks">
            <a href="./index.html">Sākums</a>
            <a href="./piedavajumi.html">Piedāvājumi</a>
            <a href="./aktualitates.html">Aktualitātes</a>
            <a href="./parmums.html">Par mums</a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="burger()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    
    <div id="login-popup" style="display: none;">
        <h2>Login</h2>
        <form action="" method="post">
          <div class="form-group">
            <label for="username">Lietotājvārds</label>
            <input type="text" id="lietotajs" name="lietotajs" required>
          </div>
          <div class="form-group">
            <label for="password">Parole</label>
            <input type="password" id="parole" name="parole" required>
          </div>
          <button type="submit" name="autorizeties">Ieiet</button>
        </form>
    </div>

    <div id="user-panel">
        <p>Vārds Uzvārds</p>
        <ul>
            <li><button id="change-password-btn">Mainīt paroli</button></li>
            <li><button id="edit-mods-btn">Rediģēt moderātorus</button></li>
            <li><button id="logout-btn">Iziet</button></li>
        </ul>
    </div>