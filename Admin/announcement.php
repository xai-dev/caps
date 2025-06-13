<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];
    $sql = "INSERT INTO announcements (message, date) VALUES ('$message', NOW())";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Announcement posted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Post Announcement</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <style>
        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 0.875rem;
            opacity: 1;
            overflow-y: scroll;
            margin: 0;
        }

        a {
            cursor: pointer;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        li {
            list-style: none;
        }

        h2 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            color: var(--bs-emphasis-color);
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Post Announcement</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" placeholder="Enter your announcement message here..." required></textarea><br><br>
        <input type="submit" value="Post Announcement">
    </form>
</body>
</html>
