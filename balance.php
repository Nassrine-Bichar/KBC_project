<!DOCTYPE html>
<html>
<head>
    <title>Balance Page</title>
</head>
<body>
    <h1>Balance Page</h1>
    <?php
    if (isset($_GET['founds'])) {
        $founds = $_GET['founds'];
        echo "<p>Your funds: " . $founds . "</p>";
    } else {
        // If the funds parameter is not set, redirect back to the login page
        header("Location: login.php");
        exit();
    }
    ?>
    <!-- You can display other balance information here -->
</body>
</html>
