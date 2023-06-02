<?php
    include "header.php";
    if (!isset($_SESSION["Lietotajvards"])) {
        header("Refresh: 0; url=index.php");
    }
?>

    <section id="sakums">
            <h1>Pieteikumi</h1>
    </section>



<?php
    include "footer.php";
?>