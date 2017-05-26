<?php

function newFun() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['number']) && (count($_POST['number']) == 6)) {
            $numbersArr = [];

            while (count($numbersArr) !== 6) {
                $randomNumber = rand(1, 49);

                if (!in_array($randomNumber, $numbersArr)) {
                    $numbersArr[] = $randomNumber;
                } else {
                    
                }
            }

            echo "Wylosowane wartości to: ";
            foreach ($numbersArr as $key) {
                echo $key . ', ';
            }
            echo "Twoje wylosowane wartości to: ";
            foreach ($_POST['number'] as $myKey) {
                echo $myKey . ', ';
            }
            echo "</br>";
        }
    }
}

newFun();
