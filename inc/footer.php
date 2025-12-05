<?php
// Ensure configuration (including reCAPTCHA keys) is available.
require_once __DIR__ . '/../config.php';
?>
<div id="pageloader">
    <img src="images/loading.gif" alt="processing..." />
</div>
<section class="contact-sec contactex">
    <div class="overlay">
        <div class="cust-container-12">
            <div class="row justify-content-start">
                <div class="col-md-12 col-lg-6">
                    <h3 class="text-white contact-head" data-aos="fade-right" data-aos-duration="3000">Go Iconic

                        <img src="images/icons/arrow1.svg" alt="">
                    </h3>
                    <p class="text-white subcon" data-aos="fade-right" data-aos-duration="3000">Your Personalized
                        Journey Starts Here. Connect with Your Dedicated
                        Relationship Manager Today.</p>
                    <form id="contact-form" action="thank-you.php" name="contact-form" method="POST"
                        novalidate="novalidate" onsubmit="return form_validate('contact-form');">
                        <div class="row mb-2">
                            <div class="form-group col-md-6">
                                <input name="fname" type="text" class="form-control" placeholder="First Name">
                                <label for="fname" class="error"></label>
                            </div>
                            <div class="form-group col-md-6">
                                <input name="lname" type="text" class="form-control" placeholder="Last Name">
                                <label for="lname" class="error"></label>

                            </div>
                            <div class="form-group col-md-6">
                                <input name="mobile" type="tel" id="phone" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group col-md-6">
                                <input name="email" type="email" class="form-control" placeholder="Email">
                                <label for="email" class="error"></label>

                            </div>
                        </div>
                        <!-- Honeypot + timestamp helpers (hidden, no UI change) -->
                        <input type="text" name="hp_field" id="hp_field_contact" style="display:none !important;">
                        <input type="hidden" name="ts" id="ts_contact" value="<?php echo time(); ?>">

                        <!-- Google reCAPTCHA v2 Checkbox (centered above submit) -->
                        <?php if (!empty(RECAPTCHA_SITE_KEY)) : ?>
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="g-recaptcha"
                                data-sitekey="<?php echo htmlspecialchars(RECAPTCHA_SITE_KEY, ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                        </div>
                        <?php endif; ?>
                        <button type="submit" class="submit-btn">Submit</button>
                    </form>
                    <div class="additional-info">


                        <div class="d-flex flex-column mb-5 align-items-start justify-items-start pdf-footer">

                            <div class="additional-info mt-0 gap-1 d-flex align-items-center">
                                <p class="text-white mb-0">
                                    Customer Care Email ID:
                                </p>
                                <a href="mailto:corridors.crm@ireo.in" target="_blank"
                                    class="text-white">corridors.crm@ireo.in

                                </a>
                            </div>
                            <div class="additional-info mt-0 gap-1 d-flex align-items-center">
                                <p class="text-white mb-0">
                                    Telephone:
                                </p>
                                <a href="tel:+91-91124-4754060" target="_blank" class="text-white">+91-911244754060
                                </a>
                            </div>

                        </div>

                        <p class="text-white">© IREO. All Rights Reserved.</p>

                        <div class="d-flex flex-column my-2 align-items-start justify-items-start pdf-footer">
                            <div class="additional-info mt-0">
                                <a href="images/footer/BR-III ZP 871 Corridor 37.512 Acres .pdf" target="_blank"
                                    class="text-white">Form of sanction</a>
                            </div>
                            <div class="additional-info mt-0">
                                <a href="images/footer/RC-CORRIDOR PH1.pdf" target="_blank"
                                    class="text-white">Registration
                                    Certificate Phase 1
                                </a>
                            </div>
                            <div class="additional-info mt-0">
                                <a href="images/footer/RC-CORRIDOR PH2.pdf" target="_blank"
                                    class="text-white">Registration
                                    Certificate Phase 2</a>
                            </div>
                        </div>
                        <!-- <p class="text-white disclaimer_click pointer">Disclaimer</p> -->
                        <p class="text-white pointer">
                            <a href="disclaimer.php" class="text-white">Disclaimer</a> |
                            <a href="privacy-policy.php" class="text-white">Privacy Policy</a> |
                            <a href="terms-condition.php" class="text-white">Terms & Condition</a>
                        </p>
                        <p class="text-white">RERA Registration No:
                            <br />PHASE-1 - H-Rera ’378 of 2017 dated 07.12.2017 <br />
                            PHASE-2 H-Rera ’377 of 2017 dated 07.12.2017 | Details available at <a
                                href="https://haryanarera.gov.in/" class="text-white">https://haryanarera.gov.in/</a>
                        </p>
                    </div>
                    <div class="social-icons mt-3">
                        <a href="https://www.instagram.com/ireo_official/" class="text-white me2"><img
                                src="images/icons/insta.svg" alt="insta"></a>
                        <a href="https://www.facebook.com/profile.php?id=61578753591356" class="text-white me2"><img
                                src="images/icons/fb.svg" alt="facebook"></a>
                        <a href="https://x.com/IREO_official" class="text-white me2"><img src="images/icons/x.svg"
                                alt="LinkedIn"></a>
                        <a href="https://www.youtube.com/@Ireo_official" class="text-white me2"><img
                                src="images/icons/youtube.svg" alt="youtube"></a>
                    </div>
                </div>

            </div>
        </div>
</section>

<div class="modal fade" id="enquiry-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">

                <h3 id="title-modal">Enquire Now</h3>
                <p>Please Enter Your Details To Get More Details</p>
                <form id="enquiry-form2" action="thank-you.php" name="enquiry-form2" method="POST"
                    novalidate="novalidate" onsubmit="return form_validate('enquiry-form2');">
                    <!-- Honeypot + timestamp helpers (hidden, no UI change) -->
                    <input type="text" name="hp_field" id="hp_field_enquiry" style="display:none !important;">
                    <input type="hidden" name="ts" id="ts_enquiry" value="<?php echo time(); ?>">
                    <div class="row mr0">
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <!--<div class="input-group-addon">
                                    <i class="fa fa-user form-ico" aria-hidden="true"></i>
                                </div>-->
                                <input type="text" class="form-control" name="fname" placeholder="Name">
                                <input type="hidden" name="source" id="source" value="Enquiry Popup">
                            </div>
                            <label for="fname" class="error"></label>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <input type="number" class="form-control" name="mobile" placeholder="Mobile">
                            </div>
                            <label for="mobile" class="error"></label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="input-group">
                            <!--<div class="input-group-addon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>-->
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <label for="email" class="error"></label>
                    </div>

                    <!-- Google reCAPTCHA v2 Checkbox (centered inside modal, above submit) -->
                    <?php if (!empty(RECAPTCHA_SITE_KEY)) : ?>
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="g-recaptcha"
                            data-sitekey="<?php echo htmlspecialchars(RECAPTCHA_SITE_KEY, ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                    </div>
                    <?php endif; ?>

                    <button type="submit" class="form-btn round-btn text-center d-inline" href="#"><span>SUBMIT <i
                                class="flaticon-right-arrow"></i></span></button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ================ Disclaimer popup ==================== -->
<div class="modal fade" id="disclaimer-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <h3>Disclaimer</h3>
                <!-- <div class="disclaimer_text">
                    <p>The information contained in this Website (“Website”), is merely informatory and unless otherwise
                        expressly provided, all contents are for general information purposes.</p>

                </div> -->
                <h3>Thank you for visiting our official website.</h3>
                <p>
                    This website is the only official online presence of IREO and is intended solely to provide
                    general information regarding the Company and its project(s). Nothing contained herein shall be
                    construed as a legal offering. The images, renderings, etc. are for illustration purposes only,
                    which may not reflect actual features or final finishes, and subject to change at sole discretion of
                    Company. These may not depict the actual, design, amenities, finishes, etc., of final project.

                </p>
                <p>
                    Nothing on this website shall constitute or be deemed to constitute any form of advertising,
                    marketing, booking, selling, or an offer to sell, or a solicitation or invitation to purchase any
                    unit
                    in any of the Company’s project(s), whether by IREO, its directors, officers, employees, agents,
                    representatives, or affiliated group companies.
                </p>
                <p>

                    The information provided is subject to change without notice and is intended for general
                    guidance purposes only. Visitors are advised to exercise their own discretion and verify all
                    details independently with the Company’s authorized representatives or through the relevant
                    authorities before making any decision.
                </p>
                <p>
                    By accessing or using this website, the visitor acknowledges and agrees to the terms of this
                    Disclaimer without any qualification or limitation. Under no circumstances shall the Company
                    be liable for any direct, indirect, incidental, special, or consequential damages, including but not
                    limited to loss of profits, business interruption, loss of data or programs, arising out of or in
                    connection with the use of this website or any hyperlinked websites.
                </p>
                <p>
                    We thank you for your patience, understanding, and interest in IREO.

                </p>

            </div>
        </div>
    </div>
</div>

<a href="tel:+917027927607">
    <img src="images/phone.png" alt="WhatsApp" width="52" height="52" class="whatsicon">
</a>

<script src="js/jquery.min.js"></script>
<script src="js/mobilevalidate.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script> -->
<script src="js/aos.js"></script>
<script src="js/cookie.js"></script>
<script src="js/jquery.validate.js"></script>
<!-- <script src="js/owl.carousel.min.js"></script> -->
<script src="js/popout.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/custom.js"></script>
<script src="js/url-tracking.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script> -->
<script src="js/intlTelInput.min.js"></script>
<script src="js/utils.js"></script>
<script src="js/fancybox.umd.js"></script>
<script src="js/custom2.js"></script>

<!-- <script src="js/swiper-bundle.min.js"></script> -->

<?php if (!empty(RECAPTCHA_SITE_KEY)) : ?>
<!-- Google reCAPTCHA v2 Checkbox -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>