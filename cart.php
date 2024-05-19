<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phonestore";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    ?>
    <nav>
        <ul>
            <div>
                <li><a href="home.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
            </div>
            <div>
                <li><span>welcome <?php echo htmlspecialchars($_SESSION['name']); ?></span></li>

                <li><a href="cart.php">Cart</a></li>
                <li><a class="active" href="login.php">logout</a></li>
            </div>
        </ul>
    </nav>

    <section class="main">
        <div class="container">
            <div class="item">
                <div class="img">
                    <p>image</p>
                </div>
                <div class="name">
                    <p>name</p>
                </div>
                <div class="quantity">
                    <p>quantity</p>
                </div>
                <div class="price">
                    <p>price</p>
                </div>
            </div>


            <button class="buyBtn" onclick="buyAllProducts()">buy</button>
        </div>
        <div class="buy">

        </div>
    </section>
    <script src="js/cart.js"></script>
</body>

</html>