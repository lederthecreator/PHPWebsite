<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="products.php">Leder Store</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
 
                <li <?php echo $page_title=="Products" ? "class='active'" : ""; ?>>
                    <a href="products.php" class="dropdown-toggle">Товары</a>
                </li>
 
                <li <?php echo $page_title=="Cart" ? "class='active'" : ""; ?> >
                    <a href="cart.php">
                        <?php
                        $cart_count=count($_SESSION['cart']);
                        ?>
                        Корзина <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
                    </a>
                </li>

                <li>
                    <?php 
                    if(array_key_exists('user', $_SESSION)){
                        echo "<a href='profile.php'>" . $_SESSION['user']['login'] . "</a>";
                    }
                    else{
                        echo "<a href='authorization.php'> Вход / Регистрация </a>"; 
                    }
                    ?>
                </li>
                <?php 
                if(array_key_exists('user', $_SESSION)){
                    echo "<li>";
                    echo "<a href='objects/logout.php'> Выход </a>";
                    echo "</li>";
                }
                ?>
            </ul>
 
        </div>
 
    </div>
</div>