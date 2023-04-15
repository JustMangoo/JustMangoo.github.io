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
session_start();

require("faili/connect_db.php");

if (isset($_POST["autorizeties"])) {
    $Lietotajvards = mysqli_real_escape_string($savienojums, $_POST["lietotajs"]);
    $Parole = mysqli_real_escape_string($savienojums, $_POST["parole"]);
    $sql = "SELECT * FROM lietotaji WHERE Lietotajvards = '$Lietotajvards'";
    $result = mysqli_query($savienojums, $sql);

    if (mysqli_num_rows($result) == 1) {
        $record = mysqli_fetch_assoc($result);
        if (password_verify($Parole, $record["Parole"])) {
            $_SESSION["Lietotajvards"] = $record["Lietotajvards"];
//        $_SESSION["role"] = $record["id_tiesibas"];
            header("Location: pieteikumi.php");
            exit();
        } else {
            $error = "<div>Nepareizs lietotājvārds un/vai parole!</div>";
        }
    } else {
        $error = "<div>Nepareizs lietotājvārds un/vai parole!</div>";
    }
}
if (isset($_GET["logout-btn"])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
    ?>

</div>

<?php  if (isset($_SESSION["Lietotajvards"])) {?>
    <button id="user-button"><i class="fa-solid fa-user"></i></button>
<?php } else {?>
    <button id="login-button"><i class="fa-solid fa-lock"></i></button>
<?php } ?>
    <img id="banner" src="Images/WebBanner.jpg" alt="WebBanner">
    <header>
        
        <div class="logo"><img src="images/logo.png" alt="Logo">Apskati Latviju</div>
        <nav class="nav">
            <ul>
            <?php if (isset($_SESSION["Lietotajvards"])) { ?>
                <li><a href="./pieteikumi.php">Pieteikumi</a></li>
            <?php } else {?>
                <li><a href="./index.php">Sākums</a></li>
            <?php } ?>
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
        <form id="login_form" action="" method="post">
          <div class="form-group">
            <label for="lietotajs">Lietotājvārds</label>
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
        <?php 
        require("faili/connect_db.php");

        $Lietotajvards = $_SESSION['Lietotajvards'];
        $piedavajumiVaicajums = "SELECT * FROM lietotaji WHERE Lietotajvards = '$Lietotajvards'";
        $atlasaPiedavajumi = mysqli_query($savienojums, $piedavajumiVaicajums);

        while($ieraksts = mysqli_fetch_assoc($atlasaPiedavajumi)){
            echo "
            <p>{$ieraksts['Vards']}</p>
            <ul>
                <li><button id='change-password-btn'>Mainīt paroli</button></li>
                <li><button id='edit-mods-btn'>Rediģēt moderātorus</button></li>
                <li><a href='logout.php' id='logout-btn' name='logout-btn'>Iziet</a></li>
            </ul>
            ";
        }
        ?>

    </div>