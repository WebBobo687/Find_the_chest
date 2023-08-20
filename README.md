# Find_the_chest
*projet d'application php*

## Context:
    Le joeur est un pirate qui est à la recherche d'un trosert perdu sur une île remplis de danger

## Fonctionnalités:
### Le jeu:
- Carte de taille 10x10 cases
- Evénement du jeu décrit en dans la zone de texte
- Combat entre joueur et ennemis

### Le joueur:
- Déplacement dans 4 directions (haut, bas, gauche, droite)
- PV compris entre 125 et 250 pts (**aléatoire**)
- ATQ compris entre 100 et 125 pts (**aléatoire**) -> Force

### L'ennemi:
- Apparition aléatoire (entre 10 et 50 entités)
- PV compris entre 50 et 150 pts (**aléatoire**)
- ATQ compris entre 75 et 125 pts (**aléatoire**) -> Force

### Combat:
- Le joeur attaque en premier
- Si le joeur à plus de force que les PV de l'ennemi, le monstre meurt et le joueur retrouve 100% PV
- Si le joueur à moins de force que les PV ennemi, le monstre attaque à son tour
- A la fin d'un combat gagner par le joueur, EXP = +force de monstre
- Fuite impossible
- Si PV <= 0 -> Entité meurt

## Restriction:
- Deadline le **24/08/23**
- Jeu totalement textuel (hors bouton de déplacement)