<?php
session_start();
$isLoggedIn = true; // Set this based on your auth logic
$currentUser = [
  "name" => "Aditi Sagpariya",
  "email" => "aditi@example.com"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Layout</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      background: #f9fafb;
      transition: background 0.3s, color 0.3s;
    }
    .dark-mode {
      background: #111827;
      color: #f9fafb;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem;
      background: #fff;
      border-bottom: 1px solid #ddd;
    }
    .dark-mode .header {
      background: #1f2937;
      border-color: #333;
    }
    .menu {
      display: flex;
      gap: 1rem;
    }
    .mobile-toggle {
      display: none;
      cursor: pointer;
    }
    .menu a {
      text-decoration: none;
      color: inherit;
    }
    .btn {
      background: #374151;
      color: white;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .btn:hover {
      background: #111827;
    }
    @media (max-width: 768px) {
      .menu {
        display: none;
        flex-direction: column;
      }
      .menu.open {
        display: flex;
      }
      .mobile-toggle {
        display: block;
      }
    }
  </style>
</head>
<body>

<div class="header">
  <div>
    <strong> <span>Welcome, <?= $currentUser['name'] ?></span></strong>
    <span class="mobile-toggle" onclick="toggleMenu()">📱</span>
  </div>
  <div class="menu" id="menu">
    <a href="landing.php">🏠 Home</a>
    <a href="products.php">📦 Products</a>
    <a href="bills.php">🧾 Bills</a>
    <a href="profile.php">👤 Profile</a>  
    <a href="login.php">👋 Logout</a>
    
    <?php if ($isLoggedIn): ?>
      
      <!-- <button class="btn" <a href="login.php"></a>>Logout</button> -->
    <?php else: ?>
      <a href="login.php" class="btn">Login</a>
    <?php endif; ?>
    <button class="btn" onclick="toggleDarkMode()">🌞/🌙</button>
  </div>
</div>


<script>
  function toggleMenu() {
    const menu = document.getElementById('menu');
    menu.classList.toggle('open');
  }

  function toggleDarkMode() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
  }

  // function logout() {
  //   alert("Logging out...");
  //   <a href="login.php"></a>
  //   // In a real app, trigger PHP logout here
  //   window.location.href = "logout.php";
  // }

  // Persist dark mode on reload
  if (localStorage.getItem('darkMode') === 'true') {
    document.body.classList.add('dark-mode');
  }
</script>

</body>
</html>
