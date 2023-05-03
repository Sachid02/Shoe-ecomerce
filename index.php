<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_SESSION["message"])) {
        echo sprintf("<li class='alert'>%s</li>", $_SESSION["message"]);
        unset($_SESSION["message"]);
    }
    ?>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="/">
                    <h1 style="color: #1d3557">
                        Shop<span style="color: #e63946">ify</span>
                    </h1>
                </a>
            </div>
            <div class="navs">
                <ul>
                    <li><a href="./vehicles.html">Products</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
            <div class="navs account">
                <ul>
                    <li><a href="">Signup</a></li>
                    <li><a href="">Login</a></li>
                    <li>
                        <a href="">Dashboard</a>
                    </li>
                    <li>Cart: <span class="cart-items">
                            <?php
                            echo $_SESSION["cart"] ?? 0;
                            ?>
                        </span></li>
                </ul>
            </div>
        </div>
        <div class="hero">
            <img src="./img/bg.jpg" alt="" />
            <div class="content">
                <h1 style="font-size: 3rem; color: #e63946">Buy Products</h1>
                <h1 style="font-size: 3rem">shaped to your life</h1>
                <input type="text" name="" id="" placeholder="Search..." style="padding: 10px" />
                <input type="submit" value="Search" class="btn-primary" />
            </div>
        </div>
        <!-- end -->
        <div class="recent">
            <h4 class="title">Recently Added</h4>
            <div class="col">
                <div class="row">
                    <div class="card">
                        <div class="card-img">
                            <img src="./img/rolex.webp" alt="" />
                        </div>
                        <div class="content">
                            <h3>Rolex</h3>
                            <p class="seller">Sulav Maharjan</p>
                            <p class="price">Rs. 200,000</p>
                            <form action="./server/functions/cart.php" method="post">
                                <input type="submit" value="Add to cart" class="btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-img">
                            <img src="./img/croptop.jpg" alt="" />
                        </div>
                        <div class="content">
                            <h3>Crop Top</h3>
                            <p class="seller">Sulav Maharjan</p>
                            <p class="price">Rs. 200,000</p>
                            <form action="./server/functions/cart.php" method="post">
                                <input type="submit" value="Add to cart" class="btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-img">
                            <img src="./img/spray.webp" alt="" />
                        </div>
                        <div class="content">
                            <h3>Body Spray</h3>
                            <p class="seller">Sulav Maharjan</p>
                            <p class="price">Rs. 200,000</p>
                            <form action="./server/functions/cart.php" method="post">
                                <input type="submit" value="Add to cart" class="btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end recent -->
        <footer>
            <div class="footer">
                <div class="row">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>

                <div class="row">
                    <ul>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>

                <div class="row">Copyright &copy; 2023 Sulav</div>
            </div>
        </footer>
    </div>
</body>

</html>