<?php
    include "header.php";
?>



    <section id="news">
    <?php
            require ("faili/connect_db.php");
            if(isset($_POST['insert'])){
                $virsrakstsAkt = $_POST['virsrakstsAkt'];
                $aprakstsAkt = $_POST['aprakstsAkt'];
                $attelsAkt = $_POST['attelsAkt'];
                $publicetajs = $_SESSION['Lietotajvards'];

                    if(!empty($virsrakstsAkt) && !empty($aprakstsAkt) && !empty($attelsAkt)){
                        $pievienot_aktualitates_SQL = "INSERT INTO aktualitates(Virsraksts, Apraksts, Attels, Publicetajs, Datums) VALUES ('$virsrakstsAkt', '$aprakstsAkt', '$attelsAkt', '$publicetajs', now())";

                        if(mysqli_query($savienojums, $pievienot_aktualitates_SQL)){
                            echo "<div class='green_alert'>Pievienošana ir noritējusi veiksmīgi!</div>";
                            header("Refresh: 2; url=aktualitates.php");
                        }else{
                            echo "<div >Pievienošana nav izdevusies! Mēģiniet vēlreiz!</div>";
                        }
                    }else{
                        echo "<div class='red_alert'>Pievienošana nav izdevusies! Kāds no ievades laukiem aizpildīts NEKOREKTI!</div>";
                    }
            }
?>
   <?php if (isset($_SESSION["Lietotajvards"])) {?>
        <div class="open" onclick="open_popup(document.getElementById('addAkt-popup'))">Pievienot <i class="fa-solid fa-plus"></i></div>
        <?php } ?>
        <h1>Aktualitātes</h1>
        <?php
            require("faili/connect_db.php");

            $aktualitatesVaicajums = "SELECT * FROM aktualitates";
            $atlasaAktualitates = mysqli_query($savienojums, $aktualitatesVaicajums);

            if(mysqli_num_rows($atlasaAktualitates) > 0 ){
                while($ieraksts = mysqli_fetch_assoc($atlasaAktualitates)){
                    echo "


                        <div class='news-post'>
            <div class='news-text'>
                <h2>{$ieraksts['Virsraksts']}</h2>
                <p>{$ieraksts['Apraksts']}</p>
                <p class='publisher'>-{$ieraksts['Publicetajs']}</p>
            </div>
            <div class='news-img'>
                <img src='{$ieraksts['Attels']}' alt='News Image'>
            </div>";
            if (isset($_SESSION["Lietotajvards"])) {
            echo "
            <form action='aktualitates_edit.php' method='post' id='aktEdit'>
                <button value='{$ieraksts['aktualitates_id']}' type='submit'  name='edit'><i class='fa-solid fa-pen'></i></button>
            </form>
            <form action='' method='post' id='aktDelete'>
                <button value='{$ieraksts['aktualitates_id']}' type='submit' name='delete'><i class='fa-solid fa-trash'></i></button>
            </form>";

            }
            echo "</div>";
                }
            }else{
                echo "<div class='red_alert'>Nav nevienas aktualitates!</div>";
            }

            if(isset($_POST['delete'])){

                $ID = $_POST['delete'];
  
                        $SQL = "DELETE FROM aktualitates WHERE aktualitates_id = $ID";
  
                        if(mysqli_query($savienojums, $SQL)){
                            echo "<div class='green_alert'>Dzēšana ir noritējusi veiksmīgi!</div>";
                        }else{
                            echo "<div >Dzēšana nav izdevusies! Mēģiniet vēlreiz!</div>";
                        }
  
            }
        ?>
        
    </section>

    <div id="addAkt-popup" class="popups" style="display: none;">
    <div class="close" onclick="close_popup(document.getElementById('addAkt-popup'))"><i class="fa-solid fa-xmark"></i></div>
        <h2>Pievienot aktualitati</h2>
        <form action="" method="post">
          <div class="form-group">
            <label for="username">Virsraksts</label>
            <input type="text" id="virsrakstsAkt" name="virsrakstsAkt" required>
          </div>
          <div class="form-group">
            <label for="username">Apraksts</label>
            <input class="big-text" type="text" id="aprakstsAkt" name="aprakstsAkt" required>
          </div>
          <div class="form-group">
            <label for="username">Attēla saite</label>
            <input class="med-text" type="text" id="attelsAkt" name="attelsAkt" required>
          </div>
          <button type="submit" name="insert">Pievienot</button>
        </form>
    </div>

<?php
    include "footer.php";
?>