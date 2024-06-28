<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PGLife</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include "includes/header.php";
    ?>

    <section>
        <div id="home">
            <img style="filter: brightness(50%);" src="img/bg.png" alt="">
            <h3 id="home-heading">Happiness per Square Foot</h3>
            <form class="d-flex home" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
        </div>
    </section>
    <section>
        <div class="container m-5" style="text-align: center;">
            <h2>Major Cities</h2>
            <div class="row">
                <div class="col cities">
                    <img style="width: 10rem;" src="img/delhi.png" alt="">
                   
                </div>
                <div class="col cities">
                    <img style="width: 10rem;" src="img/bangalore.png" alt="">
                   
                </div>
                <div class="col cities">
                    <img style="width: 10rem;" src="img/chennai.png" alt="">
                    
                </div>
                <div class="col cities">
                    <img style="width: 10rem;" src="img/hyderabad.png" alt="">
                    
                </div>
            </div>
        </div>
    </section>
    
    <?php
    include "includes/footer.php";
    ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>