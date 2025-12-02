<?php
$scrolled = isset($_GET['scroll']) && $_GET['scroll'] > 100;
?>
<div class="headercontainer overflow-x-hidden">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="header-container d-flex align-items-center justify-content-between">

            <!-- Brand (visible on all devices) -->
            <a class="navbar-brand d-flex align-items-center justify-content-center gap-4" href="index.php">
                <img src="images/ireoNewLogo.png" alt="ireo logo">
                <div class="d-none d-lg-block d-md-block">
                    <p class="text-white mb-0 custheadrera">PHASE-1 - H-Rera ’378 of 2017 dated 07.12.2017</p>
                    <p class="text-white mb-0 custheadrera">PHASE-2 - H-Rera ’377 of 2017 dated 07.12.2017</p>
                </div>
            </a>
            <div class="d-flex justify-center gap-3 align-items-center">
                <div class="d-none d-md-block">
                    <p class="text-white convenience">Convenience is Everything</p>
                </div>
                <!-- ONE Hamburger button for all screen sizes -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <img src="images/hamburger.svg" alt="Menu">
                </button>
            </div>
        </div>
    </nav>

    <!-- Offcanvas Menu -->

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <img src="images/ireoNewLogo.png" alt="ireo logo" class="custmfiltr">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <!-- <li class="nav-item">
                    
                    <a class="nav-link poppins-regular" href="disclaimer.php" onclick="openDisclaimer()">Disclaimer</a>
                </li> -->
                <li class="nav-item"><a class="nav-link poppins-regular" href="index.php"
                        onclick="closeOffcanvas()">Home</a></li>
                <li class="nav-item"><a class="nav-link poppins-regular" href="legacy.php"
                        onclick="closeOffcanvas()">Our Legacy</a></li>
                <li class="nav-item"><a class="nav-link poppins-regular" href="primelocations.php"
                        onclick="closeOffcanvas()">Prime Location</a></li>
                <li class="nav-item"><a class="nav-link poppins-regular" href="readytomovein.php"
                        onclick="closeOffcanvas()">Ready To Move In</a></li>
                <li class="nav-item"><a class="nav-link poppins-regular" href="allinone.php"
                        onclick="closeOffcanvas()">All In One Clubhouse</a></li>
                <li class="nav-item"><a class="nav-link poppins-regular" href="projectspecification.php"
                        onclick="closeOffcanvas()">Layout and Specification</a></li>
                <li class="nav-item"><a class="nav-link poppins-regular" href="gallery.php"
                        onclick="closeOffcanvas()">Our Gallery</a></li>

                <!-- <li class="nav-item"><a class="nav-link poppins-regular" href="legacy.php"
                        onclick="closeOffcanvas()">Our Legacy</a></li> -->


            </ul>

        </div>
    </div>
</div>

<!-- <script src="js/jquery.min.js"></script> -->
<!-- <script src="js/bootstrap.bundle.min.js"></script> -->