<?php
// Passage par valeur
function tri_selection_val(array $tableau) {
    $n = sizeof($tableau);
    for ($i = 0; $i < $n - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($tableau[$j] < $tableau[$min]) {
                $min = $j;
            }
        }
        if ($min != $i) {
            $temp = $tableau[$i];
            $tableau[$i] = $tableau[$min];
            $tableau[$min] = $temp;
        }
    }
    echo "Tableau trié (par valeur) : " . implode(", ", $tableau) . "\n\n";
}

// Passage par référence
function tri_selection_ref(&$tableau) {
    $n = sizeof($tableau);
    for ($i = 0; $i < $n - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($tableau[$j] < $tableau[$min]) {
                $min = $j;
            }
        }
        if ($min != $i) {
            $temp = $tableau[$i];
            $tableau[$i] = $tableau[$min];
            $tableau[$min] = $temp;
        }
    }
    echo "Tableau trié (par référence) : " . implode(", ", $tableau) . "\n\n";
}
?>
