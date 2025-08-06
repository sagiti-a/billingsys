<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Form</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f3f4f6;
      margin: 0;
      padding: 2rem;
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background-color: #fff;
      padding: 2rem;
      border-radius: 8px;
      width: 90%;
      max-width: 600px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    label {
      display: block;
      margin-top: 1rem;
    }
    input, textarea, select {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.25rem;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .btn {
      padding: 0.5rem 1rem;
      margin-top: 1.5rem;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .btn-primary {
      background-color: #10b981;
      color: white;
    }
    .btn-secondary {
      background-color: #9ca3af;
      color: white;
      margin-left: 1rem;
    }
  </style>
</head>
<body>

<!-- Trigger Button -->
<button onclick="openModal()">➕ Add Product</button>

<!-- Modal -->
<div id="productModal" class="modal">
  <div class="modal-content">
    <h2>Product Form</h2>
    <form id="productForm">
      <label>Name
        <input type="text" id="name" required>
      </label>
      <label>SKU
        <input type="text" id="sku" required>
      </label>
      <label>Category
        <input type="text" id="category">
      </label>
      <label>Price
        <input type="number" id="price" required>
      </label>
      <label>Cost
        <input type="number" id="cost" required>
      </label>
      <label>Stock
        <input type="number" id="stock">
      </label>
      <label>Min Stock
        <input type="number" id="minStock" value="5">
      </label>
      <label>Description
        <textarea id="description" rows="3"></textarea>
      </label>
      <label>Supplier
        <input type="text" id="supplier">
      </label>
      <label>Status
        <select id="status">
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </label>
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
    </form>
  </div>
</div>

<script>
function openModal() {
  document.getElementById("productModal").style.display = "flex";
}

function closeModal() {
  document.getElementById("productModal").style.display = "none";
  document.getElementById("productForm").reset();
}

document.getElementById("productForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const product = {
    name: document.getElementById("name").value,
    sku: document.getElementById("sku").value,
    category: document.getElementById("category").value,
    price: document.getElementById("price").value,
    cost: document.getElementById("cost").value,
    stock: document.getElementById("stock").value,
    minStock: document.getElementById("minStock").value,
    description: document.getElementById("description").value,
    supplier: document.getElementById("supplier").value,
    status: document.getElementById("status").value
  };
  alert("Product saved!\n\n" + JSON.stringify(product, null, 2));
  closeModal();
});
</script>

</body>
</html>
