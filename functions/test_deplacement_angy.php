<!DOCTYPE html>
<html>

<head>
    <title>Move Player</title>
    <!-- Ajoutez le lien vers Bootstrap CSS ici -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .btn-arrow-center {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            font-size: 24px; /* Ajustez la taille de police selon vos préférences */
            border-radius: 5px; /* Pour rendre les boutons ronds */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <form method="post" action="">
            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <!-- HAUT -->
                    <button class="btn btn-primary btn-arrow-center" type="submit" name="top">&#x2B06;</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <!-- GAUCHE -->
                    <button class="btn btn-primary btn-arrow-center" type="submit" name="left">&#x2B05;</button>
                </div>
                <div class="col-md-6 text-center">
                    <!-- DROITE -->
                    <button class="btn btn-primary btn-arrow-center" type="submit" name="right">&#x27A1;</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center mt-3">
                    <!-- BAS -->
                    <button class="btn btn-primary btn-arrow-center" type="submit" name="bottom">&#x2B07;</button>
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

        if ($joueur->posX === 0) {
            echo "<br>Le joueur est au bout à gauche de la carte.";
        } elseif ($joueur->posX === 9) {
            echo "<br>Le joueur est au bout à droite de la carte.";
        }

        if ($joueur->posY === 0) {
            echo "<br>Le joueur est au bout en bas de la carte.";
        } elseif ($joueur->posY === 9) {
            echo "<br>Le joueur est au bout en haut de la carte.";
        }

        echo "<br>Position du joueur après déplacement - X: " . $joueur->posX . ", Y: " . $joueur->posY;
    }


    $carte = new Carte();

    ?>
    <!-- Ajoutez le lien vers Bootstrap JS (facultatif, pour certaines fonctionnalités) ici -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>