<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
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
            <?php
            $sql = "SELECT id, price, img, name, stock FROM products";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<div class="img">';
                    echo '<img src="' . $row["img"] . '">';
                    echo '</div>';
                    echo '<div class="description">';
                    echo '<div class="name">';
                    echo '<p>' . $row["name"] . '</p>';
                    echo '</div>';
                    echo '<div class="num-section" id="num-section">';
                    echo '<div class="pos" id="pos" onclick="increaseCount(this)"><i class="fa-solid fa-plus"></i></div>';
                    echo '<div class="num" id="num">0</div>';
                    echo '<div class="neg" id="neg" onclick="decreaseCount(this)"><i class="fa-solid fa-minus"></i></div>';
                    echo '</div>';
                    echo '<div class="stock">price : <span>' . $row["price"] . '$</span></div>';
                    echo '<div class="stock">in stock : <span>' . $row["stock"] . '</span></div>';
                    echo '<button class="buy-section" onclick="addToCart(this)" data-productid=' . $row['id'] . '>';
                    echo '<i class="fa-solid fa-cart-shopping"></i>';
                    echo '<span>add</span>';
                    echo '</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>


        </div>
    </section>
    <script src="js/home.js"></script>
</body>

</html>