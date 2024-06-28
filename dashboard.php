<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img style="width: 8rem;" src="img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <li class="breadcrumb-item active" aria-current="page" style="padding-left: 1rem;">
                <a href="index.html">Home</a>
            </li>
           
            <li class="breadcrumb-item active" aria-current="page">
                <a href="dashboard.html">My Profile</a>
            </li>
        </ol>
    </nav>
    <section class="m-5">
        <div class="container-fluid" style="width: 60rem;">
            <header class="fs-2">My Profile</header>
            <div class="row">
                <div class="col-4"><img src="img/man.png" alt="profile pic"></div>
                <div class="col-8">
                    <h4>Nitish G Panda</h6>
                    <p>gobindanitish13@gmail.com</p>
                    <p>9999999999</p> 
                    <p><a href="#">Edit profile</a></p>   
                </div>
            </div>
        </div>
    </section>
    <section class="p-2" style="background-color: rgb(249, 225, 164);">
        <div class="container" >
            <div class="row p-2 m-2" style="background-color: rgb(255, 251, 242);width: 55rem;">
                <div class="col-4"><img src="img/man.png" alt="profile pic"></div>
                <div class="col-8">
                    <h4>Nitish G Panda</h6>
                    <p>gobindanitish13@gmail.com</p>
                    <p>9999999999</p>
                    <p><a href="#">Edit profile</a></p>   
                </div>
            </div>
            <div class="row p-2 m-2" style="background-color: rgb(255, 251, 242);width: 55rem;">
                <div class="col-4"><img src="img/man.png" alt="profile pic"></div>
                <div class="col-8">
                    <h4>Nitish G Panda</h6>
                    <p>gobindanitish13@gmail.com</p>
                    <p>9999999999</p>
                    <p><a href="#">Edit profile</a></p>   
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