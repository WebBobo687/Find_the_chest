<!DOCTYPE html>
<html>

<head>
    <title>Move Player</title>
    <!-- Ajoutez le lien vers Bootstrap CSS ici -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <form method="post" action="">
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" type="submit" name="top">Déplacer en haut</button>
                </div>
                <div class="col">
                    <button class="btn btn-primary" type="submit" name="left">Déplacer à gauche</button>
                    <button class="btn btn-primary" type="submit" name="right">Déplacer à droite</button>
                </div>
                <div class="col">
                    <button class="btn btn-primary" type="submit" name="bottom">Déplacer en bas</button>
                </div>
            </div>
        </form>
    </div>
    <?php

    spl_autoload_register(function ($className) {
        $classPath = str_replace('\\', '/', $className) . '.php';
        $classPath = '../' . $classPath;

        require_once(__DIR__ . '/' . $classPath);
    });

    use \Classes\Joueur;
    use \Classes\Carte;

    session_start(); // Start the session

    if (!isset($_SESSION['joueur'])) {
        $positionX = rand(0, 9);
        $positionY = rand(0, 9);
        $_SESSION['joueur'] = new Joueur(rand(125, 250), rand(100, 125), $positionX, $positionY);
    }

    $joueur = $_SESSION['joueur'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (array_key_exists('top', $_POST) && $joueur->posY < 9) {
            $joueur->posY += 1;
        } elseif (array_key_exists('bottom', $_POST) && $joueur->posY > 0) {
            $joueur->posY -= 1;
        } elseif (array_key_exists('left', $_POST) && $joueur->posX > 0) {
            $joueur->posX -= 1;
        } elseif (array_key_exists('right', $_POST) && $joueur->posX < 9) {
            $joueur->posX += 1;
        }

        echo "<br>Position du joueur après déplacement - X: " . $joueur->posX . ", Y: " . $joueur->posY;
    }

    $carte = new Carte();

    ?>
    <!-- Ajoutez le lien vers Bootstrap JS (facultatif, pour certaines fonctionnalités) ici -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
