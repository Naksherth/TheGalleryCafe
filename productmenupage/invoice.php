<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placement - The Gallery Cafe</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Basic styling for the page */
        body {
            font-family: 'Nunito', sans-serif;
            background: #eee;
            margin: 0;
            padding: 0;
        }

        header {
            background: #fff;
            padding: 1rem;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        header img {
            max-height: 50px;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .title {
            text-align: center;
            margin-bottom: 1rem;
            font-size: 2rem;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .text-right {
            text-align: right;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            font-size: 1rem;
            color: #fff;
            background-color: #27ae60;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .button:hover {
            background-color: #219150;
        }

        /* Modal styling */
        /* Modal styling */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    height:900px;
    width: 90%; /* Changed to fit the screen width */
    max-width: 500px; /* Adjust as needed */
    position: relative;
    box-sizing: border-box; /* Ensures padding does not affect the width */
    overflow: hidden; /* Prevents scrolling within modal content */
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}


        .credit-card-form {
            text-align: center;
        }

        .credit-card-form h2 {
            margin-bottom: 20px;
        }

        .credit-card-form .Image1 {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .credit-card-form .form-group {
            margin-bottom: 15px;
        }

        .credit-card-form .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .credit-card-form .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .credit-card-form .form-row {
            display: flex;
            justify-content: space-between;
        }

        .credit-card-form .form-column {
            flex: 1;
            margin-right: 10px;
        }

        .credit-card-form .form-column:last-child {
            margin-right: 0;
        }

        .credit-card-form .click-button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .credit-card-form .click-button:hover {
            background-color: #219150;
        }
        

 /* Parking reservation styling */
 #parkingSection {
            display: none;
            margin-top: 20px;
            text-align: center;
        }

        .parking-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .contain {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            justify-items: center;
        }

        .slot {
            width: 100px;
            height: 100px;
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .slot.booked {
            background-color: #ff9999;
            color: #fff;
            cursor: not-allowed;
        }

        .slot.selected {
            background-color: #87ceeb;
            color: #fff;
        }

        .slot-result {
            display: none;
            margin-top: 10px;
        }

        #rightpanel {
            margin-top: 20px;
        }
         /* Table reservation styling */
         #tableSection {
            display: none;
            margin-top: 20px;
            text-align: center;
        }

        .table-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .table-contain {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            justify-items: center;
        }

        .table-slot {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .table-slot.booked {
            background-color: #ff9999;
            color: #fff;
            cursor: not-allowed;
        }

        .table-slot.selected {
            background-color: #87ceeb;
            color: #fff;
        }

        #rightpanel {
            margin-top: 20px;
        }
    </style>
    <script>
    
        function confirmSelection() {
            const slots = document.querySelectorAll('.slot.selected');
            let bookedSlots = '';
            slots.forEach(slot => {
                slot.classList.add('booked');
                slot.classList.remove('selected');
                slot.textContent = 'Booked';
                bookedSlots += slot.textContent + ' ';
            });
            document.getElementById('selectedSlots').textContent = 'Booked slot(s): ' + bookedSlots;
            document.getElementById('parkingSection').style.display = 'none';
        }

        function confirmTableSelection() {
            const slots = document.querySelectorAll('.table-slot.selected');
            let bookedSlots = '';
            slots.forEach(slot => {
                slot.classList.add('booked');
                slot.classList.remove('selected');
                slot.textContent = 'Booked';
                bookedSlots += slot.textContent + ' ';
            });
            document.getElementById('selectedTableSlots').textContent = 'Booked slot(s): ' + bookedSlots;
            document.getElementById('tableSection').style.display = 'none';
        }

        function reserveParking() {
            document.getElementById('parkingSection').style.display = 'block';
            document.getElementById('tableSection').style.display = 'none';
        }

        function reserveTable() {
            document.getElementById('tableSection').style.display = 'block';
            document.getElementById('parkingSection').style.display = 'none';
        }

        function toggleTableSlotSelection(slot) {
    if (!slot.classList.contains('booked')) {
        slot.classList.toggle('selected');
    }
}



        window.onclick = function(event) {
            if (event.target == document.getElementById('myModal')) {
                closeModal();
            }
        }

        function showLoading(event, button) {
            event.preventDefault();
            button.innerHTML = "Processing Payment...";
            setTimeout(function() {
                button.innerHTML = "Payment completed.";
            }, 2000);
        }

        function buyNow(productId) {
            const preview = document.querySelector(`.products-preview .preview[data-id="${productId}"]`);
            const productName = preview.querySelector('h3').innerText;
            const unitPrice = preview.querySelector('.price').innerText.replace('LKR ', '');
            window.location.href = `invoice.php?product_name=${encodeURIComponent(productName)}&unit_price=${encodeURIComponent(unitPrice)}`;
        }

        document.getElementById('currentDate').textContent = new Date().toLocaleDateString();

        function populateFirstRow() {
            const urlParams = new URLSearchParams(window.location.search);
            const productName = urlParams.get('product_name');
            const unitPrice = parseFloat(urlParams.get('unit_price'));

            if (productName && unitPrice) {
                const row = document.getElementById('firstRow');
                const quantityInput = row.querySelector('.quantity');
                const unitPriceCell = row.querySelector('.unitPrice');
                const totalCell = row.querySelector('.total');
                const removeButton = row.querySelector('button');

                row.querySelector('td').innerHTML = productName;
                quantityInput.disabled = false;
                unitPriceCell.textContent = unitPrice.toFixed(2);
                totalCell.textContent = unitPrice.toFixed(2);
                removeButton.disabled = false;

                updateTotalBill();
            }
        }

        function addNewRow() {
            var tableBody = document.querySelector('#productTable tbody');
            var row = document.createElement('tr');

            row.innerHTML = `
                <td>
                    <select class="productDropdown" onchange="addProduct(this)">
                        <option value="">Select a product</option>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "thegallerycafe";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT id, Name, Price FROM productdetails";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['id']}' data-name='{$row['Name']}' data-price='{$row['Price']}'>{$row['Name']}</option>";
                            }
                        }
                        $conn->close();
                        ?>
                    </select>
                </td>
                <td><input type="number" class="quantity" min="1" value="1" disabled onchange="updateTotal(this)"></td>
                <td class="unitPrice"></td>
                <td class="total"></td>
                <td><button class="button" onclick="removeRow(this)" disabled>Remove</button></td>
            `;
            tableBody.appendChild(row);
        }

        function addProduct(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var productName = selectedOption.getAttribute('data-name');
            var productPrice = parseFloat(selectedOption.getAttribute('data-price'));
            var row = selectElement.closest('tr');
            var quantityInput = row.querySelector('.quantity');
            var unitPriceCell = row.querySelector('.unitPrice');
            var totalCell = row.querySelector('.total');
            var removeButton = row.querySelector('button');

            quantityInput.disabled = false;
            unitPriceCell.textContent = productPrice.toFixed(2);
            totalCell.textContent = productPrice.toFixed(2);
            removeButton.disabled = false;

            updateTotalBill();
        }

        function updateTotal(inputElement) {
            var row = inputElement.closest('tr');
            var unitPrice = parseFloat(row.querySelector('.unitPrice').textContent);
            var quantity = parseInt(inputElement.value);
            var total = unitPrice * quantity;
            row.querySelector('.total').textContent = total.toFixed(2);

            updateTotalBill();
        }

        function updateTotalBill() {
            var totalBill = 0;
            var totalCells = document.querySelectorAll('.total');
            totalCells.forEach(function(cell) {
                totalBill += parseFloat(cell.textContent);
            });
            document.getElementById('totalBill').textContent = 'Total: LKR ' + totalBill.toFixed(2);
        }

        function removeRow(buttonElement) {
            var row = buttonElement.closest('tr');
            row.remove();
            updateTotalBill();
        }
    </script>
</head>
<body>
    <header>
        <img src="path_to_logo.jpg" alt="The Gallery Cafe Logo">
        <h1>The Gallery Cafe</h1>
    </header>

    <div class="container">
        <div class="title">
            Order Placement
        </div>

        <p>Date: <strong id="currentDate"></strong></p>

        <table id="productTable">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr id="firstRow">
                    <td></td>
                    <td><input type='number' class='quantity' value='1' min='1' onchange='updateTotal(this)' disabled></td>
                    <td class='unitPrice'></td>
                    <td class='total text-right'>0.00</td>
                    <td><button onclick='removeProduct(this)' disabled>Remove</button></td>
                </tr>
            </tbody>
        </table>

        <button class="button" onclick="addNewRow()">+</button><br>
        <button class="button" onclick="reserveParking()">Reserve Parking</button>
        <div id="selectedSlots" class="slot-result"></div><br>
        <button class="button" onclick="reserveTable()">Reserve Table</button><br>
        <p>Total Bill: LKR <span id="totalBill">0.00</span></p>
        <button class="button" onclick="openPaymentModal()">Make Payment</button>
    </div>
<!-- Parking Section -->
<div id="parkingSection">
    <p class="parking-title">Select Parking Slot:</p>
    <div class="contain">
        <?php
        for ($i = 1; $i <= 16; $i++) {
            echo "<div class='slot' onclick='toggleSlotSelection(this)'>$i</div>";
        }
        ?>
    </div>            
    <button class="button" onclick="confirmSelection()">Confirm Booking</button>
    <div class="slot-result" id="selectedSlots"></div>
</div>

<!-- Table Section -->
<div id="tableSection">
    <p class="table-title">Select Table Slot:</p>
    <div class="table-contain">
        <?php
        for ($i = 1; $i <= 16; $i++) {
            echo "<div class='table-slot' onclick='toggleTableSlotSelection(this)'>$i</div>";
        }
        ?>
    </div>            
    <div class="slot-result" id="selectedTableSlots">Booked slot(s):</div>
    <button class="button" onclick="confirmTableSelection()">Confirm Selection</button>
</div>




    <!-- The Modal -->
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closePaymentModal()">&times;</span>
            <div class="credit-card-form">
                <h2>PAYMENT PORTAL</h2>
                <img class="Image1" src="https://i.ibb.co/hgJ7z3J/6375aad33dbabc9c424b5713-card-mockup-01.png" alt="Card Mockup" border="0">
                <form>
                    <div class="form-group">
                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" placeholder="Card number">
                    </div>
                    <div class="form-group">
                        <label for="card-holder">Card Holder</label>
                        <input type="text" id="card-holder" placeholder="Card holder's name">
                    </div>
                    <div class="form-row">
                        <div class="form-group form-column">
                            <label for="expiry-date">Expiry Date</label>
                            <input type="text" id="expiry-date" placeholder="MM/YY">
                        </div>
                        <div class="form-group form-column">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" placeholder="CVV">
                        </div>
                    </div>
                    <button type="submit" class="click-button" onclick="showLoading(event, this)">PAY NOW - LKR <span id="payNowTotal">0.00</span></button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Display today's date
        document.getElementById('currentDate').textContent = new Date().toLocaleDateString();

        // Function to populate the first row with URL parameters
        function populateFirstRow() {
            const urlParams = new URLSearchParams(window.location.search);
            const productName = urlParams.get('product_name');
            const unitPrice = parseFloat(urlParams.get('unit_price'));

            if (productName && unitPrice) {
                const row = document.getElementById('firstRow');
                const quantityInput = row.querySelector('.quantity');
                const unitPriceCell = row.querySelector('.unitPrice');
                const totalCell = row.querySelector('.total');
                const removeButton = row.querySelector('button');

                row.querySelector('td').innerHTML = productName;
                quantityInput.disabled = false;
                unitPriceCell.textContent = unitPrice.toFixed(2);
                totalCell.textContent = unitPrice.toFixed(2);
                removeButton.disabled = false;

                // Update total bill
                updateTotalBill();
            }
        }

        // Add a new row to the table
        function addNewRow() {
            var tableBody = document.querySelector('#productTable tbody');
            var row = document.createElement('tr');

            row.innerHTML = `
                <td>
                    <select class="productDropdown" onchange="addProduct(this)">
                        <option value="">Select a product</option>
                        <?php
                        // Database connection (included here for context)
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "thegallerycafe";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT id, Name, Price FROM productdetails";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['id']}' data-name='{$row['Name']}' data-price='{$row['Price']}'>{$row['Name']}</option>";
                            }
                        }
                        $conn->close();
                        ?>
                    </select>
                </td>
                <td><input type='number' class='quantity' value='1' min='1' onchange='updateTotal(this)' disabled></td>
                <td class='unitPrice'></td>
                <td class='total text-right'>0.00</td>
                <td><button onclick='removeProduct(this)' disabled>Remove</button></td>
            `;

            tableBody.appendChild(row);
        }

        // Add product to the selected row
        function addProduct(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var row = selectElement.closest('tr');
            var quantityInput = row.querySelector('.quantity');
            var unitPriceCell = row.querySelector('.unitPrice');
            var totalCell = row.querySelector('.total');
            var removeButton = row.querySelector('button');

            if (selectedOption.value !== "") {
                quantityInput.value = 1;
                quantityInput.disabled = false;
                unitPriceCell.textContent = selectedOption.getAttribute('data-price');
                totalCell.textContent = (parseFloat(selectedOption.getAttribute('data-price')) * 1).toFixed(2);
                removeButton.disabled = false;

                selectElement.style.display = 'none';
                row.querySelector('td').insertAdjacentHTML('afterbegin', selectedOption.getAttribute('data-name'));
            }
        }

        // Update total when quantity changes
        function updateTotal(input) {
            var row = input.closest('tr');
            var unitPrice = parseFloat(row.querySelector('.unitPrice').textContent);
            var quantity = parseInt(input.value);
            var total = unitPrice * quantity;
            row.querySelector('.total').textContent = total.toFixed(2);
            updateTotalBill();
        }

        // Update total bill
        function updateTotalBill() {
            var rows = document.querySelectorAll('#productTable tbody tr');
            var totalBill = 0;

            rows.forEach(function(row) {
                var rowTotal = parseFloat(row.querySelector('.total').textContent);
                totalBill += rowTotal;
            });

            document.getElementById('totalBill').textContent = totalBill.toFixed(2);
        }

        // Remove product from table
        function removeProduct(button) {
            var row = button.closest('tr');
            row.querySelector('.productDropdown').style.display = 'inline';
            row.querySelector('.quantity').disabled = true;
            row.querySelector('.quantity').value = 1;
            row.querySelector('.unitPrice').textContent = '';
            row.querySelector('.total').textContent = '0.00';
            button.disabled = true;
            row.querySelector('select').value = '';
            row.querySelector('select').style.display = 'inline';
            updateTotalBill();
        }

        // Open payment modal
        function openPaymentModal() {
            var totalBill = document.getElementById('totalBill').textContent;
            document.getElementById('payNowTotal').textContent = totalBill;
            document.getElementById('paymentModal').style.display = 'block';
        }

        // Close payment modal
        function closePaymentModal() {
            document.getElementById('paymentModal').style.display = 'none';
        }

        // Show loading on submit
        function showLoading(event, button) {
            event.preventDefault(); // Prevent form submission
            button.textContent = 'Processing...';
            button.disabled = true;
            // Here you can add the logic to handle the form submission
        }

        // Populate the first row with product details from URL parameters
        populateFirstRow();
        function openModal() {
            document.getElementById('myModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        function payNow() {
            alert('Payment successful!');
            closeModal();
        }
   
    </script>
</body>
</html>
