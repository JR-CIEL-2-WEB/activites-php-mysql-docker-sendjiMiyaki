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
?>