<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <div class="mainContainer">
        <div class="container">
            <div class="title">Contact Us</div>
            <form action="submitContact.php" method="POST">
                <div class="inputsContainer">
                    <input type="text" class="input" name="name" placeholder="Name" required>
                    <input type="email" class="input" name="email" placeholder="Email" required>
                    <input type="number" class="input" name="phone" placeholder="Phone" required>
                    <input type="text" class="input" name="subject" placeholder="Subject" required>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Message"></textarea>
                    <input type="submit" id="submit" name="submit" value="Send">
                </div>
            </form>
        </div>
    </div>
</body>

</html>