<!-- PHP start -->
<?php
    session_start();
    $database_name = "MBeauty";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="lakiery.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="lakiery.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    
?>
<!-- PHP end -->
<!doctype html>
<html lang="en">
  <head>
    <title>MBeauty_Poprawa</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/lakiery.css">
    <link rel="stylesheet" href="css/rzesy.css">
    <link rel="stylesheet" href="css/akcesoria.css">
    <!-- Link PHP -->
    <link rel="stylesheet" href="index.php">
    <link rel="stylesheet" href="lakiery.php">
    <link rel="stylesheet" href="rzesy.php">
    <link rel="stylesheet" href="akcesoria.php">
    <link rel="stylesheet" href="about.php">
    <!-- Link-1 PHP -->
    <link rel="stylesheet" href="lakiery-1.php">
    <!-- Link-1 CSS -->
    <link rel="stylesheet" href="css/lakiery-1.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light  py-3 fixed-top">
        <div class="container-fluid">
            <img src="img/MBeauty-2-1.png" alt="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="lakiery.php">Lakiery</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="rzesy.php">Rzęsy</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="akcesoria.php">Akcesoria</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.php">O Nas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.php">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a href="shopping-cart.php"><i class="fas fa-shopping-bag"></i></a>
                        <span id="counter">0</span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Featured section start -->
    <section id="featured" class="my-5 py-5 ">
      <div class="container mx-auto mt-5 py-5">
        <h2 class="font-weight-bold">Rzęsy</h2>
        <hr>
      </div>
        <div class="container row mx-auto">
          
          <?php
            $query = "SELECT * FROM rzesy ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
            <div class="product text-center col-lg-3 col-md-4 col-12">
            <img onclick="window.location.href='lakier-1.php?id=<?php echo $row['id'] ?>';" src="<?php echo $row['image']; ?>" class="img-fluid mb-3">
              <h5 class="p-name"><?php echo $row["tytul"]; ?></h5>
              <h4 class="p-price"><?php echo $row["cena"]; ?> zł</h4>
              <button class="btn button-1">Buy Now</button>
            </div>          
          
          <?php
                  }
              }
          ?>
        </div>
    </section>
    <!-- Featured section end -->

    <!-- Footer start -->
    <footer class="mt-5 py-5">
      <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-12">
          <img src="img/MBeauty-2-1.png" alt="">
          <p class="pt-3">Fringilla urna porttitor rhoncus dolor purus luctus venenatis lectus magna fringilla diam maecenas ultricies mi eget mauris.</p>
        </div>
        <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
          <h5 class="pb-2">Menu</h5>
          <ul class="text-uppercase list-unstyled">
            <li><a href="index.php">Home</a></li>
            <li><a href="akcesoria.php">Akcesoria</a></li>
            <li><a href="about.php">O nas</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
          </ul>
        </div>

        <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
          <h5 class="pb-2">Kontakt</h5>
          <div>
            <h6 class="text-uppercase">Address</h6>
            <p>123 STREET NAME, CITY, US</p>
          </div>
          <div>
            <h6 class="text-uppercase">Phone</h6>
            <p>(123) 456-7890</p>
          </div>
          <div>
            <h6 class="text-uppercase">Email</h6>
            <p>MAIL@EXAMPLE.COM</p>
          </div>
        </div>

        <div class="footer-one col-lg-3 col-md-6 col-12">
          <h5 class="pb-2">Instagram</h5>
          <div class="row">
            <img class="img-fluid w-25 h-100 m-2" src="img/insta/1.jpg" alt="">
            <img class="img-fluid w-25 h-100 m-2" src="img/insta/2.jpg" alt="">
            <img class="img-fluid w-25 h-100 m-2" src="img/insta/3.jpg" alt="">
            <img class="img-fluid w-25 h-100 m-2" src="img/insta/4.jpg" alt="">
            <img class="img-fluid w-25 h-100 m-2" src="img/insta/5.jpg" alt="">
          </div>
        </div>
      </div>

      <div class="copyright mt-5">
        <div class="row container mx-auto">
          <div class="col-lg-3 col-md-6 col-12 mb-4">
            <img src="img/payment.png" alt="">
          </div>
          <div class="col-lg-4 col-md-6 col-12 text-nowrap mb-3">
            <p>MBeauty E-commerce &copy; 2022. By DanielWeb</p>
          </div>
          <div class="col-lg-4 col-md-6 col-12">
            <a href="https://pl-pl.facebook.com"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
            <a href="https://accounts.snapchat.com"><i class="fab fa-snapchat-ghost"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer end -->

    <!-- Optional JavaScript -->
    <script src="js/navbar-stick.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>