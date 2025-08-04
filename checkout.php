<?php
session_start();
include 'conn.php';

if (!isset($_SESSION['email'])) {
    echo "<p>Please log in to proceed to checkout.</p>";
    exit;
}

if (!isset($_POST['cart_items']) || empty($_POST['cart_items'])) {
    echo "<p>No items selected for checkout. <a href='cart.php'>Go back to cart</a></p>";
    exit;
}

$email = $_SESSION['email'];
$cart_item_ids = $_POST['cart_items'];
$quantities = $_POST['quantity'];

$ids = array_map('intval', $cart_item_ids);
$id_list = implode(",", $ids);

$query = "SELECT * FROM cart WHERE id IN ($id_list) AND email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    echo "<p>No valid items found in your cart. <a href='cart.php'>Go back to cart</a></p>";
    exit;
}

$total = 0;
$checkout_items = [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 2rem;
        }

        .checkout-container {
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }

        table th, table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        table th {
            background-color: #f9f9f9;
        }

        .total-row {
            font-weight: bold;
            font-size: 1.1rem;
        }

        .btn {
            display: block;
            text-align: center;
            background-color: #28a745;
            color: white;
            padding: 0.75rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #555;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="checkout-container">
        <h2>Checkout Summary</h2>
        <table>
            <tr>
                <th>Product</th>
                <th>Price (₱)</th>
                <th>Qty</th>
                <th>Subtotal (₱)</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) :
                $id = $row['id'];
                $name = htmlspecialchars($row['name']);
                $price = floatval($row['price']);
                $qty = isset($quantities[$id]) ? intval($quantities[$id]) : 1;

                // Skip if quantity is 0 or less
                if ($qty <= 0) continue;

                $subtotal = $price * $qty;
                $total += $subtotal;

                $checkout_items[] = [
                    'id' => $id,
                    'qty' => $qty
                ];
            ?>
                <tr>
                    <td><?= $name ?></td>
                    <td>₱<?= number_format($price, 2) ?></td>
                    <td><?= $qty ?></td>
                    <td>₱<?= number_format($subtotal, 2) ?></td>
                </tr>
            <?php endwhile; ?>

            <tr class="total-row">
                <td colspan="3">Total</td>
                <td>₱<?= number_format($total, 2) ?></td>
            </tr>
        </table>

        <?php
        // Store order data in session or send it to next page
        $_SESSION['checkout_items'] = $checkout_items;
        ?>

        <form method="POST" action="place_order.php">
            <?php foreach ($checkout_items as $item): ?>
                <input type="hidden" name="cart_items[]" value="<?= $item['id'] ?>">
                <input type="hidden" name="quantity[<?= $item['id'] ?>]" value="<?= $item['qty'] ?>">
            <?php endforeach; ?>
            <button type="submit" class="btn">Place Order</button>
        </form>

        <a href="cart.php" class="back-link">← Back to Cart</a>
    </div>

</body>
</html>
