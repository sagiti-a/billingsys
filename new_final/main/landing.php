<?php
include 'layout.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Landing Page</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f9fafb;
      margin: 0;
      padding: 0;
    }
    .header {
      background: #fff;
      padding: 1rem;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .container {
      padding: 2rem;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1rem;
    }
    .card {
      background: white;
      padding: 1rem;
      border-left: 4px solid;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .blue { border-color: #3b82f6; }
    .green { border-color: #10b981; }
    .purple { border-color: #8b5cf6; }
    .btn {
      display: inline-block;
      margin-top: 1rem;
      padding: 0.5rem 1rem;
      background: #374151;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .btn:hover {
      background: #111827;
    }
  </style>
</head>
<body>

  <div class="header">
    <h1>Welcome to Our Platform</h1>
  </div>

<div class="container">
  <div class="card blue">
        <div class="icon" style="font-size: 2rem;">📦</div>
        <h3>Smart Inventory</h3>
        <p>Track stock levels, set alerts, and manage products with intelligent automation.</p>
        <button class="btn"><a href='products.php' style="color: white;">Learn More</a></button>
  </div>
  <div class="card green">
        <div class="icon" style="font-size: 2rem;">🧾</div>
        <h3>Quick Billing</h3>
        <p>Generate professional bills instantly with multiple payment options and tax calculations.</p>
        <button class="btn"><a href='bills.php' style="color: white;">Learn More</a></button>
  </div>
  <div class="card purple">
        <div class="icon" style="font-size: 2rem;">👥</div>
        <h3>Customer Management</h3>
        <p>Build lasting relationships with customer history and preferences tracking.</p>
        <button class="btn"><a href='customer.php' style="color: white;">Learn More</a></button>
  </div>
</div>
</body>
</html>
