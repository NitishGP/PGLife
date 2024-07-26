
<?php

include "includes/signup_modal.php";
include "includes/login_modal.php";
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img style="width: 8rem;margin-left:1rem;" src="img/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">

                <?php
                
                //Check if user is logging or not
                if (!isset($_SESSION["user_id"])) {
                ?>
                    <li class="nav-item"> 
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#signup-modal">
                            <i class="fas fa-user" style="margin-right: 4px;"></i>Signup
                        </a>
                    </li>
                    
     
                    <div class="nav-vl"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#login-modal">
                            <i class="fas fa-sign-in-alt" style="margin-right: 4px;"></i>Login
                        </a>
                    </li>
                <?php
                } else {
                ?>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <i class="fas fa-user" style="margin-right: 4px;"></i>Dashboard
                        </a>
                    </li>

                    <div class="nav-vl"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt" style="margin-right: 4px;"></i>Logout
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>

            
        </div>
    </div>
</nav>

<div id="loading">
</div>

