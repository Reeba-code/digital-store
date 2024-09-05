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
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

  
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      
        echo "Login successful!";
       
    } else {
       
        echo "Invalid username or password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
   
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Login</title>
  </head>
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



.login-form h1 {
             font-size: 2em;
            margin-bottom: 20px;
}

.login-form p {
    margin-bottom: 10px;
    color: #555;
}

.login-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color:  #003300;
}

.login-form input[type="text"],
.login-form input[type="email"],
.login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid;
      box-shadow: inset 0 5px 10px rgba(0, 0, 0, 0.2);
      font-size: 1em;
}

.login-form .buttons {
    display: flex;
    justify-content: space-between;
}

.login-form .cancelbtn,
.login-form .signupbtn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    background-color:  #003300;
    color: #fff;
    transition: background-color 0.3s;
}

.login-form .cancelbtn:hover,
.login-form .signupbtn:hover {
    background-color:  #003300;
}
input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: linear-gradient(to right, #005700, #0057007b);
            border: none;
            border-radius: 5px;
            color: #000000;
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 8px 15px #0057007e;
        }

        input[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 20px #005700;
        }

        p, a {
            color: #000000;
            font-size: 0.9em;
        }

        a {
            color: #0d0101;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        a:hover {
            color: #005700;
        }
        h4{
            color: #fff;
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
  </style>
  <body>
    <!-- Navigation -->
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
    <div class="navigation">
      <div class="nav-center container d-flex">
        <a href="index.php" class="logo"><h1>Orefile General Dealer</h1></a>

        <ul class="nav-list d-flex">
          <li class="nav-item">
            <a href="./index.html" class="nav-link">Home</a>
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
          <li class="icons d-flex">
            <a href="login.php" class="icon">
              <i class="bx bx-user"></i>
            </a>
            <div class="icon">
              <i class="bx bx-search"></i>
            </div>
            <div class="icon">
              <i class="bx bx-heart"></i>
              <span class="d-flex">0</span>
            </div>
            <a href="cart.php" class="icon">
              <i class="bx bx-cart"></i>
              <span class="d-flex">0</span>
            </a>
          </li>
        </ul>

        <div class="icons d-flex">
          <a href="login.html" class="icon">
            <i class="bx bx-user"></i>
          </a>
          <div class="icon">
            <i class="bx bx-search"></i>
          </div>
          <div class="icon">
            <i class="bx bx-heart"></i>
            <span class="d-flex">0</span>
          </div>
          <a href="cart.php" class="icon">
            <i class="bx bx-cart"></i>
            <span class="d-flex">0</span>
          </a>
        </div>

        <div class="hamburger">
          <i class="bx bx-menu-alt-left"></i>
        </div>
      </div>
    </div>
    <!-- Login -->
    <div class="contain">
      <div class="login-form">
        <form action="login.php">
          <h1>Login</h1>
          <p>
            Don't have an account? 
            <a href="signup.php">Sign Up</a>
          </p>

          <label for="username">Username</label>
          <input type="text" placeholder="Enter Name" name="name" required />

          <label for="psw">Password</label>
          <input
            type="password"
            placeholder="Enter Password"
            name="psw"
            required
          />

          <label>
            <input
              type="checkbox"
              checked="checked"
              name="remember"
              style="margin-bottom: 15px"
            />
            Remember me
          </label>

          <p>
            By creating an account you agree to our
            <a href="#">Terms & Privacy</a>.
          </p>

          <div class="buttons">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn">Login</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <div class="row">
        <div class="col d-flex">
          <h4>INFORMATION</h4>
          <a href="./about.html">About us</a>
          <a href=",/contact.html">Contact Us</a>
          <a href="./terms">Term & Conditions</a>
          <a href="./dilevery">Delivery Guide</a>
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

    <!-- Custom Script -->
    <script src="./js/index.js"></script>
  </body>
</html>

