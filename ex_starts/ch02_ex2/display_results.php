<?php

// Get data from the form

$investment = filter_input(
    INPUT_POST,
    'investment',
    FILTER_VALIDATE_FLOAT
);

$interest_rate = filter_input(
    INPUT_POST,
    'interest_rate',
    FILTER_VALIDATE_FLOAT
);

$years = filter_input(
    INPUT_POST,
    'years',
    FILTER_VALIDATE_INT
);


// Validate the investment amount

if ($investment === false || $investment <= 0) {

    $error = "Investment amount must be greater than 0.";

}


// Validate the interest rate

elseif (
    $interest_rate === false ||
    $interest_rate < 0
) {

    $error = "Interest rate must be a valid number.";

}


// Interest rate cannot be greater than 15

elseif ($interest_rate > 15) {

    $error = "Interest rate must be less than or equal to 15.";

}


// Validate number of years

elseif ($years === false || $years <= 0) {

    $error = "Number of years must be greater than 0.";

}


// Calculate Future Value

else {

    // Convert annual interest rate to monthly rate
    $monthly_rate =
        $interest_rate / 100 / 12;

    // Number of months
    $months =
        $years * 12;

    // Future value formula
    $future_value =
        $investment * pow(
            1 + $monthly_rate,
            $months
        );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Future Value Results</title>


    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }


        .container {
            width: 500px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }


        h1 {
            text-align: center;
            margin-bottom: 30px;
        }


        .result p {
            font-size: 17px;
            margin: 15px 0;
        }


        .label {
            font-weight: bold;
        }


        .future-value {
            font-size: 22px !important;
            font-weight: bold;
        }


        .error {
            background-color: #ffe5e5;
            color: #cc0000;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }


        .back {
            display: block;
            margin-top: 25px;
            padding: 12px;
            text-align: center;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }


        .back:hover {
            background-color: #555;
        }


        .date {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #555;
        }

    </style>

</head>


<body>

<div class="container">

    <h1>Future Value</h1>


    <?php if (isset($error)) : ?>

        <div class="error">

            <?php echo $error; ?>

        </div>


        <a href="index.php" class="back">
            Go Back
        </a>


    <?php else : ?>

        <div class="result">

            <p>
                <span class="label">
                    Investment Amount:
                </span>

                $
                <?php
                    echo number_format(
                        $investment,
                        2
                    );
                ?>
            </p>


            <p>
                <span class="label">
                    Interest Rate:
                </span>

                <?php
                    echo number_format(
                        $interest_rate,
                        2
                    );
                ?>%
            </p>


            <p>
                <span class="label">
                    Number of Years:
                </span>

                <?php echo $years; ?>
            </p>


            <p class="future-value">

                Future Value:

                $
                <?php
                    echo number_format(
                        $future_value,
                        2
                    );
                ?>

            </p>

        </div>


        <div class="date">

            This calculation was done on

            <?php
                echo date("n/j/Y");
            ?>.

        </div>


        <a href="index.php" class="back">
            Calculate Again
        </a>


    <?php endif; ?>

</div>

</body>

</html>