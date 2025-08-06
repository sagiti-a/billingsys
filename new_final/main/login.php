<?php
// login.php
session_start();

// Admin credentials
$adminUsers = [
    ['email' => 'aditi.sagparia@gmail.com', 'password' => 'a123'],
    ['email' => 'zeelshah430@gmail.com', 'password' => 'z123']
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $isValid = false;

    foreach ($adminUsers as $admin) {
        if ($admin['email'] === $email && $admin['password'] === $password) {
            $isValid = true;
            break;
        }
    }

    if ($isValid) {
        $_SESSION['admin'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Only access to admin";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <style>
    body {
      background: linear-gradient(to right, #e0eafc, #cfdef3);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }

    .card {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    .card h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .input-group {
      margin-bottom: 15px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #aaa;
      border-radius: 5px;
    }

    .error {
      background-color: #ffdddd;
      color: #c00;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
    }

    .button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<div class="card">
  <h2>Admin Login</h2>

  <?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>
    </div>

    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
    </div>

    <button type="submit" class="button">Login</button>
  </form>
</div>

</body>
</html>
