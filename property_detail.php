<?php
session_start();
require "includes/database_connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$property_id = $_GET["property_id"];

$sql_1 = "SELECT * FROM properties WHERE id='$property_id';";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong";
    exit;
}

$property = mysqli_fetch_assoc($result_1);
if (!$property) {
    echo "Sorry! No property of this name listed here!";
    exit;
}



$sql_3 = "SELECT * 
            FROM interested_users_properties iup
            INNER JOIN properties p ON iup.property_id = p.id
            WHERE p.id = $property_id";
$result_3 = mysqli_query($conn, $sql_3);
if (!$result_3) {
    echo "Something went wrong!";
    return;
}
$interested_users_properties = mysqli_fetch_all($result_3, MYSQLI_ASSOC);


$sql_4 = "SELECT * 
            FROM properties_amenities pa 
            INNER JOIN amenities a ON a.id=pa.amenity_id 
            WHERE pa.property_id = $property_id";
$result_4 = mysqli_query($conn, $sql_4);
if (!$result_4) {
    echo "Something went wrong!";
    return;
}
$properties_amenities = mysqli_fetch_all($result_4, MYSQLI_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $property['name'] ?> | PG Life</title>


    <?= include "includes/head_links.php" ?>
    <link href="css/property_detail.css" rel="stylesheet" />
</head>

<body>

    <?php
    include "includes/header.php";

    ?>

    <div id="loading">
    </div>


    <?php
    $property_images = glob("img/properties/" . $property['id'] . "/*");
    ?>
    <div id="property-images" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#property-images" data-slide-to="0" class="active"></li>
            <li data-target="#property-images" data-slide-to="1" class=""></li>
            <li data-target="#property-images" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= $property_images[0] ?>" alt="slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= $property_images[1] ?>" alt="slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= $property_images[2] ?>" alt="slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#property-images" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#property-images" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>

    <div class="property-summary page-container">
        <div class="row no-gutters justify-content-between">
            <?php
            $total_rating = ($property['rating_clean'] + $property['rating_food'] + $property['rating_safety']) / 3;
            $total_rating = round($total_rating, 1);
            ?>
            <div class="star-container" title="<?= $total_rating ?>">
                <?php
                $rating = $total_rating;
                for ($i = 0; $i < 5; $i++) {
                    if ($rating >= $i + 0.8) {
                ?>
                        <i class="fas fa-star"></i>
                    <?php
                    } elseif ($rating >= $i + 0.3) {
                    ?>
                        <i class="fas fa-star-half-alt"></i>
                    <?php
                    } else {
                    ?>
                        <i class="far fa-star"></i>
                <?php
                    }
                }
                ?>
            </div>
            <div class="interested-container">
                <?php
                $interested_users_count = 0;
                $is_interested = false;
                foreach ($interested_users_properties as $interested_user_property) {
                    if ($interested_user_property['property_id'] == $property['id']) {
                        $interested_users_count++;

                        if ($interested_user_property['user_id'] == $user_id) {
                            $is_interested = true;
                        }
                    }
                }

                if ($is_interested) {
                ?>
                    <i class="is-interested-image fas fa-heart" property_id="<?= $property['id'] ?>"></i>
                <?php
                } else {
                ?>
                    <i class="is-interested-image far fa-heart" property_id="<?= $property['id'] ?>"></i>
                <?php
                }
                ?>
                <div class="interested-text">
                    <span class="interested-user-count"><?= $interested_users_count ?></span> interested
                </div>
            </div>
        </div>
        <div class="detail-container">
            <div class="property-name"><?= $property['name'] ?></div>
            <div class="property-address"><?= $property['address'] ?></div>
            <div class="property-gender">
                <img src="img/<?= $property['gender'] ?>.png" />
            </div>
        </div>
        <div class="row no-gutters">
            <div class="rent-container col-6">
                <div class="rent">Rs <?= $property['rent'] ?></div>
                <div class="rent-unit">per month</div>
            </div>
            <div class="button-container col-6">
                <a href="#" class="btn btn-primary">Book Now</a>
            </div>
        </div>
    </div>

    <div class="property-amenities">
        <div class="page-container property-summary">
            <h1>Amenities</h1>
            <div class="row justify-content-between">
                <div class="col-md-auto">
                    <h5>Building</h5>
        <?php
            foreach($properties_amenities as $properties_amenity){
                
                if($properties_amenity['type']=='Building'){
                    ?> 
                    <div class="amenity-container ">
                        <img src="img/amenities/<?=$properties_amenity['icon']?>.svg">
                        <span><?=$properties_amenity['name']?></span>
                    </div>
        <?php
                }
            }
        ?>
                    
                </div>

                <div class="col-md-auto">
                    <h5>Common Area</h5>
        <?php
            foreach($properties_amenities as $properties_amenity){
                
                if($properties_amenity['type']=='Common Area'){
                    ?> 
                    <div class="amenity-container ">
                        <img src="img/amenities/<?=$properties_amenity['icon']?>.svg">
                        <span><?=$properties_amenity['name']?></span>
                    </div>
        <?php
                }
            }
        ?>
        
                </div>
                <div class="col-md-auto">
                    <h5>Bedroom</h5>
        <?php
            foreach($properties_amenities as $properties_amenity){
                
                if($properties_amenity['type']=='Bedroom'){
                    ?> 
                    <div class="amenity-container ">
                        <img src="img/amenities/<?=$properties_amenity['icon']?>.svg">
                        <span><?=$properties_amenity['name']?></span>
                    </div>
        <?php
                }
            }
        ?>
                </div>

                <div class="col-md-auto">
                    <h5>Washroom</h5>
        <?php
            foreach($properties_amenities as $properties_amenity){
                
                if($properties_amenity['type']=='Washroom'){
                    ?> 
                    <div class="amenity-container ">
                        <img src="img/amenities/<?=$properties_amenity['icon']?>.svg">
                        <span><?=$properties_amenity['name']?></span>
                    </div>
        <?php
                }
            }
        ?>
                </div>
            </div>
        </div>
    </div>

    <div class="property-about page-container property-summary">
        <h1>About the Property</h1>
        <p><?= $property['description'] ?></p>
    </div>

    <div class="property-rating property-summary">
        <div class="page-container">
            <h1>Property Rating</h1>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6">
                    <div class="rating-criteria row">
                        <div class="col-6">
                            <i class="rating-criteria-icon fas fa-broom"></i>
                            <span class="rating-criteria-text">Cleanliness</span>
                        </div>
                        <div class="rating-criteria-star-container col-6" title="4.3">
                            <?php

                            $rating_clean = round($property['rating_clean'], 1);
                            ?>
                            <div class="star-container" title="<?= $rating_clean ?>">
                                <?php
                                $rating = $rating_clean;
                                for ($i = 0; $i < 5; $i++) {
                                    if ($rating >= $i + 0.8) {
                                ?>
                                        <i class="fas fa-star"></i>
                                    <?php
                                    } elseif ($rating >= $i + 0.3) {
                                    ?>
                                        <i class="fas fa-star-half-alt"></i>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="far fa-star"></i>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="rating-criteria row">
                        <div class="col-6">
                            <i class="rating-criteria-icon fas fa-utensils"></i>
                            <span class="rating-criteria-text">Food Quality</span>
                        </div>
                        <div class="rating-criteria-star-container col-6" title="4.3">
                            <?php

                            $rating_food = round($property['rating_food'], 1);
                            ?>
                            <div class="star-container" title="<?= $rating_food ?>">
                                <?php
                                $rating = $rating_food;
                                for ($i = 0; $i < 5; $i++) {
                                    if ($rating >= $i + 0.8) {
                                ?>
                                        <i class="fas fa-star"></i>
                                    <?php
                                    } elseif ($rating >= $i + 0.3) {
                                    ?>
                                        <i class="fas fa-star-half-alt"></i>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="far fa-star"></i>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="rating-criteria row">
                        <div class="col-6">
                            <i class="rating-criteria-icon fa fa-lock"></i>
                            <span class="rating-criteria-text">Safety</span>
                        </div>
                        <div class="rating-criteria-star-container col-6" title="4.3">
                            <?php

                            $rating_safety = round($property['rating_safety'], 1);
                            ?>
                            <div class="star-container" title="<?= $rating_safety ?>">
                                <?php
                                $rating = $rating_safety;
                                for ($i = 0; $i < 5; $i++) {
                                    if ($rating >= $i + 0.8) {
                                ?>
                                        <i class="fas fa-star"></i>
                                    <?php
                                    } elseif ($rating >= $i + 0.3) {
                                    ?>
                                        <i class="fas fa-star-half-alt"></i>
                                    <?php
                                    } else {
                                    ?>
                                        <i class="far fa-star"></i>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="rating-circle">

                        <?php
                        $total_rating = ($property['rating_clean'] + $property['rating_food'] + $property['rating_safety']) / 3;
                        $total_rating = round($total_rating, 1);
                        ?>
                        <div class="total-rating"><?= $total_rating ?></div>
                        <div class="star-container" title="<?= $total_rating ?>">
                            <?php
                            $rating = $total_rating;
                            for ($i = 0; $i < 5; $i++) {
                                if ($rating >= $i + 0.8) {
                            ?>
                                    <i class="fas fa-star"></i>
                                <?php
                                } elseif ($rating >= $i + 0.3) {
                                ?>
                                    <i class="fas fa-star-half-alt"></i>
                                <?php
                                } else {
                                ?>
                                    <i class="far fa-star"></i>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="property-testimonials page-container property-summary">
            <h1>What people say</h1>

            <?php $sql_2 = "SELECT * FROM testimonials WHERE property_id='$property_id';";
            $result_2 = mysqli_query($conn, $sql_2);
            if (!$result_2) {
                echo "Something went wrong";
                exit;
            }

            while ($testimonial = mysqli_fetch_assoc($result_2)) {
               
            ?> <div class="testimonial-block">
                    <div class="testimonial-image-container">
                        <img class="testimonial-img" src="img/man.png">
                    </div>
                    <div class="testimonial-text">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        <p><?= $testimonial['content'] ?></p>
                    </div>
                    <div class="testimonial-name">- <?= $testimonial['user_name'] ?></div>
                </div><?php
                    }
                        ?>

       
        </div>
    </div>

        <?php
        include "includes/footer.php";
        include "includes/signup_modal.php";
        include "includes/login_modal.php";
        ?>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>