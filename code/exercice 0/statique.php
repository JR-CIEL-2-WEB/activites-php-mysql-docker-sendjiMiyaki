<?php
    // moyenne
    function moyenne(array $notes) {
        $nb_notes = 0;
        $total = 0;
        foreach($notes as $matiere => $note) {
            $nb_notes += 1;
            $total += $note;
        }
        echo "la moyenne est de ".$total/$nb_notes."/20\n"; //  "\n" est l'équivalent de "<br>"
    }
    moyenne(array("francais"=>15, "maths"=>5, "engene"=>20, "anglais"=>19));

    // médiane
    function mediane($donnees) {
        foreach($donnees as $valeur) {
            if (sizeof(donnee)%2 == 0) {
                $milieu = donnee[(sizeof(donnee)-1 * sizeof(donnee)+1) / 2];
            }
            else {
                $milieu = donnee[sizeof(donne/2)];
            }
        }
        echo "la médiane est ". $milieu ."\n";
    }
    mediane(2004, 2001, 2002, 2002, 2002, 2003, 2005); // yang jungwon, lee heeseung, park jonseong, sim jaeyun, park sunghoon, kim sunoo, nishimura riki
    mediane(2004, 2001, 2002, 2002, 2002, 2003, 2005, 2020); // yang jungwon, lee heeseung, park jonseong, sim jaeyun, park sunghoon, kim sunoo, nishimura riki, en-
?>