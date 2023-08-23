<?php require_once('partials/header.php') ?>

<div>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand text-danger" href="index.php">FindTheChest</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-danger text-decoration-underline" href="index.php">Bienvenue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger text-decoration-underline" href="#">Lancer une partie</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container text-center">
        <div class="border rounded border-grey mt-2">
            <h1 class="text-decoration-underline text-white p-2 m-0 bg-danger rounded-top">Bienvenue Aventurier !
            </h1>
            <hr class="mt-0">
            <h4 class="px-4 text-decoration-underline text-start text-danger"><i
                    class="bi bi-arrow-right-short"></i>FindTheChest, qu'est-ce que c'est ?</h4>
            <p class="pe-4 px-4 pt-2 text-start">
                FindTheChest est un jeu dans lequel vous incarnez un personnage qui a un seul but dans la vie :
                <span class="text-danger text-decoration-underline fw-semibold">devenir riche !</span> et vous devez
                l'aider a atteindre son but en le contrôlant et en explorant la carte du jeu afin de trouver <span
                    class="text-danger text-decoration-underline fw-semibold">le
                    trésor</span> qui permettra le rendre riche !
            </p>
            <h4 class="px-4 text-decoration-underline text-start text-danger"><i
                    class="bi bi-arrow-right-short"></i>Quel est le
                but du jeu
                ?</h4>
            <p class="pe-4 px-4 pt-2 text-start">Vous êtes un(e) aventurier(e) qui s'aventure sur une carte étant
                générée
                aléatoirement. <br>
                Sur cette carte, se trouvera des entités. <br>
                Les entités seront : <br>
                - Des ennemis <br>
                - Un coffre <br>
            </p>
            <p class="pe-4 px-4 pt-2 text-start">
                Votre objectif sera de récupérer le coffre présent sur la carte en évitant de mourir lors de vos
                combats
                contre les ennemis tout le long de la partie. <br>
                Vous aurez pour cela a disposition 4 boutons directionnels qui seront affichés a l'écran et qui vous
                permettront
                de vous déplacer de case en case sur la carte. <br>
                A chaque fois que vous vous déplacerez sur une case, une information textuel sera affichée pour vous
                informer tout le long de la partie de votre progression. <br>
                <span class="fw-semibold">Vous ne pouvez pas savoir a l'avance l'emplacement des ennemis et du
                    coffre.<span>
            </p>

            <p class="pe-4 px-4 pt-2 text-start">
                Si jamais vous êtes amené a rencontrer un ennemi au cours de votre partie, vous entrerez dans une
                phase de combat. <br>
                Durant cette phase, vous aurez toutes les informations du combat disponibles dans la zone de texte.
            </p>

            <h4 class="px-4 text-decoration-underline text-start text-danger"><i
                    class="bi bi-arrow-right-short"></i>Amusez-vous bien !</h4>
            <a href="#" class="btn btn-danger mb-3">Je lance une partie</a>

        </div>
    </main>
</div>

<?php require_once('partials/footer.php') ?>