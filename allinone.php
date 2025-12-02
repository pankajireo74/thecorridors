<?php
if (file_exists('inc/header.php')) {
    include 'inc/header.php';
} else {
    echo 'Header file not found.';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IREO</title>
    <?php include 'inc/resource.php'; ?>
</head>

<body>

    <?php include 'inc/header.php'; ?>

    <section id="allinone">
        <div class="position-relative">
            <div class="position-absolute z-2 internal-text-box">

                <h1 class="text-white bnr-title">
                    Your Everyday Escape
                </h1>
                <p class="text-white bnr-subtitle">
                    Every detail crafted for an extraordinary lifestyle.
                </p>

            </div>

            <div>
                <img src="images/all/allinonebanner.jpg" class="brn_img w-100 h-auto" alt="Banner Image">
            </div>

        </div>
    </section>

    <section class="padd1">
        <div class="container2">
            <div class="row justify-content-center align-items-center gap-3">
                <div class="col-md-6 position-relative">
                    <img src="images/all/6.jpg" alt="" class="w-100 h-auto">
                    <div class="imageoverlaytext2 cstcss2">
                        The images, renderings, etc. are for illustration only and subject to change at
                        sole
                        discretion of Promoter. These may not depict the actual, design, amenities, finishes, etc.
                        of final
                        project. This does not constitute a legal offer – size of each email
                    </div>
                </div>
                <div class="col-md-5">
                    <h3 class="title">Your Everyday Escape</h3>
                    <p class="desc">The 2-acre clubhouse at The
                        Corridors is thoughtfully designed for
                        everyday indulgence. Whether it's staying fit,
                        unwinding or socializing, residents will enjoy
                        a modern resort like experience without ever
                        having to leave the community.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="padd1 pt-0 position-relative">
        <div class="std-banne image-section  allinone-images  sticky-top">
            <div class="position-absolute z-2 internal-text-box ">
                <p class="text-black bg-white bnr-subtitle px-2 ">
                    Club - Arrival Lobby
                </p>

            </div>
            <img src="images/all/Arrival-lobby.jpg" class="brn_img w-100 h-100 object-fit-cover" alt="Banner Image">
            <div class="imageoverlaytext2 cstcss2">
                The images, renderings, etc. are for illustration only and subject to change at
                sole
                discretion of Promoter. These may not depict the actual, design, amenities, finishes, etc.
                of final
                project. This does not constitute a legal offer – size of each email
            </div>
        </div>
        <!-- <div class="std-banne image-section allinone-images  sticky-top">
            <div class="position-absolute z-2 internal-text-box left-0">
                <p class="text-black bg-white bnr-subtitle px-2">
                    Club - Arrival Lobby
                </p>

            </div>
            <img src="images/all/allinonebanner.jpg" class="brn_img" alt="Banner Image">
        </div> -->

        <div class="std-banne image-section allinone-images  sticky-top">
            <div class="position-absolute z-2 internal-text-box ">
                <p class="text-black bg-white bnr-subtitle px-2 ">
                    Club - Bar
                </p>

            </div>
            <img src="images/all/Bar.jpg" class="brn_img w-100 h-100 object-fit-cover" alt="Banner Image">
            <div class="imageoverlaytext2 cstcss2">
                The images, renderings, etc. are for illustration only and subject to change at
                sole
                discretion of Promoter. These may not depict the actual, design, amenities, finishes, etc.
                of final
                project. This does not constitute a legal offer – size of each email
            </div>
        </div>
        <div class="std-banne image-section allinone-images  sticky-top">
            <div class="position-absolute z-2 internal-text-box ">
                <p class="text-black bg-white bnr-subtitle px-2 ">
                    Club - Deli Area
                </p>

            </div>
            <img src="images/all/Club-Deli-Area.jpg" class="brn_img w-100 h-100 object-fit-cover" alt="Banner Image">
            <div class="imageoverlaytext2 cstcss2">
                The images, renderings, etc. are for illustration only and subject to change at
                sole
                discretion of Promoter. These may not depict the actual, design, amenities, finishes, etc.
                of final
                project. This does not constitute a legal offer – size of each email
            </div>
        </div>
        <div class="std-banne image-section allinone-images  sticky-top">
            <div class="position-absolute z-2 internal-text-box ">
                <p class="text-black bg-white bnr-subtitle px-2 ">
                    Club - Restaurant
                </p>

            </div>
            <img src="images/all/Club-Restuarant-2.jpg" class="brn_img w-100 h-100 object-fit-cover" alt="Banner Image">
            <div class="imageoverlaytext2 cstcss2">
                The images, renderings, etc. are for illustration only and subject to change at
                sole
                discretion of Promoter. These may not depict the actual, design, amenities, finishes, etc.
                of final
                project. This does not constitute a legal offer – size of each email
            </div>
        </div>
        <div class="std-banne image-section allinone-images  sticky-top">
            <div class="position-absolute z-2 internal-text-box-2 ">
                <p class="text-black bg-white bnr-subtitle px-2 ">
                    Club - Restaurant
                </p>

            </div>
            <img src="images/all/Club-Restuarant.jpg" class="brn_img w-100 h-100 object-fit-cover" alt="Banner Image">
            <div class="imageoverlaytext2 cstcss2">
                The images, renderings, etc. are for illustration only and subject to change at
                sole
                discretion of Promoter. These may not depict the actual, design, amenities, finishes, etc.
                of final
                project. This does not constitute a legal offer – size of each email
            </div>
        </div>

    </section>

    <section class="container-fluid">
        <div class="d-none d-md-none d-lg-block">
            <ul class="nav row row-cols-1 row-cols-md-5 g-3 nav-fill" id="amenTabs" role="tablist">
                <!-- Tab 1 -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-0 active" id="amen1-tab" data-bs-toggle="tab" data-bs-target="#amen1"
                        type="button" role="tab" aria-controls="amen1" aria-selected="true">
                        <div class="amen-card h-100">
                            <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                                <div class="bg-white white-p">
                                    <img class="amen-logo" src="images/amenities/amen1.png" />
                                </div>
                            </div>
                            <div class="w-100 amen-bck">
                                <img src="images/amenities/amenbck1.png" class="w-100 h-100" />
                            </div>
                            <div
                                class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                                <p class="text-white fw-500 m-0">Seniors</p>
                            </div>
                        </div>
                    </button>
                </li>

                <!-- Tab 2 -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-0" id="amen2-tab" data-bs-toggle="tab" data-bs-target="#amen2"
                        type="button" role="tab" aria-controls="amen2" aria-selected="false">
                        <div class="amen-card h-100">
                            <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                                <div class="bg-white white-p">
                                    <img class="amen-logo" src="images/amenities/amen2.svg" />
                                </div>
                            </div>
                            <div class="w-100 amen-bck">
                                <img src="images/amenities/amenbck2.png" class="w-100 h-100" />
                            </div>
                            <div
                                class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                                <p class="text-white fw-500 m-0">Kids</p>
                            </div>
                        </div>
                    </button>
                </li>

                <!-- Tab 3 -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-0" id="amen3-tab" data-bs-toggle="tab" data-bs-target="#amen3"
                        type="button" role="tab" aria-controls="amen3" aria-selected="false">
                        <div class="amen-card h-100">
                            <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                                <div class="bg-white white-p">
                                    <img class="amen-logo" src="images/amenities/amen3.svg" />
                                </div>
                            </div>
                            <div class="w-100 amen-bck">
                                <img src="images/amenities/Badminton.jpg" class="w-100 h-100" />
                            </div>
                            <div
                                class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                                <p class="text-white fw-500 m-0">Sports and Wellness</p>
                            </div>
                        </div>
                    </button>
                </li>

                <!-- Tab 4 -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-0" id="amen4-tab" data-bs-toggle="tab" data-bs-target="#amen4"
                        type="button" role="tab" aria-controls="amen4" aria-selected="false">
                        <div class="amen-card h-100">
                            <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                                <div class="bg-white white-p">
                                    <img class="amen-logo" src="images/amenities/amen4.svg" />
                                </div>
                            </div>
                            <div class="w-100 amen-bck">
                                <img src="images/amenities/amenbck4.jpg" class="w-100 h-100" />
                            </div>
                            <div
                                class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                                <p class="text-white fw-500 m-0">LANDSCAPE and OUTDOOR</p>
                            </div>
                        </div>
                    </button>
                </li>
                <!-- Tab 5 -->
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-0" id="amen5-tab" data-bs-toggle="tab" data-bs-target="#amen5"
                        type="button" role="tab" aria-controls="amen4" aria-selected="false">
                        <div class="amen-card h-100">
                            <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                                <div class="bg-white white-p">
                                    <img class="amen-logo" src="images/amenities/amen4.svg" />
                                </div>
                            </div>
                            <div class="w-100 amen-bck">
                                <img src="images/amenities/amenbck5.jpg" class="w-100 h-100" />
                            </div>
                            <div
                                class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                                <p class="text-white fw-500 m-0">Unique Highlights</p>
                            </div>
                        </div>
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="amenTabsContent">
                <div class="tab-pane fade show active" id="amen1" role="tabpanel" aria-labelledby="amen1-tab">
                    <div class="row row-cols-2 row-cols-md-6 g-5 text-center extrpadd1">
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/29.svg" />
                            <p class="fw-500 small">Library</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/30.svg" />
                            <p class="fw-500 small">Lounge</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/31.svg" />
                            <p class="fw-500 small">Business Center
                            </p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/1.svg" />
                            <p class="fw-500 small">Meeting Room(s)</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/2.svg" />
                            <p class="fw-500 small">Card Room</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/3.svg" />
                            <p class="fw-500 small">Celebration Hall</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="amen2" role="tabpanel" aria-labelledby="amen2-tab">
                    <div class="row row-cols-2 row-cols-md-6 g-5 text-center extrpadd1">
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/4.svg" />
                            <p class="fw-500 small">Climbing wall
                            </p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/5.svg" />
                            <p class="fw-500 small">Kids zone</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/6.svg" />
                            <p class="fw-500 small">Kids pool</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="amen3" role="tabpanel" aria-labelledby="amen3-tab">
                    <div class="row row-cols-2 row-cols-md-6 g-5 text-center extrpadd1">
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/7.svg" />
                            <p class="fw-500 small">Badminton
                            </p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/8.svg" />
                            <p class="fw-500 small">Gymnasium</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/9.svg" />
                            <p class="fw-500 small">Squash Court</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/10.svg" />
                            <p class="fw-500 small">Basketball</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/11.svg" />
                            <p class="fw-500 small">Cricket net</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/12.svg" />
                            <p class="fw-500 small">Football
                            </p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/13.svg" />
                            <p class="fw-500 small">Tennis</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/14.svg" />
                            <p class="fw-500 small">Pool table</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/15.svg" />
                            <p class="fw-500 small">Spa</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/16.svg" />
                            <p class="fw-500 small">Steam</p>
                        </div>

                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/17.svg" />
                            <p class="fw-500 small">Sauna</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/18.svg" />
                            <p class="fw-500 small">Salon</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="amen4" role="tabpanel" aria-labelledby="amen4-tab">
                    <div class="row row-cols-2 row-cols-md-6 g-5 text-center extrpadd1">
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/19.svg" />
                            <p class="fw-500 small">
                                Jogging Trail
                            </p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/20.svg" />
                            <p class="fw-500 small">Outdoor Yoga</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/21.svg" />
                            <p class="fw-500 small">Celebration Lawn</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/22.svg" />
                            <p class="fw-500 small">Swimming Pool</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="amen5" role="tabpanel" aria-labelledby="amen5-tab">
                    <div class="row row-cols-2 row-cols-md-6 g-5 text-center extrpadd1">
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/23.svg" />
                            <p class="fw-500 small">
                                Outdoor Party Zone
                            </p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/24.svg" />
                            <p class="fw-500 small">Reception Lounge / Deli</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/25.svg" />
                            <p class="fw-500 small">Restaurant</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/26.svg" />
                            <p class="fw-500 small">Private dinning</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/27.svg" />
                            <p class="fw-500 small">Mini Theatre</p>
                        </div>
                        <div class="col"><img class="amen-logo mb-2" src="images/all/icons/28.svg" />
                            <p class="fw-500 small">Sports bar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block d-md-block d-lg-none">
            <div class="mb-4">
                <div class="amen-card h-100">
                    <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                        <div class="bg-white white-p">
                            <img class="amen-logo" src="images/amenities/amen1.png" />
                        </div>
                    </div>
                    <div class="w-100 amen-bck">
                        <img src="images/amenities/amenbck1.png" class="w-100 h-100" />
                    </div>
                    <div
                        class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                        <p class="text-white fw-500 m-0">Seniors</p>
                    </div>
                </div>
                <!-- Icons for Tab 1 -->
                <div class="row row-cols-2 g-3 text-center mt-4">
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/29.svg" />
                        <p class="fw-500 small">Library</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/30.svg" />
                        <p class="fw-500 small">Lounge</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/31.svg" />
                        <p class="fw-500 small">Business Center
                        </p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/1.svg" />
                        <p class="fw-500 small">Meeting Room(s)</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/2.svg" />
                        <p class="fw-500 small">Card Room</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/3.svg" />
                        <p class="fw-500 small">Celebration Hall</p>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="amen-card h-100">
                    <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                        <div class="bg-white white-p">
                            <img class="amen-logo" src="images/amenities/amen1.png" />
                        </div>
                    </div>
                    <div class="w-100 amen-bck">
                        <img src="images/amenities/amenbck2.png" class="w-100 h-100" />
                    </div>
                    <div
                        class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                        <p class="text-white fw-500 m-0">Kids</p>
                    </div>
                </div>
                <div class="row row-cols-2 g-3 text-center mt-4">
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/4.svg" />
                        <p class="fw-500 small">Climbing wall
                        </p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/5.svg" />
                        <p class="fw-500 small">Kids zone</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/6.svg" />
                        <p class="fw-500 small">Kids pool</p>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="amen-card h-100">
                    <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                        <div class="bg-white white-p">
                            <img class="amen-logo" src="images/amenities/amen1.png" />
                        </div>
                    </div>
                    <div class="w-100 amen-bck">
                        <img src="images/amenities/Badminton.jpg" class="w-100 h-100" />
                    </div>
                    <div
                        class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                        <p class="text-white fw-500 m-0">Sports and Wellness</p>
                    </div>
                </div>
                <!-- Icons for Tab 1 -->
                <div class="row row-cols-2 g-3 text-center mt-4">
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/7.svg" />
                        <p class="fw-500 small">Badminton
                        </p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/8.svg" />
                        <p class="fw-500 small">Gymnasium</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/9.svg" />
                        <p class="fw-500 small">Squash Court</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/10.svg" />
                        <p class="fw-500 small">Basketball</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/11.svg" />
                        <p class="fw-500 small">Cricket net</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/12.svg" />
                        <p class="fw-500 small">Football
                        </p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/13.svg" />
                        <p class="fw-500 small">Tennis</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/14.svg" />
                        <p class="fw-500 small">Pool table</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/15.svg" />
                        <p class="fw-500 small">Spa</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/16.svg" />
                        <p class="fw-500 small">Steam</p>
                    </div>

                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/17.svg" />
                        <p class="fw-500 small">Sauna</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/18.svg" />
                        <p class="fw-500 small">Salon</p>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="amen-card h-100">
                    <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                        <div class="bg-white white-p">
                            <img class="amen-logo" src="images/amenities/amen1.png" />
                        </div>
                    </div>
                    <div class="w-100 amen-bck">
                        <img src="images/amenities/amenbck4.jpg" class="w-100 h-100" />
                    </div>
                    <div
                        class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                        <p class="text-white fw-500 m-0">LANDSCAPE
                            and OUTDOOR</p>
                    </div>
                </div>
                <div class="row row-cols-2 g-3 text-center mt-4">
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/19.svg" />
                        <p class="fw-500 small">
                            Jogging Trail
                        </p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/20.svg" />
                        <p class="fw-500 small">Outdoor Yoga</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/21.svg" />
                        <p class="fw-500 small">Celebration Lawn</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/22.svg" />
                        <p class="fw-500 small">Swimming Pool</p>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <div class="amen-card h-100">
                    <div class="h-100 d-flex justify-content-center align-items-center w-100 position-absolute">
                        <div class="bg-white white-p">
                            <img class="amen-logo" src="images/amenities/amen1.png" />
                        </div>
                    </div>
                    <div class="w-100 amen-bck">
                        <img src="images/amenities/amenbck5.jpg" class="w-100 h-100" />
                    </div>
                    <div
                        class="w-100 amen-bck px-3 d-flex justify-content-center align-items-center gold-bck text-center">
                        <p class="text-white fw-500 m-0">Unique Highlights</p>
                    </div>
                </div>
                <!-- Icons for Tab 1 -->
                <div class="row row-cols-2 g-3 text-center mt-4">
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/23.svg" />
                        <p class="fw-500 small">
                            Outdoor Party Zone
                        </p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/24.svg" />
                        <p class="fw-500 small">Reception Lounge / Deli</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/25.svg" />
                        <p class="fw-500 small">Restaurant</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/26.svg" />
                        <p class="fw-500 small">Private dinning</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/27.svg" />
                        <p class="fw-500 small">Mini Theatre</p>
                    </div>
                    <div class="col"><img class="amen-logo mb-2" src="images/all/icons/28.svg" />
                        <p class="fw-500 small">Sports bar</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php include 'inc/footer.php'; ?>

</body>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script>
gsap.registerPlugin(ScrollTrigger);

const sections = gsap.utils.toArray(".image-section");

gsap.to(sections, {
    yPercent: -100 * (sections.length - 1),
    ease: "none",
    scrollTrigger: {
        trigger: ".padd1",
        pin: true,
        scrub: 1,
        snap: 1 / (sections.length - 1),
        end: () => "+=" + document.querySelector(".padd1").offsetHeight
    }
});
</script> -->

</html>