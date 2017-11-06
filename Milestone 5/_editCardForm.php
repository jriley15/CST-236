<?php

//edit card form select fragment for edit profile page


if (empty($cards)) {
    //sets variables to empty if user has no cards saved yet
    $name = "";
    $number = "";
    $date = "";
    $ccv = "";

    //sets only select option to add new card
    ?>
    <select name="editCard">
        <option value="-1">Add new card</option>
    </select>

<?php
} else {
    //user has card(s) saved

    ?>
    <select name="editCard" onchange="selectCardEdit()">
        <option value="<?php
        if (array_key_exists(0, $cards)) {
            //sets default text field variables to first saved card in the array
            //sets option value to card id

            echo $cards[0]->getId() . "";
            $name = $cards[0]->getName();
            $number = $cards[0]->getNumber();
            $date = $cards[0]->getExpirationDate();
            $ccv = $cards[0]->getCcv();
        } else {
            //sets option value to -1, or the add card value
            echo "-1";
        }
        ?>"><?php
            if (array_key_exists(0, $cards)) {
                //sets select option text to last 4 numbers of card
                echo "Ending in " . substr($cards[0]->getNumber(), -4);
            } else {
                //sets select option text to add
                echo "Add new card";
            }
            ?></option>
        <option value="<?php
        if (array_key_exists(1, $cards)) {
            //sets option value to card id
            echo $cards[1]->getId() . "";
        } else {
            //sets option value to -1, or the add card value
            echo "-1";
        }
        ?>"><?php
            if (array_key_exists(1, $cards)) {
                //sets select option text to last 4 numbers of card
                echo "Ending in  " . substr($cards[1]->getNumber(), -4);
            } else {
                //sets select option text to add
                echo "Add new card";
            }
            ?></option>
        <option value="<?php
        if (array_key_exists(2, $cards)) {
            //sets option value to card id
            echo $cards[2]->getId() . "";
        } else {
            //sets option value to -1, or the add card value
            echo "-1";
        }
        ?>"><?php
            if (array_key_exists(2, $cards)) {
                //sets select option text to last 4 numbers of card
                echo "Ending in " . substr($cards[2]->getNumber(), -4);
            } else {
                //sets select option text to add
                echo "Add new card";
            }
            ?></option>
    </select>
    <?php

}
    ?>






