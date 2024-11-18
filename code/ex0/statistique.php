<?php
    function moyenne(array $notes) {
        $nb_notes = 0;  // compteur pour le nombre de notes
        $total = 0;     // somme des notes

        // boucle pour parcourir le tableau des notes
        foreach($notes as $matiere => $note) {
            $nb_notes += 1;
            $total += $note;
        }

    echo "la moyenne est de ".$total/$nb_notes."/20\n\n"; // "\n" pour un saut de ligne dans la console
    }
    // moyenne(array("francais"=>15, "maths"=>5, "engene"=>20, "anglais"=>19));


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
    // mediane(array(2004, 2001, 2002, 2002, 2002, 2003, 2005)); // yang jungwon, lee heeseung, park jonseong, sim jaeyun, park sunghoon, kim sunoo, nishimura riki
    // mediane(array(2004, 2001, 2002, 2002, 2002, 2003, 2005, 2020)); // yang jungwon, lee heeseung, park jonseong, sim jaeyun, park sunghoon, kim sunoo, nishimura riki, en-
?>