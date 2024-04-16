<?php

session_start();
ob_start(); // Start output buffering

// Your PHP code for generating HTML content goes here

$html = ob_get_clean(); // Get the buffered output and clean (end) the buffer

// Remove the image with alt attribute 'www.000webhost.com' from the HTML
$html = preg_replace('/<img[^>]+alt=["\']www\.000webhost\.com["\'][^>]*>/', '', $html);

// Output the modified HTML
echo $html;


// Define the correct username and password
$admin_username = "snovn";
$admin_password = "snovn292973";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($username === $admin_username && $password === $admin_password) {
    // Redirect to the admin page if the username and password are correct
    $_SESSION["authenticated"] = true;
    header("Location: dash");
    exit;
  } else {
    // Display an error message if the username or password is incorrect
    $error = "Incorrect username or password. Please try again.";
	echo '<script src="script.js"></script>';
  }
}

echo '<script src="script.js"></script>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<script src="script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login - dashboard</title>
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
</head>
<body>
<div class="container">
    <div class="box2">
        <div class="box-content2">
            <h1>Login to Dashboard</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username"/><br/>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password"/><br/>
                    <button type="submit" class="button"><i class="fa-solid fa-user"></i>Submit.</button>
                </div>
            </form>
              <?php if(isset($error)) { ?>
				<script>alert("<?php echo $error; ?>");</script>
			  <?php } ?>
            <img src="/assets/img/login.png" alt="uwu"/>
        </div>
    </div>
</div>
<script src="/handler/script.js"></script>
<script src="/assets/js/login.js"></script>
</body>
</html>
