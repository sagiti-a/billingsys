<?php
// Product entry page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f9fafb;
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
    input, textarea, select {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.25rem;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    button {
      margin-top: 1.5rem;
      padding: 0.75rem 1.5rem;
      background-color: #10b981;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<h2 style="text-align:center;">Add Product</h2>

<form id="productForm">
  <label for="name">Product Name *</label>
  <input type="text" id="name" required>

  <label for="category">Category</label>
  <input type="text" id="category">

  <label for="price">Price *</label>
  <input type="number" step="0.01" id="price" required>

  <label for="cost">Cost</label>
  <input type="number" step="0.01" id="cost">

  <label for="stock">Stock *</label>
  <input type="number" id="stock" required>

  <label for="minStock">Minimum Stock</label>
  <input type="number" id="minStock" value="5">

  <label for="description">Description</label>
  <textarea id="description" rows="3"></textarea>


  <button type="submit">Submit Product</button>
</form>

<script>
document.getElementById("productForm").addEventListener("submit", function(e) {
  e.preventDefault();
  alert("Product submitted!");
});
</script>

</body>
</html>
