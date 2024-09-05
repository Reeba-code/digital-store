<?php

$servername = "localhost"; 
$username = "root";  
$password = "";  
$dbname = "shop";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function sanitizeInput($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
    return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $message = sanitizeInput($_POST["message"]);

    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
   
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Orefile General Dealer</title>
    <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

        body {
            font-family: 'Baskerville SC', serif;
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
}

        .nav-item .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #000;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .nav-item:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #fff;
        }

        .dropdown-item:hover {
            background-color: #003300;
        }

        .contain {
            width: 80%;
            max-width: 700px;
            min-width: 300px;
            margin: 20px auto; 
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 35px 55px #005700;
}


@media (max-width: 768px) {
    .contain {
        width: 90%; 
        padding: 15px; 
    }
}

@media (max-width: 480px) {
    .contain {
        width: 95%; 
        padding: 10px; 
    }
}


.nav-item .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #003300;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .nav-item:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #fff;
        }

        .dropdown-item:hover {
            background-color: #000;
        }

        .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.help-center {
    padding: 60px 0;
    background-color: #f4f4f4;
}

.help-center h2 {
    text-align: center;
    margin-bottom: 20px;
}

.help-center p {
    text-align: center;
    margin-bottom: 40px;
}

.help-center-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.help-item {
    flex: 1 1 calc(33.333% - 20px);
    background: #fff;
    padding: 20px;
    margin: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    box-sizing: border-box;
    text-align: center;
}

.help-item h3 {
    margin-top: 0;
}

.help-item p {
    margin: 15px 0;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    background-color: #003300;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

.btn:hover {
    background-color: #0056b3;
}
.contact {
        background-color: #f9f9f9;
        padding: 40px 0;
        text-align: center;
    }

    .contact .container {
        width: 80%;
    max-width: 700px;
    min-width: 300px;
    margin: 20px auto; 
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 35px 55px #005700;
    }
    @media (max-width: 768px) {
        .contact .container {
        width: 90%; 
        padding: 15px; 
    }
}


@media (max-width: 480px) {
    .contact .container {
        width: 95%;
        padding: 10px; 
    }
}


    .contact h2 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 20px;
    }

    .contact .form-group {
        margin-bottom: 15px;
    }

    .contact label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color:  #003300;
    }

    .contact input[type="text"],
    .contact input[type="email"],
    .contact textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid;
        box-shadow: inset 0 5px 10px rgba(0, 0, 0, 0.2);
        font-size: 1em;
    }

    .contact textarea {
        height: 150px;
        resize: vertical;
    }

    .contact .btn {
        background-color: #003300;
        font-family: 'Baskerville SC', serif;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size:16px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .contact .btn:hover {
        background-color: #000;
    }

@media (max-width: 768px) {
    .help-center-content {
        flex-direction: column;
    }

    .help-item {
        flex: 1 1 100%;
    }
}
    footer {
            background-color: #005700;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
           
        }

        footer p {
            margin: 0;
        }

@media (max-width: 768px) {
    .navbar .nav-links {
        flex-direction: column;
        text-align: center;
    }

    .products,
    .contact {
        padding: 20px 0;
    }
}
</style>


<body>
    
        <!-- Top Nav -->
        <div class="top-nav">
            <div class="container d-flex">
            <h4>Order Online Or Call Us: (072) 700-9273</h4>
                <ul class="d-flex">
                <li><a href="./about.html">About Us</a></li>
                <li><a href="./faqs.html">FAQ</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <!-- Navigation -->
        <div class="navigation">
            <div class="nav-center container d-flex">
                <a href="/" class="logo"><h1>Orefile General Dealer</h1></a>
                <ul class="nav-list d-flex">
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="product.php" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./deals.php">Deals</a>
                            <a class="dropdown-item" href="./foods.php">Food</a>
                            <a class="dropdown-item" href="./bevr.php">Beverages</a>
                            <a class="dropdown-item" href="./household.php">Household</a>
                            <a class="dropdown-item" href="./popular.php">Most Popular</a>
                            <a class="dropdown-item" href="./orders.php">My Orders</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="./terms.html" class="nav-link">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a href="./about.html" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact Us</a>
                    </li>
                </ul>
                <div class="icons d-flex">
                    <a href="login.php" class="icon"><i class="bx bx-user"></i></a>
                    <div class="icon"><i class="bx bx-search"></i></div>
                    <div class="icon"><i class="bx bx-heart"></i><span class="d-flex">0</span></div>
                    <a href="cart.php" class="icon"><i class="bx bx-cart"></i><span class="d-flex">0</span></a>
                </div>
                <div class="hamburger"><i class="bx bx-menu-alt-left"></i></div>
            </div>
        </div>


    <!-- Help Center Section -->
<section class="help-center">
    <div class="container">
        <h2>Help Center</h2>
        <p>If you have any questions or need assistance, please check out our Help Center for common queries and solutions. Our team is here to help you with any issues you may have.</p>
        
        <div class="help-center-content">
            <div class="help-item">
                <h3>FAQs</h3>
                <p>Find answers to the most frequently asked questions about our services and products.</p>
                <a href="./faqs.html" class="btn">View FAQs</a>
            </div>
            <div class="help-item">
                <h3>Contact Support</h3>
                <p>Need personalized assistance? Reach out to our support team for help with specific issues.</p>
                <a href="mailto:info@mafihub.co.za" class="btn">Contact Support</a>
            </div>
            <div class="help-item">
                <h3>Submit a Ticket</h3>
                <p>Submit a support ticket and our team will get back to you as soon as possible.</p>
                <a href="tickets.php" class="btn">Submit a Ticket</a>
            </div>
        </div>
    </div>
</section>


    <!-- Contact Form Section -->
    <section class="contact">
        <div class="contain">
            <h2>Contact Us</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

  
    <!-- Footer -->
    <footer class="footer">
      <div class="row">
        <div class="col d-flex">
          <h4>INFORMATION</h4>
          <a href="./about.html">About us</a>
          <a href=",/contact.html">Contact Us</a>
          <a href="./terms">Term & Conditions</a>
          <a href="./delivery">Delivery Guide</a>
        </div>
        <div class="col d-flex">
          <h4>USEFUL LINK</h4>
          <a href="./shop.html">Online Store</a>
          <a href="./support.html">Customer Services</a>
          <a href="./deals.html">Promotion</a>
          <a href="./popular.html">Top Brands</a>
        </div>
        <div class="col d-flex">
          <span><i class="bx bxl-facebook-square"></i></span>
          <span><i class="bx bxl-instagram-alt"></i></span>
          <span><i class="bx bxl-twitter"></i></span>
          <span><i class="bx bxl-whatsapp"></i></span>
        </div>
      </div>
    </footer>


    <!-- Glide js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
</body>
</html>

