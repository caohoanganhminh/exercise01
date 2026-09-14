<?php

$product_description = filter_input(
    INPUT_POST,
    'product_description',
    FILTER_SANITIZE_SPECIAL_CHARS
);

$list_price = filter_input(
    INPUT_POST,
    'list_price',
    FILTER_VALIDATE_FLOAT
);

$discount_percent = filter_input(
    INPUT_POST,
    'discount_percent',
    FILTER_VALIDATE_FLOAT
);


// Validate data

if ($product_description === null || $product_description === '') {

    $error = "Product description is required.";

} elseif ($list_price === false || $list_price <= 0) {

    $error = "List price must be greater than 0.";

} elseif (
    $discount_percent === false ||
    $discount_percent < 0 ||
    $discount_percent > 100
) {

    $error = "Discount percent must be between 0 and 100.";

} else {

    // Calculate discount amount
    $discount_amount =
        $list_price * $discount_percent / 100;

    // Calculate discount price
    $discount_price =
        $list_price - $discount_amount;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Product Discount</title>

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

        .error {
            background-color: #ffe5e5;
            color: #cc0000;
            padding: 15px;
            border-radius: 5px;
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

    </style>

</head>

<body>

<div class="container">

    <h1>Product Discount</h1>

    <?php if (isset($error)) : ?>

        <div class="error">
            <?php echo $error; ?>
        </div>

        <a href="index.html" class="back">
            Go Back
        </a>

    <?php else : ?>

        <div class="result">

            <p>
                <span class="label">
                    Product Description:
                </span>

                <?php echo $product_description; ?>
            </p>

            <p>
                <span class="label">
                    List Price:
                </span>

                $
                <?php echo number_format($list_price, 2); ?>
            </p>

            <p>
                <span class="label">
                    Discount Percent:
                </span>

                <?php echo number_format($discount_percent, 2); ?>%
            </p>

            <p>
                <span class="label">
                    Discount Amount:
                </span>

                $
                <?php echo number_format($discount_amount, 2); ?>
            </p>

            <p>
                <span class="label">
                    Discount Price:
                </span>

                $
                <?php echo number_format($discount_price, 2); ?>
            </p>

        </div>

        <a href="index.html" class="back">
            Calculate Another Product
        </a>

    <?php endif; ?>

</div>

</body>

</html>