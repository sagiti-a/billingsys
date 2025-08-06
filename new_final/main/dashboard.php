<?php
include 'layout.php';

// dashboard.php

$totalProducts = 15;
$totalBills = 34;
$totalRevenue = 45000;
$monthlyRevenue = 12500;

$recentBills = [
  ['billNumber' => 'B001', 'customerName' => 'Aditi Sagpariya', 'date' => '2025-08-01', 'total' => 1500],
  ['billNumber' => 'B002', 'customerName' => 'Rahul Mehta', 'date' => '2025-08-02', 'total' => 2200],
  ['billNumber' => 'B003', 'customerName' => 'Kiran Shah', 'date' => '2025-08-03', 'total' => 1800],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
    h2 { margin-bottom: 20px; }
    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .card h3 { margin: 0 0 10px; font-size: 18px; }
    .stat { font-size: 24px; font-weight: bold; color: #4CAF50; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; border-radius: 10px; overflow: hidden; }
    th, td { padding: 12px 16px; border-bottom: 1px solid #eee; text-align: left; }
    th { background-color: #f9f9f9; }
  </style>
</head>
<body>

  <h2>Dashboard Overview</h2>

  <div class="grid">
    <div class="card">
      <h3>Total Products</h3>
      <div class="stat"><?= $totalProducts ?></div>
    </div>
    <div class="card">
      <h3>Total Bills</h3>
      <div class="stat"><?= $totalBills ?></div>
    </div>
    <div class="card">
      <h3>Total Revenue</h3>
      <div class="stat">₹<?= $totalRevenue ?></div>
    </div>
    <div class="card">
      <h3>Monthly Revenue</h3>
      <div class="stat">₹<?= $monthlyRevenue ?></div>
    </div>
  </div>

  <h2>Recent Bills</h2>
  <table>
    <thead>
      <tr>
        <th>Bill Number</th>
        <th>Customer</th>
        <th>Date</th>
        <th>Total (₹)</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($recentBills as $bill): ?>
        <tr>
          <td><?= htmlspecialchars($bill['billNumber']) ?></td>
          <td><?= htmlspecialchars($bill['customerName']) ?></td>
          <td><?= htmlspecialchars($bill['date']) ?></td>
          <td><?= htmlspecialchars($bill['total']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>
