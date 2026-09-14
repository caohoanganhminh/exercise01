<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Future Value Calculator</title>

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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Future Value Calculator</h1>

    <form action="display_results.php" method="post">

        <div class="form-group">

            <label for="investment">
                Investment Amount:
            </label>

            <input
                type="number"
                id="investment"
                name="investment"
                step="0.01"
                min="0"
                required
            >

        </div>


        <div class="form-group">

            <label for="interest_rate">
                Interest Rate:
            </label>

            <input
                type="number"
                id="interest_rate"
                name="interest_rate"
                step="0.01"
                min="0"
                required
            >

        </div>


        <div class="form-group">

            <label for="years">
                Number of Years:
            </label>

            <input
                type="number"
                id="years"
                name="years"
                min="1"
                required
            >

        </div>


        <input type="submit" value="Calculate">

    </form>

</div>

</body>

</html>