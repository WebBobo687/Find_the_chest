<?php require_once('partials/header.php') ?>

<div>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary px-4 pe-4">
            <a class="navbar-brand text-danger" href="index.php">
                <img src="img/logo.png" alt="..." height="200">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link text-danger" href="index.php">Bienvenue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="play.php">Lancer une
                            partie</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container text-center">
        <div class="border rounded border-grey mt-2">
            <h1 class="text-decoration-underline text-white p-2 m-0 bg-danger rounded-top">Bienvenue, Cher Aventurier !
            </h1>
            <hr class="mt-0">
            <h4 class="px-4 text-decoration-underline text-start text-danger"><i
                    class="bi bi-arrow-right-short"></i>Découvrez l'univers captivant de FindTheChest</h4>
            <p class="pe-4 px-4 pt-2 text-start">
                Plongez-vous dans une aventure extraordinaire où vous incarnez un intrépide aventurier à la quête d'une
                richesse inestimable. Votre mission est claire : <span
                    class="text-danger text-decoration-underline fw-semibold">devenir incroyablement riche !</span> Vous
                aurez le privilège de guider votre personnage à travers des défis épiques pour localiser <span
                    class="text-danger text-decoration-underline fw-semibold">le légendaire trésor caché</span>.
            </p>
            <h4 class="px-4 text-decoration-underline text-start text-danger"><i class="bi bi-arrow-right-short"></i>Le
                Chemin de l'Héroïsme</h4>
            <p class="pe-4 px-4 pt-2 text-start">
                Vous êtes l'aventurier courageux dont le destin se déroule sur une terre mystérieuse. Sur votre chemin,
                des rencontres extraordinaires vous attendent, parmi lesquelles :
                <br>- Des ennemis redoutables
                <br>- Un précieux coffre renfermant des secrets
            </p>
            <p class="pe-4 px-4 pt-2 text-start">
                Votre but ultime est de localiser le trésor caché, tout en esquivant habilement les pièges et les défis
                lancés par vos adversaires. Pour vous guider, vous disposerez de quatre boutons directionnels qui vous
                permettront de naviguer à travers votre quête. À chaque pas que vous ferez, des descriptions captivantes
                vous tiendront en haleine, vous informant de votre progression tout au long de votre aventure.
                <br>
                Gardez en tête que la position des ennemis et du trésor reste inconnue jusqu'à ce que vous les trouviez
                par vous-même. C'est là que réside le véritable défi et l'excitation !
            </p>

            <p class="pe-4 px-4 pt-2 text-start">
                Si le destin vous confronte à un ennemi redoutable, vous serez plongé(e) dans un duel palpitant. Faites
                preuve de courage et de stratégie en utilisant les informations fournies dans la zone de combat.
            </p>

            <h4 class="px-4 text-decoration-underline text-start text-danger"><i
                    class="bi bi-arrow-right-short"></i>Prêt à relever le défi ?</h4>
            <a href="play.php" class="btn btn-danger mb-3">Je suis prêt à partir à l'aventure !</a>
        </div>
    </main>

</div>

<?php require_once('partials/footer.php') ?>