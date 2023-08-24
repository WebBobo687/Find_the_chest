<?php require_once('partials/header.php');
require_once('functions/test_deplacement_angy.php');
?>

<section class="p-2">

    <div id="interaction-btn" class="row row-cols-1 justify-content-between mx-4 me-4 mt-2">
        <a href="index.php" class="col-sm-4 col-12 btn btn-success text-white mb-2 mb-sm-0">Accueil</a>
        <form action="" method="post" class="col-sm-4 col-12">
            <button name="endgame" class="btn btn-danger w-100">Recommencer</button>
        </form>
    </div>

    <div id="title-find-the-chest" class="m-3 text-center">
        <h2 class="text-decoration-underline">Trouvez le trésor !</h2>
    </div>

    <div id="text-zone" class="row justify-content-center m-0" style="height: 300px;">
        <div class="col-10 col-xl-5 col-lg-5 col-md-5 col-sm-10 m-1 border border-dark rounded"
            style="max-height: 300px; overflow-y: scroll;">
            <?php if (isset($_SESSION['jeu'])): ?>
                <p>
                    <?php foreach (array_reverse($_SESSION['jeu']) as $value): ?>
                        <?= $value ?>
                    <?php endforeach ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
    <div id="move-zone" class="text-center mt-4">
        <form method="post" action="">
            <button type="submit" name="top" class="btn btn-default p-0"><i
                    class="bi bi-arrow-up-square-fill text-success" style="font-size: 50px"></i></button><br>
            <div>
                <span class="px-5"><button type="submit" name="left" class="btn btn-default p-0"><i
                            class="bi bi-arrow-left-square-fill text-warning"
                            style="font-size: 50px"></i></button></span>
                <span class="pe-5"><button type="submit" name="right" class="btn btn-default p-0"><i
                            class="bi bi-arrow-right-square-fill text-danger"
                            style="font-size: 50px"></i></button><br></span>
            </div>
            <button type="submit" name="bottom" class="btn btn-default p-0"><i
                    class="bi bi-arrow-down-square-fill text-info" style="font-size: 50px"></i></button>
        </form>
    </div>
</section>

<?php require_once('partials/footer.php') ?>