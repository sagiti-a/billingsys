<?php
// PHP file for rendering a customer form modal (Add/Edit)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Form</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      background: #f3f4f6;
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
      max-width: 500px;
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
      background-color: #3b82f6;
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
<button onclick="openModal()">➕ Add Customer</button>

<!-- Modal -->
<div id="customerModal" class="modal">
  <div class="modal-content">
    <h2>Customer Form</h2>
    <form id="customerForm">
      <label>Name
        <input type="text" id="name" required>
      </label>
      <label>Phone
        <input type="tel" id="phone" required>
      </label>
      <label>Email
        <input type="email" id="email">
      </label>
      <label>Address
        <textarea id="address" rows="3"></textarea>
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
  document.getElementById("customerModal").style.display = "flex";
}

function closeModal() {
  document.getElementById("customerModal").style.display = "none";
  document.getElementById("customerForm").reset();
}

document.getElementById("customerForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const customer = {
    name: document.getElementById("name").value,
    phone: document.getElementById("phone").value,
    email: document.getElementById("email").value,
    address: document.getElementById("address").value,
    status: document.getElementById("status").value
  };
  alert("Customer saved!\n\n" + JSON.stringify(customer, null, 2));
  closeModal();
});
</script>

</body>
</html>
