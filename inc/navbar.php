<div class="navbar">
    <div class="logo">
        <a href="/">
            <h1 style="color: #1d3557">
                SHOE<span style="color: #e63946">STORE</span>
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
            <li><a href="./register_form.html">Signup</a></li>
            <li><a href="./login_form.php">Login</a></li>
            <li><a href="./logout.php">Logout</a></li>
            <li>
                <a href="./dashboard.php">Dashboard</a>
            </li>
            <li>Cart: <span class="cart-items">
                    <?php
                    echo $_SESSION["cart"] ?? 0;
                    ?>
                </span></li>
        </ul>
    </div>
</div>