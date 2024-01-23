<?php
        include"database.php";

        if (isset($_POST['search'])) {
            $searchModel = $_POST["model"];
            $searchLocation = $_POST["location"];
        
            $sql = "SELECT * FROM car WHERE model LIKE '%$searchModel%' AND location LIKE '%$searchLocation%'";
            
            $result = mysqli_query($con, $sql);
            if (!$result) {
                die("Query execution failed: " . mysqli_error($con));
            }
                if (mysqli_num_rows($result) > 0) {
                    echo "<h2>Search Results:</h2>";
                    echo "<ul>";
        
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li>";
                        echo "Model: " . $row["model"] . "<br>";
                        echo "Location: " . $row["location"] . "<br>";
                        echo "</li>";
                    }
        
                    echo "</ul>";
                } else {
                    echo "<p>No results found.</p>";
                }
            }
            ?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Search Form</h1>
    <form action="search.php" method="POST">
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" placeholder="Enter model" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" placeholder="Enter location" required>

        <input type="submit" name="search" value="Search">
    </form>
</body>
</html>
