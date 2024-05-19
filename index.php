<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="mainContainer">
        <div class="container">
            <div class="title">Registration</div>
            <form id="form" action="#" method="post">
                <div class="inputsContainer">
                    <input type="text" id="name" class="input" name="name" placeholder="Enter Your Name" required>
                    <input type="email" id="email" class="input" name="email" placeholder="Enter Your Email" required>
                    <input type="password" id="pwd" class="input" name="pwd" placeholder="Enter Your Password" required>
                    <input type="password" id="pwd2" class="input" name="pwd2" placeholder="Confirm Your Password"
                        required>
                    <div class="formBtn">
                        <input type="submit" id="submit" class="submit" name="submit" value="Sign Up">
                        <a href="login.php"><button type="button" class="loginBtn">LOGIN</button></a>
                    </div>
                    <div id="message" style="color: <?php echo $condition ? 'green' : 'red'; ?>">

                    </div>

                </div>
            </form>
        </div>
        <div class="imageContainer">
            <img class="image" src="img/undraw_step_to_the_sun_nxqq.svg" alt="image">
        </div>
    </div>

    <script src="JS/script.js"></script>

    <?php
    session_start();
    if (isset($_POST['submit'])) {

        $servername = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "phonestore";
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['pwd'];
        $hashedPassword = md5($password);


        $conn = new mysqli($servername, $username, $pass, $dbname);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "<script>document.getElementById('message').innerText = 'Email Already Exists';</script>";
        } else {
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>document.getElementById('message').innerText = 'New account created successfully';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }
    ?>
</body>

</html>