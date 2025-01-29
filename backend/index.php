<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json");

    // Getting data number of people/player ($_get)
    if (isset($_GET['num_people']) && is_numeric($_GET['num_people'])) {
        $num_people = (int)$_GET['num_people'];

        // Data validation
        // Greater than 53 are normal values and cards must be distributed to a number of people instead of having it as an error.
        if ($num_people < 0 || $num_people == NULL) {
            echo "Input value does not exist or value is invalid";
            exit;
        }

        // List of cards (names)
        $cards = array(
            'S' => array('A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K'),
            'H' => array('A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K'),
            'D' => array('A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K'),
            'C' => array('A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K')
        );

        $deck = array();
        foreach ($cards as $suit => $values) {
            foreach ($values as $value) {
                $deck[] = "$suit-$value";
            }
        }

        // Shuffle
        shuffle($deck);
        $distribution = array_fill(0, $num_people, []);


        // Fill the card into array based on the number of people/player
        $card_index = 0;
        while ($card_index < count($deck)) {
            for ($person = 0; $person < $num_people; $person++) {
                if ($card_index >= count($deck)) {
                    break;
                }
                $distribution[$person][] = $deck[$card_index];
                $card_index++;
            }
        }

        // Generate the output
        // Generate the output in the specified format

        $output = [];
        foreach ($distribution as $personCards) {
            $output[] = implode(',', $personCards);
        }

        echo json_encode([
            "status" => "success",
            "message" => "Cards distributed successfully",
            "data" => $output
        ]);
    }  else {
        // Handle missing or invalid input
        echo json_encode([
            "status" => "error",
            "message" => "Input value does not exist or value is invalid"
        ]);
    }

?>