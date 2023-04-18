<?php
    include "header.php";
?>

    <section id="sakums">
            <h1>Populārākie piedāvājumi</h1>
            <div class="slider-container">
                <div class="slider">
<?php
                require("faili/connect_db.php");

                $piedavajumiVaicajums = "SELECT * FROM piedavajumi LIMIT 3";
                $atlasaPiedavajumi = mysqli_query($savienojums, $piedavajumiVaicajums);

                if(mysqli_num_rows($atlasaPiedavajumi) > 0 ){
                    while($ieraksts = mysqli_fetch_assoc($atlasaPiedavajumi)){
                        echo "
                        <img src='{$ieraksts['Attels']}' alt='image'>
                    ";
                    }
                }
?>

                </div>
                <div class="navigation">
                  <button class="prev">&#60;</button>
                  <button class="next">&#62;</button>
                </div>
              </div>
              <h1>Jaunākās aktualitates</h1>
              <div id="jaunAkt">
<?php
                require("faili/connect_db.php");

                $piedavajumiVaicajums = "SELECT * FROM aktualitates ORDER BY Datums DESC LIMIT 3";
                $atlasaPiedavajumi = mysqli_query($savienojums, $piedavajumiVaicajums);

                if(mysqli_num_rows($atlasaPiedavajumi) > 0 ){
                    while($ieraksts = mysqli_fetch_assoc($atlasaPiedavajumi)){
                        echo "
                        <div class='JA-post'>
                            <img src='{$ieraksts['Attels']}' alt='Post Image'>
                            <h2>{$ieraksts['Virsraksts']}</h2>
                         </div>
                    ";
                    }
                }
?>

                </div>
    </section>



<?php
    include "footer.php";
?>