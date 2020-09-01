<?php
echo '<table border="1">';
foreach ($data as $el) {
    echo '<tr>';
    foreach ($el as $e) {
        echo '<td>' . $e . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
