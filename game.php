<!DOCTYPE html>

<html>

<head>
    <title>RPS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" style="text/css">
</head>

<body>

    <?php

    // Forms
    $form1 = '<form class="form" name="user-1" method="post"><div><div class="radio-div"><div><input type="radio" name="user-1" value="Rock" id="Rock"><label for="Rock"><img src="./img/rock.png" alt="Rock" /></div><div><input type="radio" name="user-1" value="Paper" id="Paper"><label for="Paper"><img src="./img/paper.png" alt="Paper" /></div><div><input type="radio" name="user-1" value="Scissors" id="Scissors"><label for="Scissors"><img src="./img/scissors.png" alt="Scissors" /></div></div></div><div class="submit-button"><input type="submit" class="btn btn-outline-secondary" id="submit" name="submit" value="Submit"></div></form>';
    $form2 = '<form class="form" name="user-2" method="post"><div><div class="radio-div"><div><input type="radio" name="user-2" value="Rock" id="Rock"><label for="Rock"><img src="./img/rock.png" alt="Rock" /></div><div><input type="radio" name="user-2" value="Paper" id="Paper"><label for="Paper"><img src="./img/paper.png" alt="Paper" /></div><div><input type="radio" name="user-2" value="Scissors" id="Scissors"><label for="Scissors"><img src="./img/scissors.png" alt="Scissors" /></div></div></div><div class="submit-button"><input type="submit" class="btn btn-outline-secondary" id="submit" name="submit" value="Submit"></div></form>';

    // Nullify vars
    $form1Final = "";
    $form2Final = "";
    $user1_choiceFinal = "";
    $user2_choiceFinal = "";
    $outcome_winnerFinal = "";


    // Game
    if (isset($_COOKIE["user-1"]) && isset($_COOKIE["user-2"])) {
        if ($_COOKIE["user-1"]  == $_COOKIE["user-2"]) {
            $outcome_winnerFinal = "Gelijkspel!";
        } elseif ($_COOKIE["user-1"]  == "Rock" && $_COOKIE["user-2"] == "Scissors") {
            $outcome_winnerFinal = "Speler 1 heeft gewonnen!";
        } elseif ($_COOKIE["user-1"]  == "Rock" && $_COOKIE["user-2"] == "Paper") {
            $outcome_winnerFinal = "Speler 2 heeft gewonnen!";
        } elseif ($_COOKIE["user-1"]  == "Scissors" && $_COOKIE["user-2"] == "Rock") {
            $outcome_winnerFinal = "Speler 2 heeft gewonnen!";
        } elseif ($_COOKIE["user-1"]  == "Scissors" && $_COOKIE["user-2"] == "Paper") {
            $outcome_winnerFinal = "Speler 1 heeft gewonnen!";
        } elseif ($_COOKIE["user-1"]  == "Paper" && $_COOKIE["user-2"] == "Rock") {
            $outcome_winnerFinal = "Speler 1 heeft gewonnen!";
        } elseif ($_COOKIE["user-1"] == "Paper" && $_COOKIE["user-2"] == "Scissors") {
            $outcome_winnerFinal = "Speler 2 heeft gewonnen!";
        }
    }

    // Cookies/POST to Var
    if (isset($_COOKIE["user-1"])) {
        $user1_choice = $_COOKIE["user-1"];
    } elseif (isset($_POST["user-1"])) {
        $user1_choice = $_POST["user-1"];
    }
    if (isset($_COOKIE["user-2"])) {
        $user2_choice = $_COOKIE["user-2"];
    } elseif (isset($_POST["user-2"])) {
        $user2_choice = $_POST["user-2"];
    }

    // Set cookies from POST method
    if (isset($_POST["submit"]) && isset($_POST["user-1"])) {
        setcookie("user-1", $_POST["user-1"]);
    }

    if (isset($_POST["submit"]) && isset($_POST["user-2"])) {
        setcookie("user-2", $_POST["user-2"]);
        header("Refresh:0");
    }

    //Kill Cookies
    if (isset($_COOKIE["user-1"]) && isset($_COOKIE["user-2"])) {
        $_COOKIE["user-1"] = setcookie("user-1", $_COOKIE["user-1"], time() - 60);
        $_COOKIE["user-2"] = setcookie("user-2", $_COOKIE["user-2"], time() - 60);
    }

    // Form Control
    if (!isset($user1_choice)) {
        $form1Final = $form1;
    }
    if (!isset($user2_choice) && isset($user1_choice)) {
        $form2Final = $form2;
    }
    if (isset($user1_choice) && isset($user2_choice)) {
        $outcome_winnerFinal;
    }

    ?>

    <h1>Steen Papier schaar</h1>
    <div class="all-content">
        <p class="speler">Speler 1:
            <?php
            echo $user1_choiceFinal;
            ?>
        </p>
        <div>
            <?php
            echo $form1Final;
            ?>
        </div>

        <div>
            <p class="speler">Speler 2:
                <?php
                echo $user2_choiceFinal;
                ?>
            </p>
            <div>
                <?php
                echo $form2Final;
                ?>
            </div>
        </div>
        <div>
            <p class="outcome">
                <?php
                echo $outcome_winnerFinal;
                ?>
            </p>
        </div>
    </div>
</body>

</html>