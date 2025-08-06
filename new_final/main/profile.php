<?php
include 'layout.php';

//session_start();

// Mock current user (in real app, load from session or DB)
$currentUser = [
  "firstName" => "Aditi",
  "lastName" => "Sagpariya",
  "email" => "aditi.sagparia@gmail.com"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <style>
    body {
      font-family: sans-serif;
      padding: 2rem;
      background: #f9fafb;
    }
    .card {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      max-width: 500px;
      margin: auto;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .card h2 {
      margin-bottom: 1rem;
    }
    label {
      display: block;
      margin-top: 1rem;
      font-weight: bold;
    }
    input {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.25rem;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .buttons {
      margin-top: 1.5rem;
      display: flex;
      justify-content: space-between;
    }
    button {
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }
    .save-btn {
      background: #2563eb;
      color: white;
    }
    .logout-btn {
      background: #ef4444;
      color: white;
    }
  </style>
</head>
<body>

<div class="card">
  <h2>👤 User Profile</h2>
  <form id="profileForm">
    <label for="firstName">First Name</label>
    <input type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($currentUser['firstName']) ?>" required>

    <label for="lastName">Last Name</label>
    <input type="text" id="lastName" name="lastName" value="<?= htmlspecialchars($currentUser['lastName']) ?>" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($currentUser['email']) ?>" required>

    <div class="buttons">
      <button type="button" class="save-btn" onclick="saveProfile()">💾 Save</button>
      <button type="button" class="logout-btn" onclick="logout()">🚪 Logout</button>
    </div>
  </form>
</div>

<script>
function saveProfile() {
  const form = document.getElementById('profileForm');
  const data = {
    firstName: form.firstName.value,
    lastName: form.lastName.value,
    email: form.email.value
  };

  // Simulate save
  alert("Profile saved!\n" + JSON.stringify(data, null, 2));
}

function logout() {
  // In real app, send POST to logout or redirect to logout.php
  alert("Logging out...");
  window.location.href = "logout.php";
}
</script>

</body>
</html>
