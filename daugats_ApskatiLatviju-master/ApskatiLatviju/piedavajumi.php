<?php
    include "header.php";
?>

    <section id="piedavajumi">
    <?php
            require ("faili/connect_db.php");
            if(isset($_POST['insert'])){
                $virsrakstsAkt = $_POST['virsrakstsAkt'];
                $aprakstsAkt = $_POST['aprakstsAkt'];
                $attelsAkt = $_POST['attelsAkt'];
                $izbrDatums = $_POST['izbrDatums'];
                $cilvSkaits = $_POST['cilvSkaits'];
                $publicetajs = $_SESSION['Lietotajvards'];

                    if(!empty($virsrakstsAkt) && !empty($aprakstsAkt) && !empty($attelsAkt) && !empty($izbrDatums) && !empty($cilvSkaits)){
                        $pievienot_piedavajumi_SQL = "INSERT INTO piedavajumi(Virsraksts, Apraksts, Attels, Izbrauksanas_datums, Cilveku_skaits, Publicetajs, Datums) VALUES ('$virsrakstsAkt', '$aprakstsAkt', '$attelsAkt', '$izbrDatums' ,'$cilvSkaits','$publicetajs', now())";

                        if(mysqli_query($savienojums, $pievienot_piedavajumi_SQL)){
                            echo "<div class='green_alert'>Pievienošana ir noritējusi veiksmīgi!</div>";
                            header("Refresh: 2; url=piedavajumi.php");
                        }else{
                            echo "<div >Pievienošana nav izdevusies! Mēģiniet vēlreiz!</div>";
                        }
                    }else{
                        echo "<div class='red_alert'>Pievienošana nav izdevusies! Kāds no ievades laukiem aizpildīts NEKOREKTI!</div>";
                    }
            }

            if(isset($_POST['delete'])){

              $ID = $_POST['delete'];

                      $SQL = "DELETE FROM piedavajumi WHERE piedavajumi_id = $ID";

                      if(mysqli_query($savienojums, $SQL)){
                          echo "<div class='green_alert'>Dzēšana ir noritējusi veiksmīgi!</div>";
                          header("Refresh: 2; url=piedavajumi.php");
                      }else{
                          echo "<div >Dzēšana nav izdevusies! Mēģiniet vēlreiz!</div>";
                      }

          }
?>

    <?php if (isset($_SESSION["Lietotajvards"])) {?>
        <div class="open" onclick="open_popup(document.getElementById('addPied-popup'))">Pievienot <i class="fa-solid fa-plus"></i></div>
<?php } ?>

        <h1>Piedāvājumi</h1>
        <div id="post-grid">

        <?php
            require("faili/connect_db.php");

            $piedavajumiVaicajums = "SELECT * FROM piedavajumi";
            $atlasaPiedavajumi = mysqli_query($savienojums, $piedavajumiVaicajums);

            if(mysqli_num_rows($atlasaPiedavajumi) > 0 ){
                while($ieraksts = mysqli_fetch_assoc($atlasaPiedavajumi)){
                    echo "
            <div class='post'>
            <img src='{$ieraksts['Attels']}' alt='Post Image'>
            <h2>{$ieraksts['Virsraksts']}</h2>
            <p>{$ieraksts['Apraksts']}</p>
            <form action='piedavajumi_edit.php' method='post' class='btn-signup' style='background-color: transparent;'>
                <button value='{$ieraksts['piedavajumi_id']}' type='submit' name='lasit'>
                ";
                if (isset($_SESSION["Lietotajvards"])) {
                echo "Rediģēt";
                }else{
                echo "Lasīt vairāk";
                }    
                echo "
            </button>
            </form>";
            if (isset($_SESSION["Lietotajvards"])) {
              echo "
              <form action='' method='post'>
                <button value='{$ieraksts['piedavajumi_id']}' type='submit' name='delete'><i class='fa-solid fa-trash'></i></button>
              </form>";
              }
            echo"</div>";
                    
            
                }
            }else{
                echo "<div class='red_alert'>Nav nevienas aktualitātes!</div>";
            }
        ?>

    </section>


    <div id="addPied-popup" class="popups" style="display: none;">
        <div class="close" onclick="close_popup(document.getElementById('addPied-popup'))"><i class="fa-solid fa-xmark"></i></div>
        <h2>Pievienot piedavajumu</h2>
        <form action="" method="post">
          <div class="form-group">
            <label for="virsrakstsAkt">Virsraksts</label>
            <input type="text" id="virsrakstsAkt" name="virsrakstsAkt" required>
          </div>
          <div class="form-group">
            <label for="aprakstsAkt">Apraksts</label>
            <input class="big-text" type="text" id="aprakstsAkt" name="aprakstsAkt" required>
          </div>
          <div class="form-group">
            <label for="attelsAkt">Attēla saite</label>
            <input class="med-text" type="text" id="attelsAkt" name="attelsAkt" required>
          </div>
          <div class="form-group">
            <label for="izbrDatums">Izbraukšanas datums</label>
            <input type="date" id="izbrDatums" name="izbrDatums" required>
          </div>
          <div class="form-group">
            <label for="cilvSkaits">Cilvēku skaits</label>
            <input type="number" id="cilvSkaits" name="cilvSkaits" required>
          </div>
          <button type="submit" name="insert">Pievienot</button>
        </form>
    </div>

<?php
    include "footer.php";
?>