
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customer_data";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);
setcookie('founds',time() + 3600);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the submitted username and password from the form
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the user exists in the database
    $sql = "select * from `customer_data` where username = '$username' and password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $founds = $row["founds"];
      header("Location: balance.php?founds=" . urlencode($founds));
        exit();
    } else {
        // User doesn't exist, show an error message
        echo "Incorrect username or password. Please try again.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="fonts.css" />
    <title>Login Page</title>
    <style>
      body {
        font-family: Roboto, sans-serif;
        background-image: url(Images/blurry.webp);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        backdrop-filter: blur(8px);
      }

      .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 90%;
        height: 300px;
      }

      .login-container h2 {
        color: rgb(0, 204, 255);
        margin-bottom: 20px;
      }

      .login-form {
        display: flex;
        flex-direction: column;
      }

      .login-input {
        padding: 10px;
        border: 1px solid rgb(0, 204, 255);
        border-radius: 4px;
        margin-bottom: 10px;
        font-size: 16px;
      }

      .login-btn {
        background-color: rgb(0, 204, 255);
        color: #fff;
        padding: 12px;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .login-btn:hover {
        background-color: #00b3e6;
      }
      #password{
        padding-right: 295px;
        margin-bottom: 20px;
      }
      #show-password{
        margin-bottom: 20px;
      }
    </style>
  </head>
  <body>
    <div class="login-container">
      <h2>Login</h2>
      <form class="login-form" action="login.php" method="post">
        <input
          type="text"
          class="login-input"
          name="username"
          placeholder="Username"
          required
        />
        <div class="show-password-container">
          <input type="password" class="login-input" name="password" id="password" placeholder="Password" required>
          <input type="checkbox" id="show-password">
          <label for="show-password">Show Password</label>
      </div>
        <button type="submit" class="login-btn">Login</button>
      </form>
    </div>
    <!-- 
-------my js--------- -->
<script>
  const showPasswordCheckbox = document.getElementById('show-password');
  const passwordInput = document.getElementById('password');

  showPasswordCheckbox.addEventListener('change', function () {
      passwordInput.type = this.checked ? 'text' : 'password';
  });
</script>
  </body>
</html>
