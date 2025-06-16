<?php session_start(); ?>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<div class="container my-5">
    <div class="cover-section shadow">
        <img src="img/Untitled design.jpg" alt="Moonlight Photos Gallery">
        <div class="cover-overlay">
            <div class="cover-tagline">Let's capture memories at Moonlight Studio</div>
            <div class="cover-subtext">Timeless portraits, heartfelt moments.</div>
        </div>
    </div>
</div>
<!-- Bootstrap CSS (already assumed loaded) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Optional: Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-5 fw-bold">How It Works</h2>
        <div class="row justify-content-center">

            <!-- Step 1: Book -->
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded shadow-sm bg-white h-100">
                    <i class="bi bi-calendar-check-fill fs-1 text-dark mb-3"></i>
                    <h4 class="fw-bold">Book</h4>
                    <p class="text-muted">Choose your preferred branch and schedule your session online — fast and easy.
                    </p>
                </div>
            </div>

            <!-- Step 2: Capture -->
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded shadow-sm bg-white h-100">
                    <i class="bi bi-camera-fill fs-1 text-dark mb-3"></i>
                    <h4 class="fw-bold">Capture</h4>
                    <p class="text-muted">Step into our studio and enjoy a professional self-photo experience.</p>
                </div>
            </div>

            <!-- Step 3: Pay -->
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded shadow-sm bg-white h-100">
                    <i class="bi bi-credit-card-fill fs-1 text-dark mb-3"></i>
                    <h4 class="fw-bold">Pay</h4>
                    <p class="text-muted">Pay securely online or in person — and receive your beautiful shots quickly.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="booking-section text-center my-5">
    <h1 class="booking-title mb-2">Book your Self-Photo Shoot</h1>
    <p class="booking-subtitle mb-4 text-muted">select a branch below</p>

    <div class="container">
        <div class="row justify-content-center g-4">
            <!-- Tanauan Branch -->
            <div class="col-md-4">
                <div class="p-3 bg-light rounded-4 shadow" style="background-color: #ffe6eb;"
                    onclick="window.location.href='tanauan.php';" role="button">
                    <img src="img/Tanauan.jpg" alt="Tanauan City Branch" class="img-fluid rounded mb-3"
                        style="height: 200px; object-fit: cover; width: 100%;">
                    <h5 class="fw-bold">TANAUAN CITY</h5>
                </div>
            </div>

            <!-- Sto. Tomas Branch -->
            <div class="col-md-4">
                <div class="p-3 bg-light rounded-4 shadow" style="background-color: #ffe6eb;"
                    onclick="window.location.href='sto-tomas.php';" role="button">
                    <img src="img/SM STO..jpg" alt="Sto. Tomas City Branch" class="img-fluid rounded mb-3"
                        style="height: 200px; object-fit: cover; width: 100%;">
                    <h5 class="fw-bold">STO. TOMAS CITY</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bootstrap CSS (if not already included) -->

<section class="container my-2" id="faq">
    <h2 class="mb-4 text-center">Frequently Asked Questions</h2>

    <div class="accordion" id="photoboothFAQ">
        <!-- Question 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1"
                    aria-expanded="true" aria-controls="faq1">
                    1. How long is each photobooth session?
                </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1"
                data-bs-parent="#photoboothFAQ">
                <div class="accordion-body">
                    Each session lasts approximately 15–20 minutes, giving you time to pose, take multiple shots, and
                    review your photos.
                </div>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                    2. Can I bring props or outfits for the shoot?
                </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faqHeading2"
                data-bs-parent="#photoboothFAQ">
                <div class="accordion-body">
                    Yes! We encourage clients to bring their own props, accessories, or outfits to make the experience
                    more personal and fun.
                </div>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                    3. How soon do we receive our photos?
                </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faqHeading3"
                data-bs-parent="#photoboothFAQ">
                <div class="accordion-body">
                    You’ll receive your digital photos within 24 hours. Printed copies (if included in your package) are
                    available for pickup in 1–2 days.
                </div>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                    4. Is walk-in allowed or do I need to book ahead?
                </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faqHeading4"
                data-bs-parent="#photoboothFAQ">
                <div class="accordion-body">
                    While walk-ins are welcome, we highly recommend booking in advance to ensure your preferred time
                    slot is available.
                </div>
            </div>
        </div>

        <!-- Question 5 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqHeading5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                    5. Do you accommodate group or couple shoots?
                </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse" aria-labelledby="faqHeading5"
                data-bs-parent="#photoboothFAQ">
                <div class="accordion-body">
                    Absolutely! Our photobooth can comfortably fit 2–4 people, making it perfect for couples, friends,
                    or small groups.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS (if not already included) -->
<div>
    <br>
    <br>
</div>




<?php include 'footer.php'; ?>