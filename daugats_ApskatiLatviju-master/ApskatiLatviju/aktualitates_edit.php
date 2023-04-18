<?php
    include "header.php";
?>

<?php
            
            if(isset($_POST["edit"])){

                
                require("faili/connect_db.php");

                $ID = $_POST["edit"];
                $atlasit = "SELECT * FROM aktualitates WHERE aktualitates_id = $ID";
                $atlasa = mysqli_query($savienojums, $atlasit);

                

                while($ieraksts = mysqli_fetch_assoc($atlasa)){
                    if (isset($_SESSION["Lietotajvards"])) {
                        
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
                      <button value='{$ieraksts['aktualitates_id']}' type='submit' name='update'>Apstiprināt</button>
                    </form>";
                }

                            }
                        }

            require ("faili/connect_db.php");
            if(isset($_POST['update'])){
                $virsraksts = $_POST['virsrakstsAkt'];
                $apraksts = $_POST['aprakstsAkt'];
                $attels = $_POST['attelsAkt'];
                $ID = $_POST['update'];

                    if(!empty($virsraksts) && !empty($apraksts) && !empty($attels)){
                        $pievienot_piedavajumi_SQL = "UPDATE aktualitates SET Virsraksts = '$virsraksts',
                        Apraksts = '$apraksts', Attels = '$attels' WHERE aktualitates_id = '$ID'";

                        if(mysqli_query($savienojums, $pievienot_piedavajumi_SQL)){
                            echo "<div class='green_alert'>Rediģēšana ir noritējusi veiksmīgi!</div>";
                            header("Refresh: 2; url=aktualitates.php");
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