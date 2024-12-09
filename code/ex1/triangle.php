<?php
    function triangle($nombre) {
        for ($i = 1; $i <= $nombre; $i++) {
            $triangle = "";
            for ($j = 1; $j <= $i; $j++) {
                $triangle .= "*";
            }
            echo $triangle . "\n";
        } echo "\n";
    }
?>