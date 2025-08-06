<?php
// Customer entry page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Customer</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f0f4f8;
      padding: 2rem;
    }
    form {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 0 10px #ccc;
    }
    label {
      display: block;
      margin-top: 1rem;
      font-weight: bold;
    }
    input, select {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.25rem;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    button {
      margin-top: 1.5rem;
      padding: 0.75rem 1.5rem;
      background-color: #3b82f6;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<h2 style="text-align:center;">Add Customer</h2>

<form id="customerForm">
  <label for="name">Customer Name *</label>
  <input type="text" id="name" required>

  <label for="phone">Phone Number *</label>
  <input type="text" id="phone" required>

  <label for="email">Email</label>
  <input type="email" id="email">

  <label for="address">Address</label>
  <input type="text" id="address">

  <label for="totalPurchases">Total Purchases</label>
  <input type="number" id="totalPurchases" value="0">

  <label for="lastPurchase">Last Purchase Date</label>
  <input type="date" id="lastPurchase">

  <label for="status">Status</label>
  <select id="status">
    <option value="active" selected>Active</option>
    <option value="inactive">Inactive</option>
  </select>

  <button type="submit">Submit Customer</button>
</form>

<script>
document.getElementById("customerForm").addEventListener("submit", function(e) {
  e.preventDefault();
  alert("Customer submitted!");
});
</script>

</body>
</html>
