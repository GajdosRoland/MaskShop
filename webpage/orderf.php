<?php
function writeDropDown($array){

    echo <<< W1
        <select name="choose" id="name">
        <option value="choose" name="choose"></option>
W1;

    foreach ($array as $item) {
        echo '<option value="'.$item.'">'.$item.'</option>';
    }

    echo "</select>";
}