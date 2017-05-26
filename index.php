<?php

function getNumbers() {

    for ($i = 1; $i <= 49; $i++) {
        echo "$i" . "<input type='checkbox' name='number[]' value='$i'>";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['number']) && (count($_POST['number']) == 6)) {
            $numbersArr = [];

            while (count($numbersArr) !== 6) {
                $randomNumber = rand(1, 49);

                if (!in_array($randomNumber, $numbersArr)) {
                    $numbersArr[] = $randomNumber;
                }
            }
            echo "</br>";
            echo "</br>";
            echo "Twoje liczby to: ";
            foreach ($_POST['number'] as $myKey) {
                echo $myKey . ' ';
            }

            echo "</br>";
            echo "</br>";
            echo "Wylosowane liczby: ";
            foreach ($numbersArr as $key) {
                echo $key . ' ';
            }

            echo "</br>";
            echo "</br>";




            $hitNumbers = [];

            for ($i = 0; $i < 6; $i++) {

                if (in_array($_POST['number'][$i], $numbersArr)) {

                    $hitNumbers[] = $_POST['number'][$i];
                }
            }
            $implodeArr = implode(' ', $hitNumbers);
            if (count($hitNumbers) > 0 && count($hitNumbers) <= 1) {

                echo "Trafiłeś " . count($hitNumbers) . ' liczbę<br>';
                echo "</br>";
                echo "Ta liczba to $implodeArr </br>";
            } elseif (count($hitNumbers) > 0 && count($hitNumbers) > 1) {
                echo "Trafiłeś " . count($hitNumbers) . ' liczby<br>';
                echo "</br>";
                echo "Te liczby to: $implodeArr </br>";
            } else {
                echo "Niestety nic nie trafiłeś. Powodzenia następnym razem!";
            }
        } else {
            echo "</br>";
            echo "Nie podałeś 6 liczb.";
        }
    }
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Zadanie 2</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <form action="" method="POST" role="form">
                        <legend>Podaj 6 liczb</legend>
                        <div class="form-group">
                            <label>
<?php
getNumbers();
?>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">Akcpetuj</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>