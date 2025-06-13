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

        .cart-item:last-child {
            border-bottom: none;
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

        .cart-item input[type="checkbox"] {
            transform: scale(1.2);
            margin-right: 1rem;
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

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="cart-item">';
                    echo '<input type="checkbox" name="cart_items[]" value="' . $row["id"] . '">';
                    echo '<div class="item-info">';
                    echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="Product Image">';
                    echo '<div class="item-details">';
                    echo '<span class="name">' . htmlspecialchars($row["name"]) . '</span>';
                    echo '<span class="price">₱' . htmlspecialchars($row["price"]) . '</span>';
                    echo '</div></div></div>';
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }
        ?>
    </div>
    
</body>
</html>
