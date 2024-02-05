<?php 
    require_once 'partials/header.php';
    require_once 'functions/game.php';
?>

<section class="p-2">

    <div id="interaction-btn" class="row row-cols-1 justify-content-between mx-4 me-4 mt-2">
        <a href="index.php" class="col-sm-4 col-12 btn btn-success text-white mb-2 mb-sm-0">Accueil</a>
        <form action="" method="post" class="col-sm-4 col-12 p-0">
            <button name="endgame" class="btn btn-danger w-100">Recommencer</button>
        </form>
    </div>

    <div id="title-find-the-chest" class="m-3 text-center">
        <h2 class="text-decoration-underline">Trouvez le trésor !</h2>
        <quote>Aidez-vous des fleches directionnelles pour vous déplacer sur le terrain, mais attention au <span class="monstre"><strong>Monstre</strong></span>.</quote>
    </div>

    <div id="text-zone" class="row m-0">
        <div id="text-block" class="col-6">
            <?php if (isset($_SESSION['jeu'])): ?>
                <p>
                    <?php foreach (array_reverse($_SESSION['jeu']) as $value): ?>
                        <?= $value ?>
                    <?php endforeach ?>
                </p>
            <?php endif; ?>
        </div>
        <div id="move-zone" class="col-6 text-center mt-4">
            <form method="post" class="mb-3">
                <button type="submit" name="top" class="btn btn-default p-0"><i id="btn-top"
                        class="bi bi-arrow-up-square-fill text-success"></i></button><br>
                <div>
                    <span class="px-5"><button type="submit" name="left" class="btn btn-default p-0"><i id="btn-left"
                                class="bi bi-arrow-left-square-fill text-warning"></i></button></span>
                    <span class="pe-5"><button type="submit" name="right" class="btn btn-default p-0"><i id="btn-right"
                                class="bi bi-arrow-right-square-fill text-danger"></i></button><br></span>
                </div>
                <button type="submit" name="bottom" class="btn btn-default p-0"><i id="btn-bottom"
                        class="bi bi-arrow-down-square-fill text-info"></i></button>
            </form>
            <div class="text-center">
                <h2>♥: 130</h2>
                <h2>☻: 125</h2>
                <h2>♣: 450</h2>
                <h2>◘: 435</h2>
            </div>
        </div>
    </div>
</section>

<?php require_once('partials/footer.php') ?>