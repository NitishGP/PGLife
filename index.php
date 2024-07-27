<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PGLife</title>
    <?php include "includes/head_links.php" ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    session_start();
    include "includes/header.php";
 
    ?>

    <section>
        <div id="home">
            <img style="filter: brightness(50%);" src="img/bg.png" alt="">
            <h3 id="home-heading">Happiness per Square Foot</h3>
            <form class="d-flex home" method="GET" role="search" action="property_list.php">
                <input class="form-control me-2" type="search" name="city" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    
        <div class="container m-5  " style="text-align: center;">
            <h2 style="text-align: center">Major Cities</h2>
            <div class="row">
                <div class="col cities">
                    <a href="property_list.php?city=Delhi">
                        <img style="width: 10rem;" src="img/delhi.png" alt="">
                    </a>
                </div>
                <div class="col cities">
                    <a href="property_list.php?city=Bengaluru">
                        <img style="width: 10rem;" src="img/bangalore.png" alt="">
                    </a>
                </div>
                <div class="col cities">
                    <a href="property_list.php?city=Mumbai">
                        <img style="width: 10rem;" src="img/mumbai.png" alt="">
                    </a>
                </div>
                <div class="col cities">
                    <a href="property_list.php?city=Hyderabad">
                        <img style="width: 10rem;" src="img/hyderabad.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php
   
   include "includes/footer.php";
   include "includes/signup_modal.php";
   include "includes/login_modal.php";
    ?>
    <script type="text/javascript" src="js/common.js"></script> 
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
</body>

</html>