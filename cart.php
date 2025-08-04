<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
            background-color: #f4f4f4;
        }

        .cart-container {
            max-width: 700px;
            margin: auto;
            background-color: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid #eee;
        }

        .item-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex: 1;
        }

        .item-info img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .item-details {
            display: flex;
            flex-direction: column;
        }

        .item-details span.name {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .item-details span.price {
            color: #777;
            font-size: 0.95rem;
            margin-top: 4px;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .qty-btn {
            width: 30px;
            height: 30px;
            border: none;
            background-color: #ccc;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
        }

        .quantity-input {
            width: 40px;
            text-align: center;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .checkout-btn {
            display: block;
            width: 100%;
            padding: 0.8rem;
            margin-top: 2rem;
            background-color: #28a745;
            color: #fff;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .checkout-btn:hover {
            background-color: #218838;
        }

        .total-amount {
            text-align: right;
            margin-top: 1.5rem;
            font-size: 1.2rem;
            font-weight: bold;
            color: #444;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<div class="cart-container">
    <h2>Your Shopping Cart</h2>

    <?php
    session_start();
    include 'conn.php';

    if (!isset($_SESSION['email'])) {
        echo "<p>Please log in to view your cart.</p>";
        exit;
    }

    $email = $_SESSION['email'];
    $query = "SELECT * FROM cart WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo '<form method="POST" action="checkout.php" id="cart-form">';
        while ($row = mysqli_fetch_assoc($result)) {
            $id = htmlspecialchars($row["id"]);
            $name = htmlspecialchars($row["name"]);
            $price = htmlspecialchars($row["price"]);
            $image = htmlspecialchars($row["image"]);

            echo '<div class="cart-item" data-id="' . $id . '">';
            echo '<input type="checkbox" name="cart_items[]" value="' . $id . '" class="item-checkbox" data-price="' . $price . '">';
            echo '<div class="item-info">';
            echo '<img src="' . $image . '" alt="Product Image">';
            echo '<div class="item-details">';
            echo '<span class="name">' . $name . '</span>';
            echo '<span class="price">₱' . $price . '</span>';
            echo '</div>';
            echo '</div>';
            echo '<div class="quantity-controls">';
            echo '<button type="button" class="qty-btn minus">−</button>';
            echo '<input type="text" name="quantity[' . $id . ']" class="quantity-input" value="1" data-price="' . $price . '">';
            echo '<button type="button" class="qty-btn plus">+</button>';
            echo '</div>';
            echo '</div>';
        }
        echo '<div class="total-amount">Total: ₱<span id="total">0.00</span></div>';
        echo '<button type="submit" class="checkout-btn">Checkout</button>';
        echo '</form>';
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
</div>

<script>
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const totalSpan = document.getElementById('total');

    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.cart-item').forEach(item => {
            const checkbox = item.querySelector('.item-checkbox');
            const input = item.querySelector('.quantity-input');
            let quantity = parseInt(input.value);
            const price = parseFloat(input.dataset.price);

            if (isNaN(quantity) || quantity < 0) quantity = 0;
            if (quantity === 0) {
                item.classList.add('hidden');
                checkbox.checked = false;
            } else {
                item.classList.remove('hidden');
                if (checkbox.checked) {
                    total += quantity * price;
                }
            }
        });
        totalSpan.textContent = total.toFixed(2);
    }

    document.querySelectorAll('.qty-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const input = btn.parentElement.querySelector('.quantity-input');
            let value = parseInt(input.value);
            if (isNaN(value)) value = 1;

            if (btn.classList.contains('plus')) {
                input.value = value + 1;
            } else if (btn.classList.contains('minus')) {
                input.value = Math.max(0, value - 1);
            }
            updateTotal();
        });
    });

    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('input', updateTotal);
    });

    checkboxes.forEach(cb => cb.addEventListener('change', updateTotal));

    window.addEventListener('load', updateTotal);
</script>

</body>
</html>
