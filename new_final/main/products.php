<?php
include 'layout.php';
//session_start();

// Sample product list
$products = [
  ["id" => 1, "name" => "Apple iPhone", "stock" => 10],
  ["id" => 2, "name" => "Samsung Galaxy", "stock" => 0],
  ["id" => 3, "name" => "Google Pixel", "stock" => 5],
  ["id" => 4, "name" => "OnePlus Nord", "stock" => 0],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Products</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 1rem;
      background: #f4f4f4;
    }
    h1 {
      margin-bottom: 1rem;
    }
    .search-filter {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .product-card {
      background: white;
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 0.5rem;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    .product-card.out-of-stock {
      opacity: 0.5;
    }
    .actions {
      margin-top: 0.5rem;
    }
    .actions button {
      margin-right: 0.5rem;
    }
    .badge {
      padding: 2px 8px;
      border-radius: 4px;
      font-size: 0.8rem;
      background: #eee;
    }
    .in-stock {
      color: green;
    }
    .out-stock {
      color: red;
    }
  </style>
</head>
<body>

<h1>📦 Product List</h1>

<div class="search-filter">
  <input type="text" id="searchInput" placeholder="Search products..." oninput="filterProducts()" />
  <select id="stockFilter" onchange="filterProducts()">
    <option value="all">All</option>
    <option value="in-stock">In Stock</option>
    <option value="out-of-stock">Out of Stock</option>
  </select>
  <button><a href='pro.php' onclick="openModal()">➕ Add Product</a></button>
</div>

<div id="productList">
  <?php foreach ($products as $product): ?>
    <div class="product-card <?= $product['stock'] === 0 ? 'out-of-stock' : '' ?>" 
         data-name="<?= strtolower($product['name']) ?>" 
         data-stock="<?= $product['stock'] === 0 ? 'out-of-stock' : 'in-stock' ?>">
      <strong><?= htmlspecialchars($product['name']) ?></strong>
      <span class="badge <?= $product['stock'] === 0 ? 'out-stock' : 'in-stock' ?>">
        <?= $product['stock'] === 0 ? 'Out of Stock' : 'In Stock' ?>
      </span>
      <div class="actions">
        <button onclick="editProduct(<?= $product['id'] ?>)">✏️ Edit</button>
        <button onclick="deleteProduct(<?= $product['id'] ?>)">🗑️ Delete</button>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script>
function filterProducts() {
  const search = document.getElementById("searchInput").value.toLowerCase();
  const filter = document.getElementById("stockFilter").value;
  const cards = document.querySelectorAll(".product-card");

  cards.forEach(card => {
    const name = card.dataset.name;
    const stock = card.dataset.stock;
    const matchesSearch = name.includes(search);
    const matchesStock = filter === "all" || stock === filter;

    card.style.display = matchesSearch && matchesStock ? "block" : "none";
  });
}

function editProduct(id) {
  alert("Edit product ID: " + id);
}

function deleteProduct(id) {
  if (confirm("Are you sure you want to delete this product?")) {
    alert("Deleted product ID: " + id);
  }
}

// function openForm() {
//   alert("Open product form (not implemented)");
// }
</script>

</body>
</html>
