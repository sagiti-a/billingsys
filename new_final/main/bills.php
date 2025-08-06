<?php
include 'layout.php';
// bills.php

// For demo: Static data (In real app, fetch from database)
$bills = [
    ['billNumber' => 'B001', 'customerName' => 'Aditi Sagpariya', 'date' => '2025-08-01', 'amount' => 1500],
    ['billNumber' => 'B002', 'customerName' => 'Rahul Mehta', 'date' => '2025-08-02', 'amount' => 2200],
    ['billNumber' => 'B003', 'customerName' => 'Kiran Shah', 'date' => '2025-08-03', 'amount' => 1800],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bills</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
    .card { background: #fff; padding: 15px; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.1); margin-bottom: 15px; }
    .search-input { padding: 10px; width: 100%; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; }
    .bill-entry { display: flex; justify-content: space-between; margin-top: 10px; }
    .badge { background: #4CAF50; color: #fff; padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    .button { padding: 10px 20px; background: #4CAF50; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
    .button:hover { background: #45a049; }
    #billForm { display: none; margin-top: 20px; }
  </style>
</head>
<body>

  <h2>All Bills</h2>

  <input type="text" id="searchInput" class="search-input" placeholder="Search by bill number or customer name...">

  <button class="button" onclick="toggleForm()">Create a Bill</button>

  <div id="billForm" class="card">
    <h3>Create New Bill</h3>
    <form action="generate_bill.php" method="POST">
      <input type="text" name="billNumber" placeholder="Bill Number" required><br><br>
      <input type="text" name="customerName" placeholder="Customer Name" required><br><br>
      <input type="date" name="date" required><br><br>
      <input type="number" name="amount" placeholder="Amount" required><br><br>
      <button type="submit" class="button">Save</button>
    </form>
  </div>

  <div id="billsList">
    <?php foreach ($bills as $bill): ?>
      <div class="card bill-entry" data-search="<?= strtolower($bill['billNumber'] . ' ' . $bill['customerName']) ?>">
        <div>
          <strong>#<?= htmlspecialchars($bill['billNumber']) ?></strong><br>
          <?= htmlspecialchars($bill['customerName']) ?><br>
          <?= htmlspecialchars($bill['date']) ?>
        </div>
        <div class="badge">₹<?= htmlspecialchars($bill['amount']) ?></div>
      </div>
    <?php endforeach; ?>
  </div>

  <script>
    const searchInput = document.getElementById('searchInput');
    const bills = document.querySelectorAll('.bill-entry');

    searchInput.addEventListener('input', function () {
      const term = this.value.toLowerCase();
      bills.forEach(bill => {
        const text = bill.getAttribute('data-search');
        bill.style.display = text.includes(term) ? '' : 'none';
      });
    });

    function toggleForm() {
      const form = document.getElementById('billForm');
      form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
  </script>

</body>
</html>
