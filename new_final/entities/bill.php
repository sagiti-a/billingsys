<?php
// Bill entry page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Bill</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f9fafb;
      padding: 2rem;
    }
    input, select {
      padding: 0.5rem;
      width: 100%;
      margin-top: 0.25rem;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }
    table, th, td {
      border: 1px solid #d1d5db;
    }
    th, td {
      padding: 0.5rem;
      text-align: left;
    }
    button {
      margin-top: 1rem;
      padding: 0.5rem 1rem;
      background-color: #10b981;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .flex {
      display: flex;
      gap: 1rem;
    }
  </style>
</head>
<body>

<h2>Create Bill</h2>

<form id="billForm">
  <div class="flex">
    <div>
      <label>Bill Number</label>
      <input type="text" id="billNumber" required>
    </div>
    <div>
      <label>Customer Name</label>
      <input type="text" id="customerName" required>
    </div>
    <div>
      <label>Customer Phone</label>
      <input type="text" id="customerPhone" required>
    </div>
  </div>

  <h3>Items</h3>
  <table id="itemsTable">
    <thead>
      <tr>
        <th>Product Name</th><th>Qty</th><th>Price</th><th>Total</th><th>Action</th>
      </tr>
    </thead>
    <tbody id="itemsBody"></tbody>
  </table>
  <button type="button" onclick="addItemRow()">Add Item</button>

  <div class="flex">
    <div>
      <label>Subtotal</label>
      <input type="number" id="subtotal" readonly>
    </div>
    <div>
      <label>Tax</label>
      <input type="number" id="tax" value="0">
    </div>
    <div>
      <label>Discount</label>
      <input type="number" id="discount" value="0">
    </div>
    <div>
      <label>Total</label>
      <input type="number" id="total" readonly>
    </div>
  </div>

  <div class="flex">
    <div>
      <label>Payment Mode</label>
      <select id="paymentMode">
        <option value="cash">Cash</option>
        <option value="card">Card</option>
        <option value="upi">UPI</option>
        <option value="bank_transfer">Bank Transfer</option>
      </select>
    </div>
    <div>
      <label>Status</label>
      <select id="status">
        <option value="paid">Paid</option>
        <option value="pending">Pending</option>
        <option value="cancelled">Cancelled</option>
      </select>
    </div>
  </div>

  <button type="submit">Submit Bill</button>
</form>

<script>
function addItemRow() {
  const row = document.createElement("tr");
  row.innerHTML = `
    <td><input type="text" class="productName" required></td>
    <td><input type="number" class="quantity" value="1" required></td>
    <td><input type="number" class="price" value="0" required></td>
    <td><input type="number" class="total" readonly></td>
    <td><button type="button" onclick="this.closest('tr').remove(); calculateTotals()">❌</button></td>
  `;
  document.getElementById("itemsBody").appendChild(row);
  row.querySelector(".quantity").addEventListener("input", calculateTotals);
  row.querySelector(".price").addEventListener("input", calculateTotals);
}

function calculateTotals() {
  let subtotal = 0;
  document.querySelectorAll("#itemsBody tr").forEach(row => {
    const qty = parseFloat(row.querySelector(".quantity").value) || 0;
    const price = parseFloat(row.querySelector(".price").value) || 0;
    const total = qty * price;
    row.querySelector(".total").value = total.toFixed(2);
    subtotal += total;
  });
  document.getElementById("subtotal").value = subtotal.toFixed(2);

  const tax = parseFloat(document.getElementById("tax").value) || 0;
  const discount = parseFloat(document.getElementById("discount").value) || 0;
  const total = subtotal + tax - discount;
  document.getElementById("total").value = total.toFixed(2);
}

document.getElementById("tax").addEventListener("input", calculateTotals);
document.getElementById("discount").addEventListener("input", calculateTotals);

document.getElementById("billForm").addEventListener("submit", function(e) {
  e.preventDefault();
  alert("Bill Submitted!");
});
</script>

</body>
</html>
