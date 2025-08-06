<?php
include 'layout.php';

// customer.php

$customers = [
  ['name' => 'Aditi Sagpariya', 'phone' => '9876543210', 'email' => 'aditi@example.com', 'address' => 'Rajkot', 'createdAt' => '2025-07-01'],
  ['name' => 'Rahul Mehta', 'phone' => '9823456789', 'email' => 'rahul@example.com', 'address' => 'Ahmedabad', 'createdAt' => '2025-07-05'],
  ['name' => 'Kiran Shah', 'phone' => '9812345678', 'email' => 'kiran@example.com', 'address' => 'Surat', 'createdAt' => '2025-07-10'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customers</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f4f4f4; }
    .card { background: #fff; padding: 15px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); margin-bottom: 15px; }
    .search-sort { margin-bottom: 20px; display: flex; justify-content: space-between; gap: 10px; }
    input, select { padding: 8px; border: 1px solid #ccc; border-radius: 5px; }
    .button { padding: 8px 16px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
    .button:hover { background-color: #45a049; }
    .badge { background: #ddd; padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    .form-container { display: none; margin-top: 20px; }
  </style>
</head>
<body>

  <h2>Customers</h2>

  <div class="search-sort">
    <input type="text" id="searchInput" placeholder="Search by name, phone, or email...">
    <select id="sortSelect">
      <option value="name">Sort by Name</option>
      <option value="date">Sort by Date</option>
    </select>
    <button class="button" onclick="toggleForm()">Add Customer</button>
  </div>

  <div id="formSection" class="form-container card">
    <h3>Add New Customer</h3>
    <form action="save_customer.php" method="POST">
      <input type="text" name="name" placeholder="Name" required><br><br>
      <input type="text" name="phone" placeholder="Phone" required><br><br>
      <input type="email" name="email" placeholder="Email"><br><br>
      <input type="text" name="address" placeholder="Address"><br><br>
      <button type="submit" class="button">Save</button>
    </form>
  </div>

  <div id="customerList">
    <?php foreach ($customers as $customer): ?>
      <div class="card customer-card"
           data-name="<?= strtolower($customer['name']) ?>"
           data-phone="<?= $customer['phone'] ?>"
           data-email="<?= strtolower($customer['email']) ?>"
           data-date="<?= $customer['createdAt'] ?>">
        <strong><?= htmlspecialchars($customer['name']) ?></strong><br>
        📞 <?= htmlspecialchars($customer['phone']) ?><br>
        📧 <?= htmlspecialchars($customer['email']) ?><br>
        📍 <?= htmlspecialchars($customer['address']) ?><br>
        <span class="badge">Joined: <?= htmlspecialchars($customer['createdAt']) ?></span>
      </div>
    <?php endforeach; ?>
  </div>

  <script>
    const searchInput = document.getElementById("searchInput");
    const sortSelect = document.getElementById("sortSelect");
    const cards = document.querySelectorAll(".customer-card");

    function filterAndSort() {
      const term = searchInput.value.toLowerCase();
      const sortBy = sortSelect.value;

      const sortedCards = Array.from(cards).sort((a, b) => {
        if (sortBy === "name") {
          return a.dataset.name.localeCompare(b.dataset.name);
        } else {
          return new Date(b.dataset.date) - new Date(a.dataset.date);
        }
      });

      sortedCards.forEach(card => {
        const match = card.dataset.name.includes(term) ||
                      card.dataset.phone.includes(term) ||
                      card.dataset.email.includes(term);
        card.style.display = match ? "block" : "none";
        card.parentElement.appendChild(card); // reorder DOM
      });
    }

    searchInput.addEventListener("input", filterAndSort);
    sortSelect.addEventListener("change", filterAndSort);

    function toggleForm() {
      const form = document.getElementById("formSection");
      form.style.display = form.style.display === "none" ? "block" : "none";
    }

    // Show cards sorted initially
    filterAndSort();
  </script>

</body>
</html>
