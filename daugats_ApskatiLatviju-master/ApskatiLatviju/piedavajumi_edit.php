<?php
    include "header.php";
?>

<?php
            
            if(isset($_POST["lasit"])){

                
                require("faili/connect_db.php");

                $ID = $_POST["lasit"];
                $atlasit = "SELECT * FROM piedavajumi WHERE piedavajumi_id = $ID";
                $atlasa = mysqli_query($savienojums, $atlasit);

                

                while($ieraksts = mysqli_fetch_assoc($atlasa)){
                    if (!isset($_SESSION["Lietotajvards"])) {
                        echo "
                        <h1>{$ieraksts['Virsraksts']}</h1>
                        <p>{$ieraksts['Apraksts']}</p>
                        <img src='{$ieraksts['Attels']}'>
                        <p>Izbraukšanas datums: {$ieraksts['Izbrauksanas_datums']}</p>
                        <p>Maksimālais cilvēku skaits: {$ieraksts['Cilveku_skaits']}</p>
                        <p>Publicētājs: {$ieraksts['Publicetajs']}</p>
                        ";
                 }else{
    
                    echo "<h2>Rediģēt {$ieraksts['Virsraksts']}</h2>
                    <form action='' method='post'>
                      <div class='form-group'>
                        <label for='virsrakstsAkt'>Virsraksts</label>
                        <input value='{$ieraksts['Virsraksts']}' type='text' id='virsrakstsAkt' name='virsrakstsAkt' required>
                      </div>
                      <div class='form-group'>
                        <label for='aprakstsAkt'>Apraksts</label>
                        <input value='{$ieraksts['Apraksts']}' class='big-text' type='text' id='aprakstsAkt' name='aprakstsAkt' required>
                      </div>
                      <div class='form-group'>
                        <label for='attelsAkt'>Attēla saite</label>
                        <input value='{$ieraksts['Attels']}' class='med-text' type='text' id='attelsAkt' name='attelsAkt' required>
                      </div>
                      <div class'form-group'>
                        <label for='izbrDatums'>Izbraukšanas datums</label>
                        <input value='{$ieraksts['Izbrauksanas_datums']}' type='date' id='izbrDatums' name='izbrDatums' required>
                      </div>
                      <div class'form-group'>
                        <label for='cilvSkaits'>Cilvēku skaits</label>
                        <input value='{$ieraksts['Cilveku_skaits']}' type='number' id='cilvSkaits' name='cilvSkaits' required>
                      </div>
                      <button value='{$ieraksts['piedavajumi_id']}' type='submit' name='update'>Apstiprināt</button>
                    </form>";
                }

                            }
                        }

            require ("faili/connect_db.php");
            if(isset($_POST['update'])){
                $virsraksts = $_POST['virsrakstsAkt'];
                $apraksts = $_POST['aprakstsAkt'];
                $attels = $_POST['attelsAkt'];
                $izbrDatums = $_POST['izbrDatums'];
                $cilvSkaits = $_POST['cilvSkaits'];
                $ID = $_POST['update'];

                    if(!empty($virsraksts) && !empty($apraksts) && !empty($attels) && !empty($izbrDatums) && !empty($cilvSkaits)){
                        $pievienot_piedavajumi_SQL = "UPDATE piedavajumi SET Virsraksts = '$virsraksts',
                        Apraksts = '$apraksts', Attels = '$attels', Izbrauksanas_datums = '$izbrDatums', Cilveku_skaits = '$cilvSkaits'
                        WHERE piedavajumi_id = '$ID'";

                        if(mysqli_query($savienojums, $pievienot_piedavajumi_SQL)){
                            echo "<div class='green_alert'>Rediģēšana ir noritējusi veiksmīgi!</div>";
                            header("Refresh: 2; url=piedavajumi.php");
                        }else{
                            echo "<div >Rediģēšana nav izdevusies! Mēģiniet vēlreiz!</div>";
                        }
                    }else{
                        echo "<div class='red_alert'>Rediģēšana nav izdevusies! Kāds no ievades laukiem aizpildīts NEKOREKTI!</div>";
                    }
            }
            ?>

<?php
    include "footer.php";
?>