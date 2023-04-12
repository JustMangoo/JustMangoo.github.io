<?php
    include "header.php";
?>

    <section id="piedavajumi">

    <?php if (isset($_SESSION["lietotajvards"])) {?>
        <div class="add">Pievienot <i class="fa-solid fa-plus"></i></div>
<?php } ?>

        <h1>Piedāvājumi</h1>
        <div id="post-grid">
            <div class="post">
            <img src="Images/Liepaja.jpg" alt="Post Image">
            <h2>Post Title 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sodales ipsum at orci finibus dictum.</p>
            <a href="#" class="btn-signup">Lasīt vairāk</a>
            </div>
            <div class="post">
            <img src="Images/noImage.jpg" alt="Post Image">
            <h2>Post Title 2</h2>
            <p>Nulla eget turpis euismod, lacinia massa eu, aliquet purus. Nam tristique faucibus magna.</p>
            <a href="#" class="btn-signup">Lasīt vairāk</a>
            </div>
            <div class="post">
            <img src="Images/noImage.jpg" alt="Post Image">
            <h2>Post Title 3</h2>
            <p>Suspendisse euismod, massa vitae blandit luctus, elit elit tristique justo, ut convallis libero sapien in arcu.</p>
            <a href="#" class="btn-signup">Lasīt vairāk</a>
            </div>
            <div class="post">
            <img src="Images/noImage.jpg" alt="Post Image">
            <h2>Post Title 4</h2>
            <p>Maecenas vehicula quam eu mi pharetra, vel malesuada metus sollicitudin.</p>
            <a href="#" class="btn-signup">Lasīt vairāk</a>
            </div>
        </div>
    </section>

<?php
    include "footer.php";
?>