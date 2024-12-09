<?php
    function mediane(array $donnees) {
        // trier les données par ordre croissant
        sort($donnees);

        // nombre de données du tableau donnees
        $nb_donnees = sizeof($donnees);

        // vérifier si pair ou impair
        if ($nb_donnees % 2 == 0) { 
            echo "Le nombre de valeurs du tableau est paire \n";
            // si pair, prendre la moyenne des deux valeurs du milieu
            $avant_milieu = $donnees[$nb_donnees / 2 - 1]; // valeur avant le milieu
            echo "la valeur avant le milieu est : " . $avant_milieu . "\n";
            $apres_milieu = $donnees[$nb_donnees / 2]; // valeur après le milieu
            echo "la valeur après le milieu est : " . $apres_milieu . "\n";
            $milieu = ($avant_milieu + $apres_milieu) / 2; // moyenne des deux valeurs du milieu
        } else {
            // si impair, la médiane est la valeur du milieu
            echo "Le nombre de valeurs du tableau est impaire \n";
            $milieu = $donnees[floor($nb_donnees / 2)];
        }
        echo "Voici le tableau trié est : " . implode(", ", $donnees) . " , la médiane est donc " . $milieu . "\n\n";
    }
?>