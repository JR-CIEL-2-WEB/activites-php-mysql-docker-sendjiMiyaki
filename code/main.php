<?php
    include "ex0/statistique.php";
    include "ex0/moyenne.php";
    include "ex1/triangle.php";
    include "ex4.1/tri_selection.php";

    // moyenne(array("francais"=>15, "maths"=>5, "engene"=>20, "anglais"=>19));

    // mediane(array(2004, 2001, 2002, 2002, 2002, 2003, 2005)); // yang jungwon, lee heeseung, park jonseong, sim jaeyun, park sunghoon, kim sunoo, nishimura riki
    // mediane(array(2004, 2001, 2002, 2002, 2002, 2003, 2005, 2020)); // yang jungwon, lee heeseung, park jonseong, sim jaeyun, park sunghoon, kim sunoo, nishimura riki, en-

    // triangle(7)

    //tri_selection_val(array(16, 3, 1, 4, 9, 7));

    $tableau = array(16, 3, 1, 4, 9, 7);
    tri_selection_ref($tableau);
?>
