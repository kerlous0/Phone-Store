<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="mainContainer">
        <div class="container">
            <div class="title">Login</div>
            <form action="#" method="post">
                <div class="inputsContainer">
                    <input type="email" id="email" class="input" name="email" placeholder="Enter Your Email" required>
                    <input type="password" id="pwd" class="input" name="pwd" placeholder="Enter Your Password" required>
                    <div class="formBtn">
                        <input type="submit" id="submit" class="submit" name="submit" value="LOGIN">
                        <a href="index.php"><button type="button" class="loginBtn">REGISTER</button></a>
                    </div>
                    <div id="message"></div>
                </div>
            </form>
        </div>
    </div>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phonestore";


    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST['email'];
        $pass = $_POST['pwd'];
        $hashPass = md5($pass);

        $sql = "SELECT * FROM users WHERE email='$email'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $storedPassword = $row["password"];


            if ($hashPass === $storedPassword) {

                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $row['name'];
                header("location: home.php");
            } else {
                echo "<script>document.getElementById('message').innerText = 'Invalid password';</script>";
            }
        } else {
            echo "<script>document.getElementById('message').innerText = 'User not found';</script>";
        }
    }

    $conn->close();
    ?>

</body>

</html>