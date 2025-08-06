<?php
// Mock data for customers and products
$customers = [
  ["id" => "1", "name" => "Alice Smith"],
  ["id" => "2", "name" => "Bob Johnson"],
  ["id" => "3", "name" => "Charlie Brown"]
];

$products = [
  ["id" => "p1", "name" => "Product A", "price" => 100],
  ["id" => "p2", "name" => "Product B", "price" => 150],
  ["id" => "p3", "name" => "Product C", "price" => 200]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Bill</title>
  <style>
    body {
      font-family: sans-serif;
      padding: 2rem;
      background: #f3f4f6;
    }
    .card {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      max-width: 900px;
      margin: auto;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    h2 {
      margin-bottom: 1rem;
    }
    label {
      display: block;
      margin-top: 1rem;
      font-weight: bold;
    }
    select, input {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.25rem;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    table {
      width: 100%;
      margin-top: 1rem;
      border-collapse: collapse;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 0.5rem;
      text-align: center;
    }
    .add-btn, .remove-btn, .submit-btn {
      margin-top: 1rem;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }
    .add-btn {
      background-color: #10b981;
      color: white;
    }
    .remove-btn {
      background-color: #ef4444;
      color: white;
    }
    .submit-btn {
      background-color: #3b82f6;
      color: white;
      float: right;
    }
  </style>
</head>
<body>

<div class="card">
  <h2>Create Bill 🧾</h2>
  <label for="customer">Customer</label>
  <select id="customer" required>
    <option value="">Select customer</option>
    <?php foreach ($customers as $customer): ?>
      <option value="<?= $customer['id'] ?>"><?= htmlspecialchars($customer['name']) ?></option>
    <?php endforeach; ?>
  </select>

  <table id="itemsTable">
    <thead>
      <tr>
        <th>Product</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>

  <button class="add-btn" onclick="addItem()">➕ Add Item</button>
  <h3>Total: ₹<span id="grandTotal">0</span></h3>
  <button class="submit-btn" onclick="submitBill()">✅ Submit</button>
</div>

<script>
const products = <?php echo json_encode($products); ?>;

function addItem() {
  const row = document.createElement("tr");
  const productOptions = products.map(p => 
    `<option value="\${p.id}" data-price="\${p.price}">\${p.name}</option>`
  ).join("");

  row.innerHTML = `
    <td>
      <select onchange="updatePrice(this)">
        <option value="">Select</option>
        ${products.map(p => `<option value="${p['id']}" data-price="${p['price']}">${p['name']}</option>`).join('')}
      </select>
    </td>
    <td><input type="number" value="1" min="1" onchange="updateTotal(this)"></td>
    <td><input type="number" value="0" readonly></td>
    <td><span>0</span></td>
    <td><button class="remove-btn" onclick="removeRow(this)">🗑️</button></td>
  `;
  document.querySelector("#itemsTable tbody").appendChild(row);
  updateGrandTotal();
}

function updatePrice(selectEl) {
  const price = parseFloat(selectEl.selectedOptions[0].dataset.price || 0);
  const row = selectEl.closest("tr");
  row.children[2].children[0].value = price;
  updateTotal(row.children[1].children[0]);
}

function updateTotal(qtyInput) {
  const row = qtyInput.closest("tr");
  const quantity = parseFloat(qtyInput.value || 1);
  const price = parseFloat(row.children[2].children[0].value || 0);
  const total = quantity * price;
  row.children[3].children[0].textContent = total.toFixed(2);
  updateGrandTotal();
}

function updateGrandTotal() {
  let total = 0;
  document.querySelectorAll("#itemsTable tbody tr").forEach(row => {
    total += parseFloat(row.children[3].children[0].textContent);
  });
  document.getElementById("grandTotal").textContent = total.toFixed(2);
}

function removeRow(btn) {
  btn.closest("tr").remove();
  updateGrandTotal();
}

function submitBill() {
  const customer = document.getElementById("customer").value;
  if (!customer) return alert("Please select a customer.");

  const items = [];
  document.querySelectorAll("#itemsTable tbody tr").forEach(row => {
    const product = row.children[0].children[0].value;
    const qty = parseFloat(row.children[1].children[0].value);
    const price = parseFloat(row.children[2].children[0].value);
    const total = qty * price;
    if (product) {
      items.push({ product, qty, price, total });
    }
  });

  if (items.length === 0) return alert("Please add at least one item.");

  alert("Bill submitted!\n\n" + JSON.stringify({ customer, items }, null, 2));
}
</script>

</body>
</html>
